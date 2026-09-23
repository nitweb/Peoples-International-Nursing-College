<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\DonationCategory;
use App\Services\BkashService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DonationController extends Controller
{
    public function DonationList()
    {
        $categories = DonationCategory::where('status', 'active')->get();
        return view('frontend.pages.donation', compact('categories'));
    }

    public function DonationDetails($slug)
    {
        $category = DonationCategory::where('slug', $slug)->firstOrFail();
        return view('frontend.pages.donation_details', compact('category'));
    }

    public function DonateForm($slug = null)
    {
        $category = $slug ? DonationCategory::where('slug', $slug)->first() : null;
        return view('frontend.pages.donate', compact('category'));
    }

    // Step 1: save the donation as pending, then hand off to BkashController
    public function DonateSubmit(Request $request, BkashController $bkashController, BkashService $bkash)
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

        $donation = Donation::create([
            'invoice_no' => 'DON-' . now()->format('YmdHis') . '-' . strtoupper(Str::random(5)),
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

        // bKash-specific work lives in BkashController
        return $bkashController->create($donation, $bkash);
    }

    public function DonationSuccess($invoice)
    {
        $donation = Donation::where('invoice_no', $invoice)->firstOrFail();
        return view('frontend.pages.donation_success', compact('donation'));
    }

    public function DonationFailed($invoice)
    {
        $donation = Donation::where('invoice_no', $invoice)->firstOrFail();
        return view('frontend.pages.donation_failed', compact('donation'));
    }
}