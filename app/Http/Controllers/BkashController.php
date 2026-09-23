<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\DonationCategory;
use App\Services\BkashService;
use Illuminate\Http\Request;

class BkashController extends Controller
{
    // Step 2: create the bKash payment and redirect donor to bKash's page
    public function create(Donation $donation, BkashService $bkash)
    {
        $callbackUrl = route('frontend.donation.bkash.callback');

        $response = $bkash->createPayment($donation->invoice_no, (float) $donation->amount, $callbackUrl);

        if (empty($response['bkashURL'])) {
            $donation->update(['status' => 'failed']);

            return redirect()->route('frontend.donation.failed', $donation->invoice_no)
                ->with('error', 'Could not initiate bKash payment. Please try again.');
        }

        $donation->update(['bkash_payment_id' => $response['paymentID']]);

        return redirect()->away($response['bkashURL']);
    }

    // Step 3: bKash sends the donor's browser back here
    public function callback(Request $request, BkashService $bkash)
    {
        $paymentId = $request->query('paymentID');
        $status = $request->query('status');

        $donation = Donation::where('bkash_payment_id', $paymentId)->firstOrFail();

        if ($status !== 'success') {
            $donation->update(['status' => $status === 'cancel' ? 'cancelled' : 'failed']);

            return redirect()->route('frontend.donation.failed', $donation->invoice_no);
        }

        $result = $bkash->executePayment($paymentId);

        if (($result['transactionStatus'] ?? null) === 'Completed') {
            $donation->update([
                'status' => 'completed',
                'bkash_trx_id' => $result['trxID'] ?? null,
                'paid_at' => now(),
            ]);

            if ($donation->donation_category_id) {
                DonationCategory::where('id', $donation->donation_category_id)
                    ->increment('raised_amount', $donation->amount);
            }

            return redirect()->route('frontend.donation.success', $donation->invoice_no);
        }

        $donation->update(['status' => 'failed']);

        return redirect()->route('frontend.donation.failed', $donation->invoice_no)
            ->with('error', 'Payment could not be completed.');
    }
}