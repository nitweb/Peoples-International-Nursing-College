@extends('frontend.dashboard')
@section('title', 'Thank You')
@section('contents')

    <section class="donation-result-section sec-pad" style="text-align:center;">
        <div class="auto-container" style="max-width:600px;">

            <div style="font-size:70px; color:#28a745; margin-bottom:20px;">
                <i class="fas fa-check-circle"></i>
            </div>

            <h2 style="margin-bottom:15px;">Thank You, {{ $donation->donor_name }}!</h2>
            <p style="color:#666; margin-bottom:30px;">
                Your generous donation @if ($donation->category)
                    to <strong>{{ $donation->category->title }}</strong>
                @endif has been received successfully.
            </p>

            <div style="background:#fff; border-radius:10px; box-shadow:0 0 20px rgba(0,0,0,0.08); padding:30px; text-align:left; margin-bottom:30px;">
                <div style="display:flex; justify-content:space-between; padding:8px 0; border-bottom:1px solid #eee;">
                    <span>Invoice No.</span><strong>{{ $donation->invoice_no }}</strong>
                </div>
                <div style="display:flex; justify-content:space-between; padding:8px 0; border-bottom:1px solid #eee;">
                    <span>Amount</span><strong>৳{{ number_format($donation->amount, 2) }}</strong>
                </div>
                <div style="display:flex; justify-content:space-between; padding:8px 0; border-bottom:1px solid #eee;">
                    <span>bKash Transaction ID</span><strong>{{ $donation->bkash_trx_id }}</strong>
                </div>
                <div style="display:flex; justify-content:space-between; padding:8px 0;">
                    <span>Date</span><strong>{{ $donation->paid_at?->format('d M Y, h:i A') }}</strong>
                </div>
            </div>

            <a href="{{ route('index') }}" class="theme-btn-one"><span>Back to Home</span></a>

        </div>
    </section>

@endsection
