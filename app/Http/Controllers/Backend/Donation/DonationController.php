<?php

namespace App\Http\Controllers\Backend\Donation;

use App\Http\Controllers\Controller;
use App\Models\Donation;

class DonationController extends Controller
{
    public function DonationTransactionList()
    {
        $title = 'Donation Transactions';

        $donations = Donation::with('category')->orderBy('id', 'desc')->get();

        return view('backend.donation.transaction_list', compact('title', 'donations'));
    } // End Method

    public function DonationTransactionShow($id)
    {
        $title = 'Donation Details';

        $donation = Donation::with('category')->findOrFail($id);

        return view('backend.donation.transaction_show', compact('title', 'donation'));
    } // End Method

    public function DonationTransactionDelete($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();

        return redirect()->back()->with('success', 'Donation record deleted successfully.');
    } // End Method
}
