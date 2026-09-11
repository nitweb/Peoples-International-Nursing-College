@extends('frontend.dashboard')
@section('title', "Executive Director's Message")
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Executive Director's Message</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('frontend.about.us') }}">About Us</a></li>
                    <li>Executive Director's Message</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="testimonial-page-section p_relative">

        <div class="auto-container">

            <div class="sec-title centred mb_50">
                <span class="sub-title">Message from Executive Director</span>
                <h2>Executive Director's Message</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 testimonial-block">
                    <div class="testimonial-block-one">
                        <div class="inner-box">
                            <figure class="thumb-box">
                                <img src="{{ asset($about_message->about_us_image) }}" alt="">
                            </figure>
                            <div class="text mb_40 text-justify">
                                {!! $about_message->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection
