@extends('frontend.dashboard')
@section('title', 'About Us')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'About Us'])

    <!-- ================================ About Section Start ==================================== -->
    <section class="about py-120 position-relative z-1 mash-bg-main mash-bg-main-two">
        <img src="{{ asset('frontend/assets/images/shapes/shape2.png') }}" alt="" class="shape one animation-scalation">
        <img src="{{ asset('frontend/assets/images/shapes/shape6.png') }}" alt="" class="shape four animation-scalation">

        <div class="position-relative">
            <div class="container">
                <div class="row gy-xl-0 gy-5 flex-wrap-reverse align-items-center">
                    <div class="col-xl-6">
                        <div class="about-thumbs position-relative pe-lg-5">
                            <img src="{{ asset($about_us->about_us_image) }}" alt="About Us" class="rounded-16 w-100" style="max-height: 560px; object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-content">
                            <div class="mb-40">
                                <div class="flex-align gap-8 mb-16 wow bounceInDown">
                                    <span class="w-8 h-8 bg-main-600 rounded-circle"></span>
                                    <h5 class="text-main-600 mb-0">About Us</h5>
                                </div>
                                <h2 class="mb-24 wow bounceIn">Peoples International Nursing College</h2>
                                <div class="text-neutral-500 wow bounceInUp">
                                    {!! $about_us->description !!}
                                </div>
                            </div>

                            <div class="flex-align flex-wrap gap-32 pt-40 border-top border-neutral-50 mt-40 border-dashed border-0" data-aos="fade-left" data-aos-duration="600">
                                <a href="{{ route('frontend.mission.vision.values') }}" class="btn btn-main rounded-pill flex-align gap-8">
                                    Mission &amp; Vision
                                    <i class="ph-bold ph-arrow-up-right d-flex text-lg"></i>
                                </a>
                                <a href="{{ route('frontend.executive.director.message') }}" class="btn btn-outline-main rounded-pill flex-align gap-8">
                                    Director's Message
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================================ About Section End ==================================== -->

    <!-- ============================ Quick Links Section Start ========================== -->
    <section class="py-120 position-relative z-1 bg-main-25">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="mb-24">Know More About Us</h2>
                <p>Explore our mission, leadership, and the people who make our institution what it is</p>
            </div>
            <div class="row gy-4">
                <div class="col-lg-3 col-sm-6">
                    <a href="{{ route('frontend.mission.vision.values') }}" class="d-block text-center p-32 bg-white rounded-16 border border-neutral-30 h-100 hover-bg-main-600 hover-text-white transition-2">
                        <span class="text-4xl d-inline-flex mb-16"><i class="ph-bold ph-target"></i></span>
                        <h6 class="mb-0">Mission, Vision &amp; Values</h6>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="{{ route('frontend.executive.director.message') }}" class="d-block text-center p-32 bg-white rounded-16 border border-neutral-30 h-100 hover-bg-main-600 hover-text-white transition-2">
                        <span class="text-4xl d-inline-flex mb-16"><i class="ph-bold ph-chat-centered-text"></i></span>
                        <h6 class="mb-0">Director's Message</h6>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="{{ route('frontend.executive.committee') }}" class="d-block text-center p-32 bg-white rounded-16 border border-neutral-30 h-100 hover-bg-main-600 hover-text-white transition-2">
                        <span class="text-4xl d-inline-flex mb-16"><i class="ph-bold ph-users-three"></i></span>
                        <h6 class="mb-0">Executive Committee</h6>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="{{ route('frontend.our.leadership') }}" class="d-block text-center p-32 bg-white rounded-16 border border-neutral-30 h-100 hover-bg-main-600 hover-text-white transition-2">
                        <span class="text-4xl d-inline-flex mb-16"><i class="ph-bold ph-medal"></i></span>
                        <h6 class="mb-0">Our Leadership</h6>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Quick Links Section End ========================== -->

@endsection
