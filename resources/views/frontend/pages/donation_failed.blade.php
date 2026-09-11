@extends('frontend.dashboard')
@section('title', 'Payment Failed')
@section('contents')

    <section class="donation-result-section sec-pad" style="text-align:center;">
        <div class="auto-container" style="max-width:600px;">

            <div style="font-size:70px; color:#dc3545; margin-bottom:20px;">
                <i class="fas fa-times-circle"></i>
            </div>

            <h2 style="margin-bottom:15px;">
                {{ $donation->status === 'cancelled' ? 'Donation Cancelled' : 'Payment Failed' }}
            </h2>
            <p style="color:#666; margin-bottom:30px;">
                @if (session('error'))
                    {{ session('error') }}
                @else
                    Unfortunately your bKash payment could not be completed. No amount has been deducted. Please try again.
                @endif
            </p>

            <div style="display:flex; gap:15px; justify-content:center;">
                @if ($donation->category)
                    <a href="{{ route('frontend.donation.donate.category', $donation->category->slug) }}" class="theme-btn-one"><span>Try Again</span></a>
                @else
                    <a href="{{ route('frontend.donation.donate') }}" class="theme-btn-one"><span>Try Again</span></a>
                @endif
                <a href="{{ route('frontend.donation.list') }}" class="theme-btn-one custom_donation_btn"><span>Back to Donation</span></a>
            </div>

        </div>
    </section>

@endsection
