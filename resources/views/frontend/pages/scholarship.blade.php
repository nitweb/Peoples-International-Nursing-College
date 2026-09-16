@extends('frontend.dashboard')
@section('title', 'Scholarship')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Scholarship'])

    <section class="py-120">
        <div class="container">

            <div class="section-heading text-center mb-48">
                <h2 class="mb-24">Scholarships &amp; Fee Waivers</h2>
                <p>Financial support opportunities for meritorious and deserving students</p>
            </div>

            @if ($scholarship_list->count())
                <div class="row gy-4">
                    @foreach ($scholarship_list as $scholarship)
                        <div class="col-lg-4 col-sm-6">
                            <div class="p-16 bg-main-25 rounded-16 border border-neutral-30 h-100">
                                <div class="rounded-12 overflow-hidden mb-20">
                                    <img src="{{ $scholarship->image ? asset($scholarship->image) : asset('frontend/assets/images/thumbs/service-img1.png') }}" alt="{{ $scholarship->title }}" class="w-100 cover-img" style="height: 220px; object-fit: cover;">
                                </div>
                                <div class="px-8 pb-8">
                                    <h5 class="mb-12">{{ $scholarship->title }}</h5>

                                    @if ($scholarship->coverage)
                                        <span class="badge bg-main-600 text-white rounded-pill px-16 py-8 mb-12 d-inline-block">{{ $scholarship->coverage }}</span>
                                    @endif

                                    <p class="text-neutral-500 mb-0">{{ $scholarship->short_description }}</p>

                                    @if ($scholarship->eligibility)
                                        <details class="mt-12">
                                            <summary class="text-main-600 fw-semibold" style="cursor: pointer;">Eligibility</summary>
                                            <div class="text-neutral-500 mt-12">{!! $scholarship->eligibility !!}</div>
                                        </details>
                                    @endif

                                    @if ($scholarship->long_description)
                                        <details class="mt-12">
                                            <summary class="text-main-600 fw-semibold" style="cursor: pointer;">Read more</summary>
                                            <div class="text-neutral-500 mt-12">{!! $scholarship->long_description !!}</div>
                                        </details>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-40">
                    <p class="text-neutral-500 mb-0">Scholarship information is being updated. Please check back soon.</p>
                </div>
            @endif

        </div>
    </section>

@endsection
