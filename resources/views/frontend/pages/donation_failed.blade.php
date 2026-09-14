@extends('frontend.dashboard')
@section('title', 'Donation Failed')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Donation Failed'])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="p-40 bg-main-25 rounded-16 border border-neutral-30 text-center">
                        <span class="w-80 h-80 bg-danger-600 text-white flex-center rounded-circle text-4xl mx-auto mb-24"><i class="ph-bold ph-x"></i></span>
                        <h3 class="mb-16">Payment {{ ucfirst($donation->status) }}</h3>
                        <p class="text-neutral-500 mb-32">
                            @if(session('error'))
                                {{ session('error') }}
                            @else
                                Unfortunately your payment of ৳{{ number_format($donation->amount) }} could not be completed. Please try again.
                            @endif
                        </p>

                        <div class="flex-center gap-16 flex-wrap">
                            <a href="{{ route('frontend.donation.donate') }}" class="btn btn-main rounded-pill">Try Again</a>
                            <a href="{{ route('index') }}" class="btn btn-outline-main rounded-pill">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
