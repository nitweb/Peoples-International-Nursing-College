@extends('frontend.dashboard')
@section('title', 'Enrollment Received')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Enrollment Received'])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="p-40 bg-main-25 rounded-16 border border-neutral-30 text-center">
                        <span class="w-80 h-80 bg-success-600 text-white flex-center rounded-circle text-4xl mx-auto mb-24"><i class="ph-bold ph-check"></i></span>
                        <h3 class="mb-16">Thank you, {{ $enrollment->name }}!</h3>
                        <p class="text-neutral-500 mb-32">Your enrollment for <strong>{{ $enrollment->training->title }}</strong> has been received and is currently <strong>{{ ucfirst($enrollment->status) }}</strong> verification. We will contact you shortly at {{ $enrollment->phone }}.</p>

                        <div class="p-24 bg-white rounded-12 border border-neutral-30 text-start mb-32">
                            <div class="flex-between gap-8 mb-12">
                                <span class="text-neutral-500">Invoice No.</span>
                                <span class="fw-medium text-neutral-700">{{ $enrollment->invoice }}</span>
                            </div>
                            <div class="flex-between gap-8 mb-12">
                                <span class="text-neutral-500">Course</span>
                                <span class="fw-medium text-neutral-700">{{ $enrollment->training->title }}</span>
                            </div>
                            <div class="flex-between gap-8">
                                <span class="text-neutral-500">Amount</span>
                                <span class="fw-medium text-neutral-700">৳{{ number_format($enrollment->amount) }}</span>
                            </div>
                        </div>

                        <div class="flex-center gap-16 flex-wrap">
                            <a href="{{ route('frontend.training.enroll.invoice', $enrollment->invoice) }}" class="btn btn-outline-main rounded-pill">
                                <i class="ph-bold ph-download me-8"></i> Download Invoice
                            </a>
                            <a href="{{ route('index') }}" class="btn btn-main rounded-pill">
                                Back to Home
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
