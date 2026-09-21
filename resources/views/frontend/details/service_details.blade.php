@extends('frontend.dashboard')
@section('title', $service->title)
@section('contents')

    @php
        $detail = $service->serviceDetail;
    @endphp

    @include('frontend.partials.breadcrumb', ['title' => $service->title, 'parent' => 'Our Services', 'parent_url' => route('frontend.all.services.list')])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row gy-5">

                <div class="col-lg-8">
                    <div class="rounded-16 overflow-hidden mb-32">
                        <img src="{{ $detail && $detail->service_banner_image ? asset($detail->service_banner_image) : ($detail && $detail->service_image ? asset($detail->service_image) : asset('frontend/assets/images/thumbs/course-img1.png')) }}" alt="{{ $service->title }}" class="w-100 rounded-16" style="max-height: 420px; object-fit: cover;">
                    </div>

                    <h2 class="mb-24">{{ $service->title }}</h2>

                    @if ($detail && $detail->short_description)
                        <p class="text-neutral-500 fs-5 mb-24">{{ $detail->short_description }}</p>
                    @endif

                    <div class="text-neutral-500">
                        {!! $detail->long_description ?? '' !!}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="p-32 bg-main-25 rounded-16 border border-neutral-30 position-sticky" style="top: 24px;">
                        @if ($service->category)
                            <div class="flex-between gap-8 pb-24 border-bottom border-neutral-50 mb-24 border-dashed border-0">
                                <span class="text-neutral-500">Category</span>
                                <span class="fw-medium text-neutral-700">{{ $service->category->name }}</span>
                            </div>
                        @endif

                        @if ($service_list->count())
                            <h5 class="mb-24">Other Services</h5>
                            <ul class="list-unstyled mb-32">
                                @foreach ($service_list->where('id', '!=', $service->id)->take(6) as $item)
                                    <li class="mb-16">
                                        <a href="{{ route('frontend.service.details', $item->slug) }}" class="flex-align gap-8 text-neutral-700 hover-text-main-600 text-decoration-none">
                                            <i class="ph-bold ph-arrow-right"></i> {{ $item->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        <a href="{{ route('frontend.contact.us') }}" class="btn btn-main rounded-pill w-100 justify-content-center">
                            Get In Touch
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
