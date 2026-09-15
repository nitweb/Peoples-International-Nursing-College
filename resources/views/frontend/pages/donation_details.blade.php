@extends('frontend.dashboard')
@section('title', $category->title)
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => $category->title, 'parent' => 'Donation', 'parent_url' => route('frontend.donation.list')])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-8">
                    @if($category->image)
                        <img src="{{ asset($category->image) }}" alt="{{ $category->title }}" class="rounded-16 w-100 mb-32" style="max-height: 400px; object-fit: cover;">
                    @endif
                    <h2 class="mb-24">{{ $category->title }}</h2>
                    <div class="text-neutral-500 fs-5">
                        {!! $category->description ?? $category->short_description !!}
                    </div>

                    @if($recentDonors->count())
                        <div class="mt-48 pt-40 border-top border-neutral-50 border-dashed border-0">
                            <h4 class="mb-24">Recent Donors</h4>
                            <div class="row gy-3">
                                @foreach($recentDonors as $donor)
                                    <div class="col-sm-6">
                                        <div class="flex-between gap-8 p-16 bg-main-25 rounded-12 border border-neutral-30">
                                            <span class="fw-medium text-neutral-700">{{ $donor->is_anonymous ? 'Anonymous' : $donor->donor_name }}</span>
                                            <span class="text-main-600 fw-semibold">৳{{ number_format($donor->amount) }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-lg-4">
                    @php
                        $percent = $category->target_amount > 0
                            ? min(100, round(($category->raised_amount / $category->target_amount) * 100))
                            : 0;
                    @endphp
                    <div class="p-32 bg-main-25 rounded-16 border border-neutral-30 position-sticky" style="top: 24px;">
                        @if($category->target_amount)
                            <div class="progress rounded-pill mb-16" style="height: 10px;">
                                <div class="progress-bar bg-main-600" style="width: {{ $percent }}%"></div>
                            </div>
                            <div class="flex-between gap-8 mb-8">
                                <h5 class="mb-0 text-main-two-600">৳{{ number_format($category->raised_amount) }}</h5>
                                <span class="text-neutral-500">raised of ৳{{ number_format($category->target_amount) }}</span>
                            </div>
                        @endif
                        <div class="flex-between gap-8 pt-16 border-top border-neutral-50 mb-32 border-dashed border-0">
                            <span class="text-neutral-500">Donors</span>
                            <span class="fw-medium text-neutral-700">{{ $category->donor_count }}</span>
                        </div>
                        <a href="{{ route('frontend.donation.donate.category', $category->slug) }}" class="btn btn-main rounded-pill w-100 justify-content-center">
                            Donate Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
