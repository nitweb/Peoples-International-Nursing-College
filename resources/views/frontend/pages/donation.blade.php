@extends('frontend.dashboard')
@section('title', 'Donation')
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Donation</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Donation</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="cause-section sec-pad bg-color-1">
        <div class="auto-container">

            @include('widgets.errors')
            @include('widgets.success')

            @if ($categories->isEmpty())
                <div class="text-center" style="padding: 60px 0;">
                    <h4>No donation causes available right now. Please check back soon.</h4>
                </div>
            @else
                <div class="row clearfix">
                    @foreach ($categories as $item)
                        <div class="col-lg-4 col-md-6 col-sm-12 cause-block">
                            <div class="cause-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image">
                                            <a href="{{ route('frontend.donation.details', $item->slug) }}">
                                                <img src="{{ $item->image ? asset($item->image) : asset('frontend/assets/images/background/page-title-4.jpg') }}" alt="{{ $item->title }}">
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="lower-content">
                                        <div class="text">
                                            <h3><a href="{{ route('frontend.donation.details', $item->slug) }}">{{ $item->title }}</a></h3>
                                            <div class="rich-content">
                                                <p>{{ $item->short_description }}</p>
                                            </div>
                                        </div>

                                        @if ($item->target_amount)
                                            <div class="progress-box">
                                                <div class="bar">
                                                    <div class="bar-inner count-bar" style="width: {{ $item->progress_percent }}%; background-color: #3DC88F;" data-percent="{{ $item->progress_percent }}%">
                                                        <div class="count-text">{{ $item->progress_percent }}%</div>
                                                    </div>
                                                </div>
                                                <div class="donate-text">
                                                    <h6>Raised: <span>৳{{ number_format($item->raised_amount) }}</span></h6>
                                                    <h6>Goal: <span>৳{{ number_format($item->target_amount) }}</span></h6>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="btn-box" style="padding: 0 30px 34px; display: flex; gap: 12px; flex-wrap: wrap;">
                                            <a href="{{ route('frontend.donation.details', $item->slug) }}" class="theme-btn-one" style="white-space: nowrap;">
                                                <span>See details</span>
                                            </a>
                                            <a href="{{ route('frontend.donation.donate.category', $item->slug) }}" class="theme-btn-one" style="white-space: nowrap;">
                                                <span>Donate</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>

@endsection
