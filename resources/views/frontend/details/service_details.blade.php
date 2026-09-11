@extends('frontend.dashboard')
@section('title', $service->title)
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="bg-layer" style="background-image: url({{ asset($service->serviceDetail->service_banner_image ?? ($service->serviceDetail->service_image ?? 'frontend/assets/images/background/page-title-4.jpg')) }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>{{ $service->title }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('frontend.all.services.list') }}">Services</a></li>
                    <li>Service Details</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- event-details -->
    <section class="event-details">
        <div class="auto-container">

            <div class="event-details-content">
                <div class="row clearfix">

                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-column">
                        <div class="sidebar-side ml_20">

                            @if ($service_list->count() > 1)
                                <div class="single-widget-box">
                                    <h3>Other Services</h3>
                                    <ul class="info-list clearfix">
                                        @foreach ($service_list as $item)
                                            <li class="{{ $item->id === $service->id ? 'active' : '' }}">
                                                <a href="{{ route('frontend.service.details', $item->slug) }}">{{ $item->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                        <div class="content-side">

                            <div class="content-one">
                                {{-- <h3>{{ $service->title }}</h3> --}}

                                @if ($service->serviceDetail?->long_description)
                                    <div class="rich-content">
                                        {!! $service->serviceDetail->long_description !!}
                                    </div>
                                @endif
                                {{-- Short description hidden as requested --}}
                                {{-- @elseif ($service->serviceDetail?->short_description)
                                    <p>{{ $service->serviceDetail->short_description }}</p>
                                @endif --}}
                            </div>

                        </div>
                    </div>


                </div>
            </div>

        </div>
    </section>
    <!-- event-details end -->

    <style>
        .event-details .sidebar-side .single-widget-box .info-list li:last-child a {
            color: #6E6E6E;
        }

        .event-details .sidebar-side .single-widget-box .info-list li.active a {
            color: #D53F34 !important;
            font-weight: 500;
        }
    </style>

@endsection
