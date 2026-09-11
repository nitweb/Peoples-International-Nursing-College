@extends('frontend.dashboard')
@section('title', "About People's International Foundation")
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>About People's International Foundation</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="about-style-two sec-pad">
        <div class="auto-container">
            <div class="row align-items-center clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image-box mr_40">
                        <div class="image-shape" style="background-image: url({{ 'frontend/assets/images/shape/shape-1.png' }});"></div>
                        <figure class="image"><img src="{{ asset($about_us->about_us_image) }}" alt="About Us Image"></figure>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_two">
                        <div class="content-box ml_40">
                            <div class="sec-title">
                                <span class="sub-title">About People's International Foundation</span>
                            </div>
                            <div class="text mb_40 text-justify">
                                {!! $about_us->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
