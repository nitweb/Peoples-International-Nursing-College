@extends('frontend.dashboard')
@section('title', $category->title)
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>{{ $category->title }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('frontend.donation.list') }}">Donation</a></li>
                    <li>{{ $category->title }}</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="donation-details-section sec-pad">
        <div class="auto-container">
            <div class="row clearfix">

                <div class="col-lg-8 col-md-12 col-sm-12">
                    <figure style="border-radius:10px; overflow:hidden; margin-bottom:30px;">
                        <img src="{{ $category->image ? asset($category->image) : asset('frontend/assets/images/background/page-title-4.jpg') }}" alt="{{ $category->title }}" style="width:100%; display:block;">
                    </figure>

                    <div class="donation-description rich-content">
                        {!! $category->description !!}
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div style="background:#fff; border-radius:10px; box-shadow:0 0 20px rgba(0,0,0,0.08); padding:25px;">

                        @if ($category->target_amount)
                            <div style="background:#eee; border-radius:6px; height:10px; overflow:hidden; margin-bottom:15px;">
                                <div style="background:#0d6efd; height:100%; width:{{ $category->progress_percent }}%;"></div>
                            </div>

                            <div class="row" style="text-align:center; margin-bottom:20px;">
                                <div class="col-6">
                                    <strong style="display:block; font-size:20px;">৳{{ number_format($category->raised_amount) }}</strong>
                                    <small style="color:#888;">Raised of ৳{{ number_format($category->target_amount) }}</small>
                                </div>
                                <div class="col-6">
                                    <strong style="display:block; font-size:20px;">{{ $category->donor_count }}</strong>
                                    <small style="color:#888;">Donors</small>
                                </div>
                            </div>
                        @endif

                        <a href="{{ route('frontend.donation.donate.category', $category->slug) }}" class="theme-btn-one" style="display:block; text-align:center;">
                            <span>Donate</span>
                        </a>

                        @if ($recentDonors->isNotEmpty())
                            <hr style="margin:25px 0;">
                            <h5 style="margin-bottom:15px;">Recent Donors</h5>
                            <ul style="list-style:none; padding:0; margin:0;">
                                @foreach ($recentDonors as $donor)
                                    <li style="display:flex; justify-content:space-between; padding:8px 0; border-bottom:1px solid #eee;">
                                        <span>{{ $donor->is_anonymous ? 'Anonymous' : $donor->donor_name }}</span>
                                        <strong>৳{{ number_format($donor->amount) }}</strong>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection