<section class="about-three py-120 position-relative z-1 bg-main-25 overflow-hidden">
    <div class="position-relative">
        <div class="container">
            <div class="row gy-xl-0 gy-5 flex-wrap-reverse align-items-center">
                <div class="col-xl-6 pe-xl-5">
                    <div class="about-three-thumbs position-relative me-xxl-5">
                        <div class="row gy-4">
                            <div class="col-sm-12">
                                <img src="{{ $about_us->about_us_image ? asset($about_us->about_us_image) : asset('frontend/assets/images/thumbs/about-three-img1.png') }}" alt="About Us" class="about-three-thumbs__one rounded-16 w-100" style="object-fit: cover;">
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
                            <div class="text-neutral-500 wow bounceInUp">
                                {!! Str::limit($about_us->description, 700) !!}
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
