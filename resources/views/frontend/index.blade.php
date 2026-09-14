@extends('frontend.dashboard')
@section('title', 'Home')
@section('contents')

    {{-- Banner Section --}}
    @include('frontend.home.01_banner')

    {{-- Info Section --}}
    @include('frontend.home.02_info')

    <!-- ================================ About Section Start ==================================== -->
    <section class="about-three py-120 position-relative z-1 bg-main-25 overflow-hidden">
        <div class="position-relative">
            <div class="container">
                <div class="row gy-xl-0 gy-5 flex-wrap-reverse align-items-center">
                    <div class="col-xl-6 pe-xl-5">
                        <div class="about-three-thumbs position-relative me-xxl-5">
                            <div class="row gy-4">
                                <div class="col-sm-8">
                                    <img src="{{ $about_us->about_us_image ? asset($about_us->about_us_image) : asset('frontend/assets/images/thumbs/about-three-img1.png') }}" alt="About Us" class="about-three-thumbs__one rounded-16 w-100" style="object-fit: cover; max-height: 420px;">
                                </div>
                                <div class="col-sm-4">
                                    <div class="bg-main-three-600 rounded-16 text-center py-24 px-2 mb-24">
                                        <h2 class="mb-16 text-white counter">{{ $our_team->count() }}+</h2>
                                        <span class="text-white">Faculty &amp; Staff</span>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/thumbs/about-three-img2.png') }}" alt="" class="about-three-thumbs__two rounded-16 w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-three-content">
                            <div class="mb-40">
                                <div class="flex-align d-inline-flex gap-8 mb-16 wow bounceInDown">
                                    <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-first-aid-kit"></i></span>
                                    <h5 class="text-main-600 mb-0">About Us</h5>
                                </div>
                                <h2 class="mb-24 wow bounceInRight">Peoples International Nursing College</h2>
                                <div class="text-neutral-500 text-line-4 wow bounceInUp">
                                    {!! Str::limit(strip_tags($about_us->description), 260) !!}
                                </div>
                            </div>

                            <div class="grid-cols-2">
                                <div class="flex-align align-items-start gap-20 animation-item">
                                    <span class="flex-shrink-0 w-60 h-60 flex-center d-inline-flex bg-white text-main-600 text-40 rounded-16 box-shadow-md">
                                        <i class="ph-bold ph-graduation-cap"></i>
                                    </span>
                                    <div class="flex-grow-1">
                                        <h6 class="text-neutral-800 text-xl fw-medium mb-8">Diploma in Nursing</h6>
                                        <div class="flex-align gap-8 text-neutral-500">
                                            <i class="d-flex text-lg ph-bold ph-clock"></i>
                                            On Campus
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-align align-items-start gap-20 animation-item">
                                    <span class="flex-shrink-0 w-60 h-60 flex-center d-inline-flex bg-white text-main-600 text-40 rounded-16 box-shadow-md">
                                        <i class="ph-bold ph-first-aid"></i>
                                    </span>
                                    <div class="flex-grow-1">
                                        <h6 class="text-neutral-800 text-xl fw-medium mb-8">Clinical Training</h6>
                                        <div class="flex-align gap-8 text-neutral-500">
                                            <i class="d-flex text-lg ph-bold ph-clock"></i>
                                            Hospital Based
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-align align-items-start gap-20 animation-item">
                                    <span class="flex-shrink-0 w-60 h-60 flex-center d-inline-flex bg-white text-main-600 text-40 rounded-16 box-shadow-md">
                                        <i class="ph-bold ph-certificate"></i>
                                    </span>
                                    <div class="flex-grow-1">
                                        <h6 class="text-neutral-800 text-xl fw-medium mb-8">Certification</h6>
                                        <div class="flex-align gap-8 text-neutral-500">
                                            <i class="d-flex text-lg ph-bold ph-clock"></i>
                                            Govt. Recognized
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-align align-items-start gap-20 animation-item">
                                    <span class="flex-shrink-0 w-60 h-60 flex-center d-inline-flex bg-white text-main-600 text-40 rounded-16 box-shadow-md">
                                        <i class="ph-bold ph-users-three"></i>
                                    </span>
                                    <div class="flex-grow-1">
                                        <h6 class="text-neutral-800 text-xl fw-medium mb-8">Short Trainings</h6>
                                        <div class="flex-align gap-8 text-neutral-500">
                                            <i class="d-flex text-lg ph-bold ph-clock"></i>
                                            Onsite &amp; Online
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-40 border-top border-neutral-50 mt-40 border-dashed border-0">
                                <a href="{{ route('frontend.about.us') }}" class="btn btn-main rounded-pill flex-align d-inline-flex gap-8">
                                    Read More
                                    <i class="ph-bold ph-arrow-up-right d-flex text-lg"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ================================ About Section End ==================================== -->

    <!-- =================================== Video Section Start ============================= -->
    <section class="video pt-120">
        <div class="container">
            <div class="section-heading text-center">
                <div class="flex-align d-inline-flex gap-8 mb-16">
                    <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-book-open"></i></span>
                    <h5 class="text-main-600 mb-0">Campus Life</h5>
                </div>
                <h2 class="mb-24 wow bounceIn">Campus Highlights</h2>
                <p class="wow bounceInDown">Welcome to our vibrant campus, where learning comes to life in a caring and disciplined environment.</p>
            </div>
        </div>

        <div class="video-img position-relative half-bg">
            <div class="container wow bounceIn">
                <img src="{{ asset('frontend/assets/images/thumbs/video-img.png') }}" class="rounded-12 cover-img" alt="Campus">
                @if($media_videos->count())
                    <a href="{{ $media_videos->first()->embed_url }}" target="_blank" class="play-button position-absolute start-50 top-50 translate-middle z-1 w-72 h-72 flex-center bg-main-two-600 text-white rounded-circle text-2xl">
                        <i class="ph-fill ph-play"></i>
                    </a>
                @endif
            </div>
        </div>
    </section>
    <!-- =================================== Video Section End ============================= -->

    <!-- ================================= Counter Section Start ============================== -->
    <section class="counter-three py-120 bg-main-25">
        <div class="container">
            <div class="p-16 rounded-16 bg-white">
                <div class="row gy-4">
                    <div class="col-xl-3 col-sm-6 col-xs-6">
                        <div class="counter-three-item animation-item h-100 text-center px-16 py-32 rounded-12 bg-main-25 border border-neutral-30">
                            <span class="w-80 h-80 flex-center d-inline-flex bg-white text-main-600 text-40 rounded-circle box-shadow-md mb-24">
                                <i class="ph ph-chalkboard-teacher"></i>
                            </span>
                            <h2 class="display-four mb-16 text-neutral-700 counter">{{ $our_team->count() }}+</h2>
                            <span class="text-neutral-500 text-lg">Faculty &amp; Staff</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-xs-6">
                        <div class="counter-three-item animation-item h-100 text-center px-16 py-32 rounded-12 bg-main-two-25 border border-neutral-30">
                            <span class="w-80 h-80 flex-center d-inline-flex bg-white text-main-two-600 text-40 rounded-circle box-shadow-md mb-24">
                                <i class="ph ph-graduation-cap"></i>
                            </span>
                            <h2 class="display-four mb-16 text-neutral-700 counter">{{ $training_list->count() }}+</h2>
                            <span class="text-neutral-500 text-lg">Academy Programs</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-xs-6">
                        <div class="counter-three-item animation-item h-100 text-center px-16 py-32 rounded-12 bg-main-25 border border-neutral-30">
                            <span class="w-80 h-80 flex-center d-inline-flex bg-white text-main-600 text-40 rounded-circle box-shadow-md mb-24">
                                <i class="ph ph-buildings"></i>
                            </span>
                            <h2 class="display-four mb-16 text-neutral-700 counter">{{ $institutions->count() }}+</h2>
                            <span class="text-neutral-500 text-lg">Partner Institutions</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-xs-6">
                        <div class="counter-three-item animation-item h-100 text-center px-16 py-32 rounded-12 bg-main-two-25 border border-neutral-30">
                            <span class="w-80 h-80 flex-center d-inline-flex bg-white text-main-two-600 text-40 rounded-circle box-shadow-md mb-24">
                                <i class="ph ph-thumbs-up"></i>
                            </span>
                            <h2 class="display-four mb-16 text-neutral-700 counter">{{ $testimonials->count() }}+</h2>
                            <span class="text-neutral-500 text-lg">Happy Reviews</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================================= Counter Section End ============================== -->

    <!-- ============================= Academy Programs Section Start ================================= -->
    <section class="faculty pb-120 bg-main-25">
        <div class="container">
            <div class="section-heading text-center">
                <div class="flex-align d-inline-flex gap-8 mb-16 wow bounceInDown">
                    <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-book-open"></i></span>
                    <h5 class="text-main-600 mb-0">Academy</h5>
                </div>
                <h2 class="mb-24 wow bounceIn">Our Training &amp; Development Programs</h2>
                <p class="wow bounceInUp">Build career-ready skills with our professional training and short courses</p>
            </div>

            @if($training_list->count())
                <div class="row gy-4">
                    @foreach($training_list as $training)
                        @include('frontend.partials.training_card', ['training' => $training])
                    @endforeach
                </div>

                <div class="text-center mt-48">
                    <a href="{{ route('frontend.training.development') }}" class="btn btn-outline-main rounded-pill flex-align d-inline-flex gap-8">
                        View All Programs
                        <i class="ph-bold ph-arrow-up-right d-flex text-lg"></i>
                    </a>
                </div>
            @else
                <div class="text-center py-40">
                    <p class="text-neutral-500 mb-0">Program listings coming soon.</p>
                </div>
            @endif
        </div>
    </section>
    <!-- ============================= Academy Programs Section End ================================= -->

    <!-- ============================== Choose Us / Notices Section Start ================================== -->
    <section class="choose-us-two pt-120">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7 pe-xl-5">
                    <div class="pb-80 mb-lg-5 me-lg-5">
                        <div class="flex-align d-inline-flex gap-8 mb-16 wow bounceInDown">
                            <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-book-open"></i></span>
                            <h5 class="text-main-600 mb-0">Why Choose Us</h5>
                        </div>
                        <h2 class="mb-24 wow bounceIn">Quality Nursing Education Rooted in Care</h2>
                        <p class="text-neutral-500 text-line-2 wow bounceInUp">We combine strong theoretical foundations with hands-on clinical training, guided by experienced faculty, to produce skilled and compassionate nursing professionals.</p>
                        <p class="text-neutral-500 text-line-2 mt-24 wow bounceInUp">Our graduates go on to serve in hospitals, clinics, and community health settings across Bangladesh and beyond.</p>

                        <a href="{{ route('frontend.about.us') }}" class="btn btn-main rounded-pill flex-align d-inline-flex gap-8 mt-40">
                            Read More
                            <i class="ph-bold ph-arrow-up-right d-flex text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="pt-40 pb-90 px-60 bg-neutral-900 rounded-top-4" data-aos="fade-up-left">
                        <h4 class="mb-28 pb-28 border-bottom border-top-0 border-start-0 border-end-0 border-opacity-25 border-white border-dashed text-white">Latest Notices</h4>
                        @if($notices->count())
                            <ul>
                                @foreach($notices as $notice)
                                    <li class="mb-24">
                                        <a href="{{ asset($notice->files) }}" target="_blank" class="flex-align gap-12 text-white hover-text-decoration-underline">
                                            {{ Str::limit($notice->title, 40) }}
                                            <i class="text-main-two-600 ph-bold ph-arrow-right d-flex text-xl flex-shrink-0"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-white text-opacity-75 mb-0">No notices published yet.</p>
                        @endif
                        <a href="{{ route('frontend.notice.list') }}" class="text-main-two-600 fw-medium hover-text-decoration-underline">View All Notices</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================== Choose Us / Notices Section End ================================== -->

    <!-- ===================================== Testimonials Section Start ================================= -->
    <section class="testimonials-three py-120 bg-main-25 position-relative z-1 overflow-hidden">
        <img src="{{ asset('frontend/assets/images/shapes/shape2.png') }}" alt="" class="shape two animation-scalation">
        <img src="{{ asset('frontend/assets/images/shapes/shape6.png') }}" alt="" class="shape four animation-scalation">
        <img src="{{ asset('frontend/assets/images/shapes/shape4.png') }}" alt="" class="shape one animation-scalation">

        <div class="container">
            <div class="row gy-4 align-items-center flex-wrap-reverse">
                <div class="col-xl-7">
                    @if($testimonials->count())
                        <div class="testimonials-three-slider">
                            @foreach($testimonials as $testimonial)
                                <div class="testimonials-three-item bg-white p-24 rounded-12 box-shadow-md">
                                    <div class="w-90 h-90 rounded-circle position-relative mb-4">
                                        <img src="{{ $testimonial->client_image ? asset($testimonial->client_image) : asset('frontend/assets/images/thumbs/testimonials-three-img1.png') }}" alt="{{ $testimonial->client_name }}" class="cover-img rounded-circle">
                                        <span class="w-40 h-40 bg-main-two-600 flex-center border border-white border-2 rounded-circle position-absolute inset-block-end-0 inset-inline-end-0 mt--5 me--5">
                                            <img src="{{ asset('frontend/assets/images/icons/quote-two-icon.png') }}" alt="">
                                        </span>
                                    </div>
                                    <p class="text-neutral-500 my-24">{{ Str::limit($testimonial->review_text, 140) }}</p>
                                    <ul class="flex-align gap-8 mb-16">
                                        @for($i = 1; $i <= 5; $i++)
                                            <li class="text-warning-600 text-xl d-flex">
                                                <i class="ph-fill ph-star"></i>
                                            </li>
                                        @endfor
                                    </ul>
                                    <h4 class="mb-16 text-lg">{{ $testimonial->client_name }}</h4>
                                    <span class="text-neutral-500">{{ $testimonial->client_designation }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-white p-40 rounded-12 box-shadow-md text-center">
                            <p class="text-neutral-500 mb-0">Testimonials coming soon.</p>
                        </div>
                    @endif
                </div>

                <div class="col-xl-5 ps-xl-5">
                    <div class="flex-align d-inline-flex gap-8 mb-16 wow bounceInDown">
                        <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-book-open"></i></span>
                        <h5 class="text-main-600 mb-0">Testimonials</h5>
                    </div>
                    <h2 class="mb-24 wow bounceInRight">What Our Community Says</h2>
                    <p class="text-neutral-500 text-line-4 wow bounceInUp">Hear from students, alumni, and faculty about their experience at Peoples International Nursing College.</p>
                    @if($testimonials->count() > 1)
                        <div class="flex-align gap-16 mt-40">
                            <button type="button" id="testimonials-three-prev" class="slick-prev slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-600 text-xl hover-bg-main-600 hover-text-white transition-1 w-48 h-48">
                                <i class="ph ph-caret-left"></i>
                            </button>
                            <button type="button" id="testimonials-three-next" class="slick-next slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-600 text-xl hover-bg-main-600 hover-text-white transition-1 w-48 h-48">
                                <i class="ph ph-caret-right"></i>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- ===================================== Testimonials Section End ================================= -->

    <!-- =========================== Blog Section Start ============================= -->
    <section class="blog-two py-120 bg-main-25">
        <div class="container">
            <div class="section-heading text-center">
                <div class="flex-align d-inline-flex gap-8 mb-16 wow bounceInDown">
                    <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-book-open"></i></span>
                    <h5 class="text-main-600 mb-0">Latest News</h5>
                </div>
                <h2 class="mb-24 wow bounceIn">Stay Informed, Stay Inspired</h2>
                <p class="wow bounceInUp">Insights, stories, and updates from Peoples International Nursing College</p>
            </div>

            @if($blog->count())
                <div class="row gy-4">
                    @foreach($blog as $post)
                        @include('frontend.partials.blog_card', ['post' => $post])
                    @endforeach
                </div>

                <div class="text-center mt-48">
                    <a href="{{ route('frontend.blog.list') }}" class="btn btn-outline-main rounded-pill flex-align d-inline-flex gap-8">
                        View All Posts
                        <i class="ph-bold ph-arrow-up-right d-flex text-lg"></i>
                    </a>
                </div>
            @else
                <div class="text-center py-40">
                    <p class="text-neutral-500 mb-0">No blog posts published yet.</p>
                </div>
            @endif
        </div>
    </section>
    <!-- =========================== Blog Section End ============================= -->

    @if($institutions->count() || $client->count())
        <!-- ========================== Brand Section Start =========================== -->
        <div class="brand wow fadeInUpBig" data-wow-duration="1s" data-wow-delay=".5s">
            <div class="container container--lg">
                <div class="brand-box py-80 px-16 ">
                    <h5 class="mb-40 text-center text-neutral-500">OUR PARTNER INSTITUTIONS</h5>
                    <div class="container">
                        <div class="brand-slider">
                            @foreach($institutions as $institution)
                                <div class="brand-slider__item px-24">
                                    @if($institution->link)
                                        <a href="{{ $institution->link }}" target="_blank">
                                            <img src="{{ asset($institution->image) }}" alt="{{ $institution->title }}">
                                        </a>
                                    @else
                                        <img src="{{ asset($institution->image) }}" alt="{{ $institution->title }}">
                                    @endif
                                </div>
                            @endforeach
                            @foreach($client as $c)
                                <div class="brand-slider__item px-24">
                                    <img src="{{ asset($c->image) }}" alt="{{ $c->title }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========================== Brand Section End =========================== -->
    @endif

@endsection
