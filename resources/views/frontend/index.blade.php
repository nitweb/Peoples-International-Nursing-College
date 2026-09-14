@extends('frontend.dashboard')
@section('title', 'Home')
@section('contents')

    {{-- Banner Section --}}
    @include('frontend.home.01_banner')

    {{-- Info Section --}}
    @include('frontend.home.02_info')

    <!-- ================================ About Three Section Start ==================================== -->
    <section class="about-three py-120 position-relative z-1 bg-main-25 overflow-hidden">
        <div class="position-relative">
            <div class="container">
                <div class="row gy-xl-0 gy-5 flex-wrap-reverse align-items-center">
                    <div class="col-xl-6 pe-xl-5">
                        <div class="about-three-thumbs position-relative me-xxl-5">
                            <div class="row gy-4">
                                <div class="col-sm-8">
                                    <img src="assets/images/thumbs/about-three-img1.png" alt="" class="about-three-thumbs__one rounded-16 w-100"data-tilt data-tilt-max="16" data-tilt-speed="500" data-tilt-perspective="5000">
                                </div>
                                <div class="col-sm-4">
                                    <div class="bg-main-three-600 rounded-16 text-center py-24 px-2 mb-24" data-tilt data-tilt-max="10" data-tilt-speed="500" data-tilt-perspective="5000" data-tilt-transition="1s" data-tilt-full-page-listening>
                                        <h2 class="mb-16 text-white counter">26K+</h2>
                                        <span class="text-white">Students Active Our University</span>
                                        <div class="enrolled-students style-two mt-12">
                                            <img src="assets/images/thumbs/enroll-student-img1.png" alt="" class="w-32 h-32 rounded-circle object-fit-cove transition-2">
                                            <img src="assets/images/thumbs/enroll-student-img2.png" alt="" class="w-32 h-32 rounded-circle object-fit-cove transition-2">
                                            <img src="assets/images/thumbs/enroll-student-img3.png" alt="" class="w-32 h-32 rounded-circle object-fit-cove transition-2">
                                            <img src="assets/images/thumbs/enroll-student-img4.png" alt="" class="w-32 h-32 rounded-circle object-fit-cove transition-2">
                                            <img src="assets/images/thumbs/enroll-student-img5.png" alt="" class="w-32 h-32 rounded-circle object-fit-cove transition-2">
                                            <img src="assets/images/thumbs/enroll-student-img6.png" alt="" class="w-32 h-32 rounded-circle object-fit-cove transition-2">
                                        </div>
                                    </div>
                                    <img src="assets/images/thumbs/about-three-img2.png" alt="" class="about-three-thumbs__two rounded-16 w-100" data-tilt data-tilt-max="10" data-tilt-speed="500" data-tilt-perspective="5000" data-tilt-full-page-listening>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-three-content">
                            <div class="mb-40">
                                <div class="flex-align d-inline-flex gap-8 mb-16 wow bounceInDown">
                                    <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-book-open"></i></span>
                                    <h5 class="text-main-600 mb-0">About University Us</h5>
                                </div>
                                <h2 class="mb-24 wow bounceInRight">Our Commitment to Diversity Leadership and Governance</h2>
                                <p class="text-neutral-500 text-line-2 wow bounceInUp">We embrace innovation and creativity as catalysts for positive change, driving forward-thinking research, teaching methodologies</p>
                            </div>

                            <div class="grid-cols-2">
                                <div class="flex-align align-items-start gap-20 animation-item" data-aos="fade-up" data-aos-duration="600">
                                    <span class="flex-shrink-0 w-60 h-60 flex-center d-inline-flex bg-white text-main-600 text-40 rounded-16 box-shadow-md">
                                        <img src="assets/images/icons/choose-us-icon1.png" class="animate__swing" alt="">
                                    </span>
                                    <div class="flex-grow-1">
                                        <h6 class="text-neutral-800 text-xl fw-medium mb-8">Undergraduate</h6>
                                        <div class="flex-align gap-8 text-neutral-500">
                                            <i class="d-flex text-lg ph-bold ph-clock"></i>
                                            Onsite
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-align align-items-start gap-20 animation-item" data-aos="fade-up" data-aos-duration="800">
                                    <span class="flex-shrink-0 w-60 h-60 flex-center d-inline-flex bg-white text-main-600 text-40 rounded-16 box-shadow-md">
                                        <img src="assets/images/icons/choose-us-icon2.png" class="animate__swing" alt="">
                                    </span>
                                    <div class="flex-grow-1">
                                        <h6 class="text-neutral-800 text-xl fw-medium mb-8">Graduate</h6>
                                        <div class="flex-align gap-8 text-neutral-500">
                                            <i class="d-flex text-lg ph-bold ph-clock"></i>
                                            Onsite
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-align align-items-start gap-20 animation-item" data-aos="fade-up" data-aos-duration="1000">
                                    <span class="flex-shrink-0 w-60 h-60 flex-center d-inline-flex bg-white text-main-600 text-40 rounded-16 box-shadow-md">
                                        <img src="assets/images/icons/choose-us-icon3.png" class="animate__swing" alt="">
                                    </span>
                                    <div class="flex-grow-1">
                                        <h6 class="text-neutral-800 text-xl fw-medium mb-8">Post Graduate</h6>
                                        <div class="flex-align gap-8 text-neutral-500">
                                            <i class="d-flex text-lg ph-bold ph-clock"></i>
                                            Onsite
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-align align-items-start gap-20 animation-item" data-aos="fade-up" data-aos-duration="1200">
                                    <span class="flex-shrink-0 w-60 h-60 flex-center d-inline-flex bg-white text-main-600 text-40 rounded-16 box-shadow-md">
                                        <img src="assets/images/icons/choose-us-icon4.png" class="animate__swing" alt="">
                                    </span>
                                    <div class="flex-grow-1">
                                        <h6 class="text-neutral-800 text-xl fw-medium mb-8">Online education</h6>
                                        <div class="flex-align gap-8 text-neutral-500">
                                            <i class="d-flex text-lg ph-bold ph-clock"></i>
                                            Onsite
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-40 border-top border-neutral-50 mt-40 border-dashed border-0">
                                <a href="about.html" class="btn btn-main rounded-pill flex-align d-inline-flex gap-8">
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
    <!-- ================================ About Three Section End ==================================== -->

    <!-- =================================== Video Section Start ============================= -->
    <section class="video pt-120">
        <div class="container">
            <div class="section-heading text-center">
                <div class="flex-align d-inline-flex gap-8 mb-16">
                    <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-book-open"></i></span>
                    <h5 class="text-main-600 mb-0">Campus Life</h5>
                </div>
                <h2 class="mb-24 wow bounceIn">Campus Highlights</h2>
                <p class="wow bounceInDown">Welcome to our vibrant campus, where learning comes to life in a dynamic and inspiring environment.</p>
            </div>
        </div>

        <div class="video-img position-relative half-bg">
            <div class="container wow bounceIn">
                <img src="assets/images/thumbs/video-img.png" class="rounded-12 cover-img" alt="" data-tilt data-tilt-max="4" data-tilt-speed="500" data-tilt-perspective="5000" data-tilt-transition="1s">
                <a href="https://www.youtube.com/watch?v=MFLVmAE4cqg" class="play-button position-absolute start-50 top-50 translate-middle z-1 w-72 h-72 flex-center bg-main-two-600 text-white rounded-circle text-2xl">
                    <i class="ph-fill ph-play"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- =================================== Video Section End ============================= -->

    <!-- ================================= Counter Section Three Start ============================== -->
    <section class="counter-three py-120 bg-main-25">
        <div class="container">
            <div class="p-16 rounded-16 bg-white">
                <div class="row gy-4">
                    <div class="col-xl-3 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-duration="200">
                        <div class="counter-three-item animation-item h-100 text-center px-16 py-32 rounded-12 bg-main-25 border border-neutral-30">
                            <span class="w-80 h-80 flex-center d-inline-flex bg-white text-main-600 text-40 rounded-circle box-shadow-md mb-24">
                                <i class="animate__wobble ph ph-users"></i>
                            </span>
                            <h2 class="display-four mb-16 text-neutral-700 counter">1.6K</h2>
                            <span class="text-neutral-500 text-lg">Total Instructors </span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-duration="400">
                        <div class="counter-three-item animation-item h-100 text-center px-16 py-32 rounded-12 bg-main-two-25 border border-neutral-30">
                            <span class="w-80 h-80 flex-center d-inline-flex bg-white text-main-two-600 text-40 rounded-circle box-shadow-md mb-24">
                                <i class="animate__wobble ph ph-users-three"></i>
                            </span>
                            <h2 class="display-four mb-16 text-neutral-700 counter"> 55.6K</h2>
                            <span class="text-neutral-500 text-lg">Students till date</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-duration="600">
                        <div class="counter-three-item animation-item h-100 text-center px-16 py-32 rounded-12 bg-main-25 border border-neutral-30">
                            <span class="w-80 h-80 flex-center d-inline-flex bg-white text-main-600 text-40 rounded-circle box-shadow-md mb-24">
                                <i class="animate__wobble ph ph-thumbs-up"></i>
                            </span>
                            <h2 class="display-four mb-16 text-neutral-700 counter">45.8K</h2>
                            <span class="text-neutral-500 text-lg">Satisfaction Rate</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-duration="800">
                        <div class="counter-three-item animation-item h-100 text-center px-16 py-32 rounded-12 bg-main-two-25 border border-neutral-30">
                            <span class="w-80 h-80 flex-center d-inline-flex bg-white text-main-two-600 text-40 rounded-circle box-shadow-md mb-24">
                                <i class="animate__wobble ph ph-envelope-simple-open"></i>
                            </span>
                            <h2 class="display-four mb-16 text-neutral-700 counter">500+</h2>
                            <span class="text-neutral-500 text-lg">Total Campuses</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================================= Counter Section Three End ============================== -->

    <!-- ============================= Faculty Section Start ================================= -->
    <section class="faculty pb-120 bg-main-25">
        <div class="container">
            <div class="section-heading text-center">
                <div class="flex-align d-inline-flex gap-8 mb-16 wow bounceInDown">
                    <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-book-open"></i></span>
                    <h5 class="text-main-600 mb-0">Explore Faculty Of University</h5>
                </div>
                <h2 class="mb-24 wow bounceIn">Top Listed Faculty</h2>
                <p class=" wow bounceInUp">Certainly cordially, sweetness perceived day's end; why knowledge, a perception to cherish deeply.</p>
            </div>
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="200">
                    <div class="scale-hover-item bg-white rounded-16 p-12 h-100 box-shadow-md">
                        <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                            <a href="course-details.html" class="w-100 h-100">
                                <img src="assets/images/thumbs/faculty-img1.png" alt="Course Image" class="scale-hover-item__img rounded-12 cover-img transition-2">
                            </a>
                        </div>
                        <div class="pt-32 pb-24 px-16 position-relative">
                            <div class="">
                                <span class="text-up py-12 px-24 rounded-8 bg-main-three-600 text-white fw-medium">Admission Open</span>
                                <div class="flex-between gap-8 flex-wrap mb-16">
                                    <a href="course.html" class="py-8 px-20 rounded-8 flex-align gap-8 text-main-600 fw-medium bg-main-25 hover-bg-main-600 hover-text-white">
                                        <span class="text-xl d-flex">Explore 4,000+ Free Online
                                            <i class="ph-bold ph-squares-four"></i>
                                        </span>
                                        CSE
                                    </a>
                                    <div class="flex-align gap-4">
                                        <span class="text-2xl fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        <span class="text-lg text-neutral-700">
                                            4.7
                                            <span class="text-neutral-100">(6.4k)</span>
                                        </span>
                                    </div>
                                </div>
                                <h4 class="mb-28">
                                    <a href="course-details.html" class="link text-line-2">Faculty of Engineering Admissions</a>
                                </h4>
                                <ul class="check-list">
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Playground</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Library</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Canteen</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Stationary</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Hostel</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex-between gap-8 pt-24 border-top border-neutral-50 mt-28 border-dashed border-0">
                                <a href="contact.html" class="flex-align gap-8 text-main-600 hover-text-decoration-underline transition-1 fw-semibold" tabindex="0">
                                    Apply Now
                                    <i class="ph ph-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="400">
                    <div class="scale-hover-item bg-white rounded-16 p-12 h-100 box-shadow-md">
                        <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                            <a href="course-details.html" class="w-100 h-100">
                                <img src="assets/images/thumbs/faculty-img2.png" alt="Course Image" class="scale-hover-item__img rounded-12 cover-img transition-2">
                            </a>
                        </div>
                        <div class="pt-32 pb-24 px-16 position-relative">
                            <div class="">
                                <span class="text-up py-12 px-24 rounded-8 bg-main-two-600 text-white fw-medium">Admission Closed</span>
                                <div class="flex-between gap-8 flex-wrap mb-16">
                                    <a href="course.html" class="py-8 px-20 rounded-8 flex-align gap-8 text-main-600 fw-medium bg-main-25 hover-bg-main-600 hover-text-white">
                                        <span class="text-xl d-flex">
                                            <i class="ph-bold ph-squares-four"></i>
                                        </span>
                                        ARTS
                                    </a>
                                    <div class="flex-align gap-4">
                                        <span class="text-2xl fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        <span class="text-lg text-neutral-700">
                                            4.7
                                            <span class="text-neutral-100">(6.4k)</span>
                                        </span>
                                    </div>
                                </div>
                                <h4 class="mb-28">
                                    <a href="course-details.html" class="link text-line-2">Arts and Humanities Admissions</a>
                                </h4>
                                <ul class="check-list">
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Playground</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Library</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Canteen</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Stationary</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Hostel</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex-between gap-8 pt-24 border-top border-neutral-50 mt-28 border-dashed border-0">
                                <a href="contact.html" class="flex-align gap-8 text-main-600 hover-text-decoration-underline transition-1 fw-semibold" tabindex="0">
                                    Apply Now
                                    <i class="ph ph-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="600">
                    <div class="scale-hover-item bg-white rounded-16 p-12 h-100 box-shadow-md">
                        <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                            <a href="course-details.html" class="w-100 h-100">
                                <img src="assets/images/thumbs/faculty-img3.png" alt="Course Image" class="scale-hover-item__img rounded-12 cover-img transition-2">
                            </a>
                        </div>
                        <div class="pt-32 pb-24 px-16 position-relative">
                            <div class="">
                                <span class="text-up py-12 px-24 rounded-8 bg-main-three-600 text-white fw-medium">Admission Open</span>
                                <div class="flex-between gap-8 flex-wrap mb-16">
                                    <a href="course.html" class="py-8 px-20 rounded-8 flex-align gap-8 text-main-600 fw-medium bg-main-25 hover-bg-main-600 hover-text-white">
                                        <span class="text-xl d-flex">
                                            <i class="ph-bold ph-squares-four"></i>
                                        </span>
                                        BBA
                                    </a>
                                    <div class="flex-align gap-4">
                                        <span class="text-2xl fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        <span class="text-lg text-neutral-700">
                                            4.7
                                            <span class="text-neutral-100">(6.4k)</span>
                                        </span>
                                    </div>
                                </div>
                                <h4 class="mb-28">
                                    <a href="course-details.html" class="link text-line-2">Social And Sciences Admissions</a>
                                </h4>
                                <ul class="check-list">
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Playground</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Library</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Canteen</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Stationary</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Hostel</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex-between gap-8 pt-24 border-top border-neutral-50 mt-28 border-dashed border-0">
                                <a href="contact.html" class="flex-align gap-8 text-main-600 hover-text-decoration-underline transition-1 fw-semibold" tabindex="0">
                                    Apply Now
                                    <i class="ph ph-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="200">
                    <div class="scale-hover-item bg-white rounded-16 p-12 h-100 box-shadow-md">
                        <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                            <a href="course-details.html" class="w-100 h-100">
                                <img src="assets/images/thumbs/faculty-img4.png" alt="Course Image" class="scale-hover-item__img rounded-12 cover-img transition-2">
                            </a>
                        </div>
                        <div class="pt-32 pb-24 px-16 position-relative">
                            <div class="">
                                <span class="text-up py-12 px-24 rounded-8 bg-main-two-600 text-white fw-medium">Admission Closed</span>
                                <div class="flex-between gap-8 flex-wrap mb-16">
                                    <a href="course.html" class="py-8 px-20 rounded-8 flex-align gap-8 text-main-600 fw-medium bg-main-25 hover-bg-main-600 hover-text-white">
                                        <span class="text-xl d-flex">
                                            <i class="ph-bold ph-squares-four"></i>
                                        </span>
                                        CSE
                                    </a>
                                    <div class="flex-align gap-4">
                                        <span class="text-2xl fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        <span class="text-lg text-neutral-700">
                                            4.7
                                            <span class="text-neutral-100">(6.4k)</span>
                                        </span>
                                    </div>
                                </div>
                                <h4 class="mb-28">
                                    <a href="course-details.html" class="link text-line-2">Computer Science Admissions</a>
                                </h4>
                                <ul class="check-list">
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Playground</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Library</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Canteen</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Stationary</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Hostel</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex-between gap-8 pt-24 border-top border-neutral-50 mt-28 border-dashed border-0">
                                <a href="contact.html" class="flex-align gap-8 text-main-600 hover-text-decoration-underline transition-1 fw-semibold" tabindex="0">
                                    Apply Now
                                    <i class="ph ph-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="400">
                    <div class="scale-hover-item bg-white rounded-16 p-12 h-100 box-shadow-md">
                        <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                            <a href="course-details.html" class="w-100 h-100">
                                <img src="assets/images/thumbs/faculty-img5.png" alt="Course Image" class="scale-hover-item__img rounded-12 cover-img transition-2">
                            </a>
                        </div>
                        <div class="pt-32 pb-24 px-16 position-relative">
                            <div class="">
                                <span class="text-up py-12 px-24 rounded-8 bg-main-three-600 text-white fw-medium">Admission Open</span>
                                <div class="flex-between gap-8 flex-wrap mb-16">
                                    <a href="course.html" class="py-8 px-20 rounded-8 flex-align gap-8 text-main-600 fw-medium bg-main-25 hover-bg-main-600 hover-text-white">
                                        <span class="text-xl d-flex">
                                            <i class="ph-bold ph-squares-four"></i>
                                        </span>
                                        BBA
                                    </a>
                                    <div class="flex-align gap-4">
                                        <span class="text-2xl fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        <span class="text-lg text-neutral-700">
                                            4.7
                                            <span class="text-neutral-100">(6.4k)</span>
                                        </span>
                                    </div>
                                </div>
                                <h4 class="mb-28">
                                    <a href="course-details.html" class="link text-line-2">Business and Economics Admissions</a>
                                </h4>
                                <ul class="check-list">
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Playground</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Library</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Canteen</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Stationary</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Hostel</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex-between gap-8 pt-24 border-top border-neutral-50 mt-28 border-dashed border-0">
                                <a href="contact.html" class="flex-align gap-8 text-main-600 hover-text-decoration-underline transition-1 fw-semibold" tabindex="0">
                                    Apply Now
                                    <i class="ph ph-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="600">
                    <div class="scale-hover-item bg-white rounded-16 p-12 h-100 box-shadow-md">
                        <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                            <a href="course-details.html" class="w-100 h-100">
                                <img src="assets/images/thumbs/faculty-img6.png" alt="Course Image" class="scale-hover-item__img rounded-12 cover-img transition-2">
                            </a>
                        </div>
                        <div class="pt-32 pb-24 px-16 position-relative">
                            <div class="">
                                <span class="text-up py-12 px-24 rounded-8 bg-main-two-600 text-white fw-medium">Admission Closed</span>
                                <div class="flex-between gap-8 flex-wrap mb-16">
                                    <a href="course.html" class="py-8 px-20 rounded-8 flex-align gap-8 text-main-600 fw-medium bg-main-25 hover-bg-main-600 hover-text-white">
                                        <span class="text-xl d-flex">
                                            <i class="ph-bold ph-squares-four"></i>
                                        </span>
                                        Medical
                                    </a>
                                    <div class="flex-align gap-4">
                                        <span class="text-2xl fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        <span class="text-lg text-neutral-700">
                                            4.7
                                            <span class="text-neutral-100">(6.4k)</span>
                                        </span>
                                    </div>
                                </div>
                                <h4 class="mb-28">
                                    <a href="course-details.html" class="link text-line-2">Medicine and Health Sciences Admissions</a>
                                </h4>
                                <ul class="check-list">
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Playground</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Library</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Canteen</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Stationary</span>
                                    </li>
                                    <li class="flex-align gap-8">
                                        <img src="assets/images/icons/check.png" alt="">
                                        <span class="text-neutral-500 text-md">Hostel</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex-between gap-8 pt-24 border-top border-neutral-50 mt-28 border-dashed border-0">
                                <a href="contact.html" class="flex-align gap-8 text-main-600 hover-text-decoration-underline transition-1 fw-semibold" tabindex="0">
                                    Apply Now
                                    <i class="ph ph-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-40">
                <a href="about.html" class="btn btn-outline-main rounded-pill flex-align d-inline-flex gap-8">
                    See All University
                    <i class="ph-bold ph-arrow-up-right d-flex text-lg"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- ============================= Faculty Section End ================================= -->

    <!-- ============================== Choose Us Two Section Start ================================== -->
    <section class="choose-us-two pt-120">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7 pe-xl-5">
                    <div class="pb-80 mb-lg-5 me-lg-5">
                        <div class="flex-align d-inline-flex gap-8 mb-16 wow bounceInDown">
                            <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-book-open"></i></span>
                            <h5 class="text-main-600 mb-0">Why Choose Us</h5>
                        </div>
                        <h2 class="mb-24 wow bounceIn">We Provide a Useful, Innovative and cross-disciplinary education</h2>
                        <p class="text-neutral-500 text-line-2 wow bounceInUp">We embrace innovation and creativity as catalysts for positive change, driving forward-thinking research, teaching methodologies.</p>
                        <p class="text-neutral-500 text-line-2 mt-24 wow bounceInUp">Certainly cordially, sweetness perceived day's end; why knowledge, a perception to cherish deeply.</p>

                        <a href="about.html" class="btn btn-main rounded-pill flex-align d-inline-flex gap-8 mt-40">
                            Read More
                            <i class="ph-bold ph-arrow-up-right d-flex text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="pt-40 pb-90 px-60 bg-neutral-900 rounded-top-4" data-aos="fade-up-left">
                        <h4 class="mb-28 pb-28 border-bottom border-top-0 border-start-0 border-end-0 border-opacity-25 border-white border-dashed text-white">Important Link</h4>
                        <ul>
                            <li class="mb-24">
                                <a href="contact.html" class="flex-align gap-12 text-white hover-text-decoration-underline">
                                    Admission Notice
                                    <i class="text-main-two-600 ph-bold ph-arrow-right d-flex text-xl"></i>
                                </a>
                            </li>
                            <li class="mb-24">
                                <a href="contact.html" class="flex-align gap-12 text-white hover-text-decoration-underline">
                                    Summer Admission 2024
                                    <i class="text-main-two-600 ph-bold ph-arrow-right d-flex text-xl"></i>
                                </a>
                            </li>
                            <li class="mb-24">
                                <a href="contact.html" class="flex-align gap-12 text-white hover-text-decoration-underline">
                                    Upcoming Seminar
                                    <i class="text-main-two-600 ph-bold ph-arrow-right d-flex text-xl"></i>
                                </a>
                            </li>
                            <li class="mb-24">
                                <a href="contact.html" class="flex-align gap-12 text-white hover-text-decoration-underline">
                                    Download Curriculum
                                    <i class="text-main-two-600 ph-bold ph-arrow-right d-flex text-xl"></i>
                                </a>
                            </li>
                            <li class="mb-24">
                                <a href="contact.html" class="flex-align gap-12 text-white hover-text-decoration-underline">
                                    Alumni Seminar
                                    <i class="text-main-two-600 ph-bold ph-arrow-right d-flex text-xl"></i>
                                </a>
                            </li>
                            <li class="mb-0">
                                <a href="contact.html" class="flex-align gap-12 text-white hover-text-decoration-underline">
                                    Exam Notice
                                    <i class="text-main-two-600 ph-bold ph-arrow-right d-flex text-xl"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================== Choose Us Two Section End ================================== -->

    <!-- ===================================== Testimonials Section Three Start ================================= -->
    <section class="testimonials-three py-120 bg-main-25 position-relative z-1 overflow-hidden">
        <img src="assets/images/shapes/shape2.png" alt="" class="shape two animation-scalation">
        <img src="assets/images/shapes/shape6.png" alt="" class="shape four animation-scalation">
        <img src="assets/images/shapes/shape4.png" alt="" class="shape one animation-scalation">

        <div class="container">
            <div class="row gy-4 align-items-center flex-wrap-reverse">
                <div class="col-xl-7">
                    <div class="testimonials-three-slider">
                        <div class="testimonials-three-item bg-white p-24 rounded-12 box-shadow-md">
                            <div class="w-90 h-90 rounded-circle position-relative mb-4">
                                <img src="assets/images/thumbs/testimonials-three-img2.png" alt="" class="cover-img rounded-circle">
                                <span class="w-40 h-40 bg-main-two-600 flex-center border border-white border-2 rounded-circle position-absolute inset-block-end-0 inset-inline-end-0 mt--5 me--5">
                                    <img src="assets/images/icons/quote-two-icon.png" alt="">
                                </span>
                            </div>
                            <p class="text-neutral-500 my-24">Attending [University Name] was one of the best decisions I've made. The </p>
                            <ul class="flex-align gap-8 mb-16">
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star"></i></li>
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star"></i></li>
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star"></i></li>
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star"></i></li>
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star-half"></i></li>
                            </ul>
                            <h4 class="mb-16 text-lg">Ronald Richards</h4>
                            <span class="text-neutral-500">Student</span>
                        </div>
                        <div class="testimonials-three-item bg-white p-24 rounded-12 box-shadow-md">
                            <div class="w-90 h-90 rounded-circle position-relative mb-4">
                                <img src="assets/images/thumbs/testimonials-three-img1.png" alt="" class="cover-img rounded-circle">
                                <span class="w-40 h-40 bg-main-two-600 flex-center border border-white border-2 rounded-circle position-absolute inset-block-end-0 inset-inline-end-0 mt--5 me--5">
                                    <img src="assets/images/icons/quote-two-icon.png" alt="">
                                </span>
                            </div>
                            <p class="text-neutral-500 my-24">"The faculty at are not only experts in their fields but teaching students."</p>
                            <ul class="flex-align gap-8 mb-16">
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star"></i></li>
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star"></i></li>
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star"></i></li>
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star"></i></li>
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star-half"></i></li>
                            </ul>
                            <h4 class="mb-16 text-lg">Brooklyn Simmons</h4>
                            <span class="text-neutral-500">Student</span>
                        </div>
                        <div class="testimonials-three-item bg-white p-24 rounded-12 box-shadow-md">
                            <div class="w-90 h-90 rounded-circle position-relative mb-4">
                                <img src="assets/images/thumbs/testimonials-three-img3.png" alt="" class="cover-img rounded-circle">
                                <span class="w-40 h-40 bg-main-two-600 flex-center border border-white border-2 rounded-circle position-absolute inset-block-end-0 inset-inline-end-0 mt--5 me--5">
                                    <img src="assets/images/icons/quote-two-icon.png" alt="">
                                </span>
                            </div>
                            <p class="text-neutral-500 my-24">As a faculty member at [University Name], I've had the privilege of working</p>
                            <ul class="flex-align gap-8 mb-16">
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star"></i></li>
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star"></i></li>
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star"></i></li>
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star"></i></li>
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star-half"></i></li>
                            </ul>
                            <h4 class="mb-16 text-lg">Courtney Henry</h4>
                            <span class="text-neutral-500">Student</span>
                        </div>
                        <div class="testimonials-three-item bg-white p-24 rounded-12 box-shadow-md">
                            <div class="w-90 h-90 rounded-circle position-relative mb-4">
                                <img src="assets/images/thumbs/testimonials-three-img3.png" alt="" class="cover-img rounded-circle">
                                <span class="w-40 h-40 bg-main-two-600 flex-center border border-white border-2 rounded-circle position-absolute inset-block-end-0 inset-inline-end-0 mt--5 me--5">
                                    <img src="assets/images/icons/quote-two-icon.png" alt="">
                                </span>
                            </div>
                            <p class="text-neutral-500 my-24">"The faculty at are not only experts in their fields but teaching students."</p>
                            <ul class="flex-align gap-8 mb-16">
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star"></i></li>
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star"></i></li>
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star"></i></li>
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star"></i></li>
                                <li class="text-warning-600 text-xl d-flex"><i class="ph-fill ph-star-half"></i></li>
                            </ul>
                            <h4 class="mb-16 text-lg">Brooklyn Simmons</h4>
                            <span class="text-neutral-500">Student</span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-5 ps-xl-5">
                    <div class="flex-align d-inline-flex gap-8 mb-16 wow bounceInDown">
                        <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-book-open"></i></span>
                        <h5 class="text-main-600 mb-0">Testimonials</h5>
                    </div>
                    <h2 class="mb-24 wow bounceInRight">What Our Community Says</h2>
                    <p class="text-neutral-500 text-line-4 wow bounceInUp">Welcome to our testimonial section, where members of our university community share their experiences and insights about life at EduAll. We invite you to join us and be part of our inspiring journey of learning, growth, and achievement.</p>
                    <div class="flex-align gap-16 mt-40">
                        <button type="button" id="testimonials-three-prev" class="slick-prev slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-600 text-xl hover-bg-main-600 hover-text-white transition-1 w-48 h-48" style="">
                            <i class="ph ph-caret-left"></i>
                        </button>
                        <button type="button" id="testimonials-three-next" class="slick-next slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-600 text-xl hover-bg-main-600 hover-text-white transition-1 w-48 h-48" style="">
                            <i class="ph ph-caret-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===================================== Testimonials Section Three End ================================= -->

    <!-- ===================================== Event Section Start ================================= -->
    <section class="event py-120 overflow-hidden">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-8 pe-lg-5">
                    <div class="section-heading style-left">
                        <div class="flex-align d-inline-flex gap-8 mb-16 wow bounceInDown">
                            <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-book-open"></i></span>
                            <h5 class="text-main-600 mb-0">Upcoming Events</h5>
                        </div>
                        <h2 class="mb-24 wow bounceInRight">Join Our Upcoming Events </h2>
                        <p class="text-neutral-500 text-line-4 wow bounceInUp">Join us for a variety of exciting events that cater to your interests and learning needs. Our events are designed to inspire and educate</p>
                    </div>

                    <div class="event-item-wrapper overflow-x-auto scroll-sm scroll-sm-horizontal pb-4">
                        <div class="event-item bg-main-25 rounded-12 p-24 d-flex align-items-center border border-neutral-20 min-width-max-content hover-bg-main-600 hover-border-main-600 hover-text-white transition-1 mb-24" data-aos="fade-up-left" data-aos-duration="200">
                            <div class="">
                                <h3 class="mb-8 text-main-600">25</h3>
                                <span class="text-neutral-500">May, 2024</span>
                            </div>
                            <span class="border border-neutral-40 border-dashed h-72"></span>
                            <div class="">
                                <div class="flex-between gap-16 flex-wrap mb-16">
                                    <div class="flex-align gap-8">
                                        <span class="text-neutral-700 text-lg d-flex"><i class="ph-bold ph-clock"></i></span>
                                        <span class="text-neutral-700 text-lg fw-normal">02:30:am to 04:25:pm</span>
                                    </div>
                                    <div class="flex-align gap-8">
                                        <span class="text-neutral-700 text-lg d-flex"><i class="ph-bold ph-map-trifold"></i></span>
                                        <span class="text-neutral-700 text-lg fw-normal">New York</span>
                                    </div>
                                </div>
                                <h4 class="mt-12 mb-0">Community Service Events</h4>
                            </div>
                            <span class="border border-neutral-40 border-dashed h-72"></span>
                            <div class="flex-shrink-0">
                                <a href="about.html" class="btn btn-outline-main rounded-pill flex-align d-inline-flex gap-8">
                                    Join Now
                                    <i class="ph-bold ph-arrow-up-right d-flex text-lg"></i>
                                </a>
                            </div>
                        </div>
                        <div class="event-item bg-main-25 rounded-12 p-24 d-flex align-items-center border border-neutral-20 min-width-max-content hover-bg-main-600 hover-border-main-600 hover-text-white transition-1 mb-24" data-aos="fade-up-left" data-aos-duration="400">
                            <div class="">
                                <h3 class="mb-8 text-main-600">12</h3>
                                <span class="text-neutral-500">Jun, 2024</span>
                            </div>
                            <span class="border border-neutral-40 border-dashed h-72"></span>
                            <div class="">
                                <div class="flex-between gap-16 flex-wrap mb-16">
                                    <div class="flex-align gap-8">
                                        <span class="text-neutral-700 text-lg d-flex"><i class="ph-bold ph-clock"></i></span>
                                        <span class="text-neutral-700 text-lg fw-normal">02:30:am to 04:25:pm</span>
                                    </div>
                                    <div class="flex-align gap-8">
                                        <span class="text-neutral-700 text-lg d-flex"><i class="ph-bold ph-map-trifold"></i></span>
                                        <span class="text-neutral-700 text-lg fw-normal">New York</span>
                                    </div>
                                </div>
                                <h4 class="mt-12 mb-0">Sports & Health Promotion</h4>
                            </div>
                            <span class="border border-neutral-40 border-dashed h-72"></span>
                            <div class="flex-shrink-0">
                                <a href="about.html" class="btn btn-outline-main rounded-pill flex-align d-inline-flex gap-8">
                                    Join Now
                                    <i class="ph-bold ph-arrow-up-right d-flex text-lg"></i>
                                </a>
                            </div>
                        </div>
                        <div class="event-item bg-main-25 rounded-12 p-24 d-flex align-items-center border border-neutral-20 min-width-max-content hover-bg-main-600 hover-border-main-600 hover-text-white transition-1 mb-0" data-aos="fade-up-left" data-aos-duration="500">
                            <div class="">
                                <h3 class="mb-8 text-main-600">29</h3>
                                <span class="text-neutral-500">Jul, 2024</span>
                            </div>
                            <span class="border border-neutral-40 border-dashed h-72"></span>
                            <div class="">
                                <div class="flex-between gap-16 flex-wrap mb-16">
                                    <div class="flex-align gap-8">
                                        <span class="text-neutral-700 text-lg d-flex"><i class="ph-bold ph-clock"></i></span>
                                        <span class="text-neutral-700 text-lg fw-normal">02:30:am to 04:25:pm</span>
                                    </div>
                                    <div class="flex-align gap-8">
                                        <span class="text-neutral-700 text-lg d-flex"><i class="ph-bold ph-map-trifold"></i></span>
                                        <span class="text-neutral-700 text-lg fw-normal">New York</span>
                                    </div>
                                </div>
                                <h4 class="mt-12 mb-0">Career Fair Festivals</h4>
                            </div>
                            <span class="border border-neutral-40 border-dashed h-72"></span>
                            <div class="flex-shrink-0">
                                <a href="about.html" class="btn btn-outline-main rounded-pill flex-align d-inline-flex gap-8">
                                    Join Now
                                    <i class="ph-bold ph-arrow-up-right d-flex text-lg"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="course.html" class="btn btn-outline-main rounded-pill flex-align d-inline-flex gap-8 mt-40">
                        See All Events
                        <i class="ph-bold ph-arrow-up-right d-flex text-lg"></i>
                    </a>

                </div>
                <div class="col-lg-4">
                    <div class="event-video rounded-16 overflow-hidden position-relative h-100 wow bounceIn">
                        <img src="assets/images/thumbs/event-video-img.png" class="rounded-16 cover-img" alt="" data-tilt data-tilt-max="8" data-tilt-speed="500" data-tilt-perspective="5000" data-tilt-transition="1s" data-tilt-full-page-listening>
                        <a href="https://www.youtube.com/watch?v=MFLVmAE4cqg" class="play-button position-absolute start-50 top-50 translate-middle z-1 w-72 h-72 flex-center bg-main-two-600 text-white rounded-circle text-2xl">
                            <i class="ph-fill ph-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===================================== Event Section End ================================= -->


    <!-- =========================== Blog Two SEction Start ============================= -->
    <section class="blog-two py-120 bg-main-25">
        <div class="container">
            <div class="section-heading text-center">
                <div class="flex-align d-inline-flex gap-8 mb-16 wow bounceInDown">
                    <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-book-open"></i></span>
                    <h5 class="text-main-600 mb-0">Latest News</h5>
                </div>
                <h2 class="mb-24 wow bounceIn">Stay Informed, Stay Inspired</h2>
                <p class=" wow bounceInUp">Welcome to our blog, where we share insights, stories, and updates on topics ranging from education</p>
            </div>
            <div class="blog-two-slider">
                <div class="scale-hover-item bg-white rounded-16 p-12 h-100" data-aos="fade-up" data-aos-duration="200">
                    <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                        <a href="blog-details.html" class="w-100 h-100">
                            <img src="assets/images/thumbs/blog-two-img1.png" alt="Course Image" class="scale-hover-item__img rounded-12 cover-img transition-2">
                        </a>
                        <div class="position-absolute inset-inline-end-0 inset-block-end-0 me-16 mb-16 py-12 px-24 rounded-8 bg-main-three-600 text-white fw-medium">
                            <h3 class="mb-0 text-white fw-medium">21</h3>
                            DEC
                        </div>
                    </div>
                    <div class="pt-32 pb-24 px-16 position-relative">
                        <h4 class="mb-28">
                            <a href="blog-details.html" class="link text-line-2">Navigating the Job Market: Advice for Graduates</a>
                        </h4>
                        <div class="flex-align gap-14 flex-wrap my-20">
                            <div class="flex-align gap-8">
                                <span class="text-neutral-500 text-2xl d-flex"><i class="ph ph-user-circle"></i></span>
                                <span class="text-neutral-500 text-lg">By Admin</span>
                            </div>
                            <span class="w-8 h-8 bg-neutral-100 rounded-circle"></span>
                            <div class="flex-align gap-8">
                                <span class="text-neutral-500 text-2xl d-flex"><i class="ph-bold ph-eye"></i></span>
                                <span class="text-neutral-500 text-lg">1.6k</span>
                            </div>
                            <span class="w-8 h-8 bg-neutral-100 rounded-circle"></span>
                            <div class="flex-align gap-8">
                                <span class="text-neutral-500 text-2xl d-flex"><i class="ph ph-chat-dots"></i></span>
                                <span class="text-neutral-500 text-lg">24</span>
                            </div>
                        </div>
                        <div class="flex-between gap-8 pt-24 border-top border-neutral-50 mt-28 border-dashed border-0">
                            <a href="blog-details.html" class="flex-align gap-8 text-main-600 hover-text-decoration-underline transition-1 fw-semibold" tabindex="0">
                                Read More
                                <i class="ph ph-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="scale-hover-item bg-white rounded-16 p-12 h-100" data-aos="fade-up" data-aos-duration="400">
                    <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                        <a href="blog-details.html" class="w-100 h-100">
                            <img src="assets/images/thumbs/blog-two-img2.png" alt="Course Image" class="scale-hover-item__img rounded-12 cover-img transition-2">
                        </a>
                        <div class="position-absolute inset-inline-end-0 inset-block-end-0 me-16 mb-16 py-12 px-24 rounded-8 bg-main-three-600 text-white fw-medium">
                            <h3 class="mb-0 text-white fw-medium">21</h3>
                            DEC
                        </div>
                    </div>
                    <div class="pt-32 pb-24 px-16 position-relative">
                        <h4 class="mb-28">
                            <a href="blog-details.html" class="link text-line-2">The Importance of Diversity in Higher Education</a>
                        </h4>
                        <div class="flex-align gap-14 flex-wrap my-20">
                            <div class="flex-align gap-8">
                                <span class="text-neutral-500 text-2xl d-flex"><i class="ph ph-user-circle"></i></span>
                                <span class="text-neutral-500 text-lg">By Admin</span>
                            </div>
                            <span class="w-8 h-8 bg-neutral-100 rounded-circle"></span>
                            <div class="flex-align gap-8">
                                <span class="text-neutral-500 text-2xl d-flex"><i class="ph-bold ph-eye"></i></span>
                                <span class="text-neutral-500 text-lg">1.6k</span>
                            </div>
                            <span class="w-8 h-8 bg-neutral-100 rounded-circle"></span>
                            <div class="flex-align gap-8">
                                <span class="text-neutral-500 text-2xl d-flex"><i class="ph ph-chat-dots"></i></span>
                                <span class="text-neutral-500 text-lg">24</span>
                            </div>
                        </div>
                        <div class="flex-between gap-8 pt-24 border-top border-neutral-50 mt-28 border-dashed border-0">
                            <a href="blog-details.html" class="flex-align gap-8 text-main-600 hover-text-decoration-underline transition-1 fw-semibold" tabindex="0">
                                Read More
                                <i class="ph ph-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="scale-hover-item bg-white rounded-16 p-12 h-100" data-aos="fade-up" data-aos-duration="600">
                    <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                        <a href="blog-details.html" class="w-100 h-100">
                            <img src="assets/images/thumbs/blog-two-img3.png" alt="Course Image" class="scale-hover-item__img rounded-12 cover-img transition-2">
                        </a>
                        <div class="position-absolute inset-inline-end-0 inset-block-end-0 me-16 mb-16 py-12 px-24 rounded-8 bg-main-three-600 text-white fw-medium">
                            <h3 class="mb-0 text-white fw-medium">21</h3>
                            DEC
                        </div>
                    </div>
                    <div class="pt-32 pb-24 px-16 position-relative">
                        <h4 class="mb-28">
                            <a href="blog-details.html" class="link text-line-2">10 Tips for Successful Online Learning</a>
                        </h4>
                        <div class="flex-align gap-14 flex-wrap my-20">
                            <div class="flex-align gap-8">
                                <span class="text-neutral-500 text-2xl d-flex"><i class="ph ph-user-circle"></i></span>
                                <span class="text-neutral-500 text-lg">By Admin</span>
                            </div>
                            <span class="w-8 h-8 bg-neutral-100 rounded-circle"></span>
                            <div class="flex-align gap-8">
                                <span class="text-neutral-500 text-2xl d-flex"><i class="ph-bold ph-eye"></i></span>
                                <span class="text-neutral-500 text-lg">1.6k</span>
                            </div>
                            <span class="w-8 h-8 bg-neutral-100 rounded-circle"></span>
                            <div class="flex-align gap-8">
                                <span class="text-neutral-500 text-2xl d-flex"><i class="ph ph-chat-dots"></i></span>
                                <span class="text-neutral-500 text-lg">24</span>
                            </div>
                        </div>
                        <div class="flex-between gap-8 pt-24 border-top border-neutral-50 mt-28 border-dashed border-0">
                            <a href="blog-details.html" class="flex-align gap-8 text-main-600 hover-text-decoration-underline transition-1 fw-semibold" tabindex="0">
                                Read More
                                <i class="ph ph-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="scale-hover-item bg-white rounded-16 p-12 h-100" data-aos="fade-up" data-aos-duration="800">
                    <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                        <a href="blog-details.html" class="w-100 h-100">
                            <img src="assets/images/thumbs/blog-two-img2.png" alt="Course Image" class="scale-hover-item__img rounded-12 cover-img transition-2">
                        </a>
                        <div class="position-absolute inset-inline-end-0 inset-block-end-0 me-16 mb-16 py-12 px-24 rounded-8 bg-main-three-600 text-white fw-medium">
                            <h3 class="mb-0 text-white fw-medium">21</h3>
                            DEC
                        </div>
                    </div>
                    <div class="pt-32 pb-24 px-16 position-relative">
                        <h4 class="mb-28">
                            <a href="blog-details.html" class="link text-line-2">The Importance of Diversity in Higher Education</a>
                        </h4>
                        <div class="flex-align gap-14 flex-wrap my-20">
                            <div class="flex-align gap-8">
                                <span class="text-neutral-500 text-2xl d-flex"><i class="ph ph-user-circle"></i></span>
                                <span class="text-neutral-500 text-lg">By Admin</span>
                            </div>
                            <span class="w-8 h-8 bg-neutral-100 rounded-circle"></span>
                            <div class="flex-align gap-8">
                                <span class="text-neutral-500 text-2xl d-flex"><i class="ph-bold ph-eye"></i></span>
                                <span class="text-neutral-500 text-lg">1.6k</span>
                            </div>
                            <span class="w-8 h-8 bg-neutral-100 rounded-circle"></span>
                            <div class="flex-align gap-8">
                                <span class="text-neutral-500 text-2xl d-flex"><i class="ph ph-chat-dots"></i></span>
                                <span class="text-neutral-500 text-lg">24</span>
                            </div>
                        </div>
                        <div class="flex-between gap-8 pt-24 border-top border-neutral-50 mt-28 border-dashed border-0">
                            <a href="blog-details.html" class="flex-align gap-8 text-main-600 hover-text-decoration-underline transition-1 fw-semibold" tabindex="0">
                                Read More
                                <i class="ph ph-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-align gap-16 mt-40 justify-content-center">
                <button type="button" id="blog-two-prev" class="slick-prev slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-600 text-xl hover-bg-main-600 hover-text-white transition-1 w-48 h-48" style="">
                    <i class="ph ph-caret-left"></i>
                </button>
                <button type="button" id="blog-two-next" class="slick-next slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-600 text-xl hover-bg-main-600 hover-text-white transition-1 w-48 h-48" style="">
                    <i class="ph ph-caret-right"></i>
                </button>
            </div>
        </div>
    </section>
    <!-- =========================== Blog Two SEction End ============================= -->


    <!-- ========================== Brand Section Start =========================== -->
    <div class="brand wow fadeInUpBig" data-wow-duration="1s" data-wow-delay=".5s">
        <div class="container container--lg">
            <div class="brand-box py-80 px-16 ">
                <h5 class="mb-40 text-center text-neutral-500">TRUSTED BY OVER 17,300 GREAT TEAMS</h5>
                <div class="container">
                    <div class="brand-slider">
                        <div class="brand-slider__item px-24">
                            <img src="assets/images/thumbs/brand-img1.png" alt="">
                        </div>
                        <div class="brand-slider__item px-24">
                            <img src="assets/images/thumbs/brand-img2.png" alt="">
                        </div>
                        <div class="brand-slider__item px-24">
                            <img src="assets/images/thumbs/brand-img3.png" alt="">
                        </div>
                        <div class="brand-slider__item px-24">
                            <img src="assets/images/thumbs/brand-img4.png" alt="">
                        </div>
                        <div class="brand-slider__item px-24">
                            <img src="assets/images/thumbs/brand-img5.png" alt="">
                        </div>
                        <div class="brand-slider__item px-24">
                            <img src="assets/images/thumbs/brand-img6.png" alt="">
                        </div>
                        <div class="brand-slider__item px-24">
                            <img src="assets/images/thumbs/brand-img7.png" alt="">
                        </div>
                        <div class="brand-slider__item px-24">
                            <img src="assets/images/thumbs/brand-img3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========================== Brand Section End =========================== -->

@endsection
