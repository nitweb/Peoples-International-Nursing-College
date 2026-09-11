@extends('frontend.dashboard')
@section('title', 'Mission, Vision & Values')
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Mission, Vision & Values</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('frontend.about.us') }}">About Us</a></li>
                    <li>Mission, Vision & Values</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="cause-style-two sec-pad bg-color-1">
        <div class="auto-container">
            <div class="sec-title centred mb_50">
                <span class="sub-title">Our Purpose</span>
                <h2>Mission, Vision & Values</h2>
            </div>
            <div class="row clearfix">

                <div class="col-lg-4 col-md-6 col-sm-12 cause-block">
                    <div class="cause-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="javascript:void(0)"><img src="{{ asset($mission->image) }}" alt=""></a></figure>
                            </div>
                            <div class="lower-content">
                                <div class="text">
                                    <h3 class="text-center"><a href="javascript:void(0)">Mission</a></h3>
                                    <div class="text-justify">{!! $mission->description !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 cause-block">
                    <div class="cause-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="javascript:void(0)"><img src="{{ asset($vision->image) }}" alt=""></a></figure>
                            </div>
                            <div class="lower-content">
                                <div class="text">
                                    <h3 class="text-center"><a href="javascript:void(0)">Vision</a></h3>
                                    <div class="text-justify">{!! $vision->description !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 cause-block">
                    <div class="cause-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="javascript:void(0)"><img src="{{ asset($values->image) }}" alt=""></a></figure>
                            </div>
                            <div class="lower-content">
                                <div class="text">
                                    <h3 class="text-center"><a href="javascript:void(0)">Values</a></h3>
                                    <div class="text-justify">{!! $values->description !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
