@extends('frontend.dashboard')
@section('title', 'Thank You')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Donation Successful'])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="p-40 bg-main-25 rounded-16 border border-neutral-30 text-center">
                        <span class="w-80 h-80 bg-success-600 text-white flex-center rounded-circle text-4xl mx-auto mb-24"><i class="ph-bold ph-heart"></i></span>
                        <h3 class="mb-16">Thank you, {{ $donation->is_anonymous ? 'Friend' : $donation->donor_name }}!</h3>
                        <p class="text-neutral-500 mb-32">Your donation of <strong>৳{{ number_format($donation->amount) }}</strong>{{ $donation->category ? ' to ' . $donation->category->title : '' }} has been received successfully. We truly appreciate your generosity.</p>

                        <div class="p-24 bg-white rounded-12 border border-neutral-30 text-start mb-32">
                            <div class="flex-between gap-8 mb-12">
                                <span class="text-neutral-500">Invoice No.</span>
                                <span class="fw-medium text-neutral-700">{{ $donation->invoice_no }}</span>
                            </div>
                            <div class="flex-between gap-8 mb-12">
                                <span class="text-neutral-500">Transaction ID</span>
                                <span class="fw-medium text-neutral-700">{{ $donation->bkash_trx_id }}</span>
                            </div>
                            <div class="flex-between gap-8">
                                <span class="text-neutral-500">Amount</span>
                                <span class="fw-medium text-neutral-700">৳{{ number_format($donation->amount) }}</span>
                            </div>
                        </div>

                        <a href="{{ route('index') }}" class="btn btn-main rounded-pill">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
