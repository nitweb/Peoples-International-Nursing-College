@extends('frontend.dashboard')
@section('title', 'Campus & Facilities')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Campus & Facilities'])

    <section class="py-120">
        <div class="container">

            <div class="section-heading text-center mb-48">
                <h2 class="mb-24">Our Campus &amp; Facilities</h2>
                <p>A learning environment built for hands-on nursing education, clinical practice, and student life</p>
            </div>

            @if ($facility_list->count())
                <div class="row gy-4">
                    @foreach ($facility_list as $facility)
                        <div class="col-lg-4 col-sm-6">
                            <div class="p-16 bg-main-25 rounded-16 border border-neutral-30 h-100">
                                <div class="rounded-12 overflow-hidden mb-20">
                                    <img src="{{ $facility->image ? asset($facility->image) : asset('frontend/assets/images/thumbs/service-img1.png') }}" alt="{{ $facility->title }}" class="w-100 cover-img" style="height: 220px; object-fit: cover;">
                                </div>
                                <div class="px-8 pb-8">
                                    <h5 class="mb-12 flex-align gap-8">
                                        @if ($facility->icon)
                                            <span class="text-main-600 text-2xl d-flex"><i class="{{ $facility->icon }}"></i></span>
                                        @endif
                                        {{ $facility->title }}
                                    </h5>
                                    <p class="text-neutral-500 mb-0">{{ $facility->short_description }}</p>

                                    @if ($facility->long_description)
                                        <details class="mt-12">
                                            <summary class="text-main-600 fw-semibold" style="cursor: pointer;">Read more</summary>
                                            <div class="text-neutral-500 mt-12">{!! $facility->long_description !!}</div>
                                        </details>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-40">
                    <p class="text-neutral-500 mb-0">Campus facility details are being updated. Please check back soon.</p>
                </div>
            @endif

        </div>
    </section>

@endsection
