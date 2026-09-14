@extends('frontend.dashboard')
@section('title', 'Donation')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Donation'])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="mb-24">Support Our Cause</h2>
                <p>Your contribution helps us provide better education and opportunities for our students</p>
            </div>

            <div class="text-center mb-56">
                <a href="{{ route('frontend.donation.donate') }}" class="btn btn-main rounded-pill">
                    Make a General Donation
                </a>
            </div>

            @if($categories->count())
                <div class="row gy-4">
                    @foreach($categories as $category)
                        @php
                            $percent = $category->target_amount > 0
                                ? min(100, round(($category->raised_amount / $category->target_amount) * 100))
                                : 0;
                        @endphp
                        <div class="col-lg-4 col-sm-6">
                            <div class="bg-white rounded-16 border border-neutral-30 overflow-hidden h-100">
                                @if($category->image)
                                    <a href="{{ route('frontend.donation.details', $category->slug) }}">
                                        <img src="{{ asset($category->image) }}" alt="{{ $category->title }}" class="w-100" style="height: 200px; object-fit: cover;">
                                    </a>
                                @endif
                                <div class="p-24">
                                    <h5 class="mb-12">
                                        <a href="{{ route('frontend.donation.details', $category->slug) }}" class="link text-line-2">{{ $category->title }}</a>
                                    </h5>
                                    @if($category->short_description)
                                        <p class="text-neutral-500 text-line-2 mb-16">{{ $category->short_description }}</p>
                                    @endif

                                    @if($category->target_amount)
                                        <div class="progress rounded-pill mb-12" style="height: 8px;">
                                            <div class="progress-bar bg-main-600" style="width: {{ $percent }}%"></div>
                                        </div>
                                        <div class="flex-between gap-8 mb-20">
                                            <span class="text-neutral-700 fw-medium text-sm">৳{{ number_format($category->raised_amount) }} raised</span>
                                            <span class="text-neutral-500 text-sm">of ৳{{ number_format($category->target_amount) }}</span>
                                        </div>
                                    @endif

                                    <a href="{{ route('frontend.donation.donate.category', $category->slug) }}" class="btn btn-outline-main rounded-pill w-100 justify-content-center">
                                        Donate Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-40">
                    <p class="text-neutral-500 mb-0">No active donation campaigns right now.</p>
                </div>
            @endif
        </div>
    </section>

@endsection
