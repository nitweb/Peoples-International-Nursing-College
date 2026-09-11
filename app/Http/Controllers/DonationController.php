<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\DonationCategory;
use App\Services\BkashService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class DonationController extends Controller
{
    // ─────────────────────────────────────────────
    //  Public: Listing page (row/col cards)
    // ─────────────────────────────────────────────
    public function DonationList()
    {
        $title = 'Donation';

        $categories = DonationCategory::where('status', 'active')
            ->orderBy('serial', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.pages.donation', compact('title', 'categories'));
    }

    // ─────────────────────────────────────────────
    //  Public: Category details page
    // ─────────────────────────────────────────────
    public function DonationDetails($slug)
    {
        $category = DonationCategory::where('slug', $slug)->where('status', 'active')->firstOrFail();

        $title = $category->title;

        $recentDonors = Donation::where('donation_category_id', $category->id)
            ->completed()
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();

        return view('frontend.pages.donation_details', compact('title', 'category', 'recentDonors'));
    }

    // ─────────────────────────────────────────────
    //  Public: Donate form (from list OR details page)
    //  $slug is nullable -> null means a general/undirected donation
    // ─────────────────────────────────────────────
    public function DonateForm($slug = null)
    {
        $title = 'Donate Now';

        $category = $slug
            ? DonationCategory::where('slug', $slug)->where('status', 'active')->firstOrFail()
            : null;

        return view('frontend.pages.donate', compact('title', 'category'));
    }

    // ─────────────────────────────────────────────
    //  Public: Handle donate form submit -> create pending donation -> redirect to bKash
    // ─────────────────────────────────────────────
    public function DonateSubmit(Request $request, BkashService $bkash)
    {
        $request->validate([
            'donation_category_id' => 'nullable|integer|exists:donation_categories,id',
            'donor_name' => 'required|string|max:120',
            'donor_email' => 'nullable|email|max:120',
            'donor_phone' => 'required|string|max:30',
            'message' => 'nullable|string|max:500',
            'is_anonymous' => 'nullable|boolean',
            'amount' => 'required|numeric|min:10',
        ]);

        DB::beginTransaction();
        try {
            $invoice = 'DON-' . now()->format('YmdHis') . '-' . strtoupper(Str::random(5));

            $donation = Donation::create([
                'invoice_no' => $invoice,
                'donation_category_id' => $request->donation_category_id,
                'donor_name' => $request->donor_name,
                'donor_email' => $request->donor_email,
                'donor_phone' => $request->donor_phone,
                'message' => $request->message,
                'is_anonymous' => $request->boolean('is_anonymous'),
                'amount' => $request->amount,
                'payment_method' => 'bkash',
                'status' => 'pending',
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Donation create error: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong! Please try again.')->withInput();
        }

        // Create the bKash payment and redirect the donor to bKash's hosted checkout page
        $callbackUrl = route('frontend.donation.bkash.callback');

        $response = $bkash->createPayment($donation->invoice_no, (float) $donation->amount, $callbackUrl);

        if (empty($response['bkashURL']) || empty($response['paymentID'])) {
            Log::error('bKash createPayment failed for donation', ['invoice' => $donation->invoice_no, 'response' => $response]);

            $donation->update([
                'status' => 'failed',
                'payment_response' => $response,
            ]);

            return redirect()
                ->route('frontend.donation.failed', $donation->invoice_no)
                ->with('error', $response['statusMessage'] ?? 'Could not initiate bKash payment. Please try again.');
        }

        $donation->update([
            'bkash_payment_id' => $response['paymentID'],
            'payment_response' => $response,
        ]);

        return redirect()->away($response['bkashURL']);
    }

    // ─────────────────────────────────────────────
    //  bKash redirects the donor's browser back here (success / failure / cancel)
    // ─────────────────────────────────────────────
    public function BkashCallback(Request $request, BkashService $bkash)
    {
        $paymentId = $request->query('paymentID');
        $status = $request->query('status'); // success | failure | cancel

        $donation = Donation::where('bkash_payment_id', $paymentId)->first();

        if (! $donation) {
            abort(404, 'Donation record not found.');
        }

        if ($status !== 'success') {
            $donation->update([
                'status' => $status === 'cancel' ? 'cancelled' : 'failed',
            ]);

            return redirect()->route('frontend.donation.failed', $donation->invoice_no);
        }

        // Execute the payment to confirm & capture the transaction
        $result = $bkash->executePayment($paymentId);

        if (($result['transactionStatus'] ?? null) === 'Completed') {
            DB::beginTransaction();
            try {
                $donation->update([
                    'status' => 'completed',
                    'bkash_trx_id' => $result['trxID'] ?? null,
                    'payment_response' => $result,
                    'paid_at' => now(),
                ]);

                if ($donation->donation_category_id) {
                    $category = DonationCategory::find($donation->donation_category_id);
                    if ($category) {
                        $category->increment('raised_amount', $donation->amount);
                        $category->increment('donor_count');
                    }
                }

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Donation completion error: ' . $e->getMessage());
            }

            return redirect()->route('frontend.donation.success', $donation->invoice_no);
        }

        $donation->update([
            'status' => 'failed',
            'payment_response' => $result,
        ]);

        Log::error('bKash executePayment did not complete', ['invoice' => $donation->invoice_no, 'response' => $result]);

        return redirect()
            ->route('frontend.donation.failed', $donation->invoice_no)
            ->with('error', $result['statusMessage'] ?? 'Payment could not be completed.');
    }

    // ─────────────────────────────────────────────
    //  Success / Failed pages
    // ─────────────────────────────────────────────
    public function DonationSuccess($invoice)
    {
        $donation = Donation::with('category')->where('invoice_no', $invoice)->firstOrFail();

        return view('frontend.pages.donation_success', compact('donation'));
    }

    public function DonationFailed($invoice)
    {
        $donation = Donation::with('category')->where('invoice_no', $invoice)->firstOrFail();

        return view('frontend.pages.donation_failed', compact('donation'));
    }
}
