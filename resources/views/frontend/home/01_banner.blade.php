<section class="banner-three position-relative responsive-arrow overflow-hidden">

    @if($slider->count() > 1)
        <button type="button" id="banner-three-prev" class="slick-arrow-prev slick-arrow flex-center rounded-circle bg-white text-main-600 hover-border-main-600 text-2xl hover-bg-main-600 hover-text-white transition-1 w-56 h-56 position-absolute ms-16 inset-inline-start-0 top-50 translate-middle-y z-3">
            <i class="ph-bold ph-arrow-left"></i>
        </button>
        <button type="button" id="banner-three-next" class="slick-arrow-next slick-arrow flex-center rounded-circle bg-white text-main-600 hover-border-main-600 text-2xl hover-bg-main-600 hover-text-white transition-1 w-56 h-56 position-absolute me-16 inset-inline-end-0 top-50 translate-middle-y z-3">
            <i class="ph-bold ph-arrow-right"></i>
        </button>
    @endif

    <div class="banner-three__slider">

        @forelse($slider as $slide)
            <div class="banner-three__item background-img bg-img linear-overlay position-relative" data-background-image="{{ asset($slide->slider_image) }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-8 col-xl-8 col-lg-10 z-1">
                            <div class="banner-content pe-md-4">
                                <div class="flex-align gap-8 mb-16 wow bounceInDown">
                                    <span class="text-yellow-600 text-2xl d-flex"><i class="ph-bold ph-first-aid-kit"></i></span>
                                    <h5 class="text-yellow-600 mb-0 fw-medium">Peoples International Nursing College</h5>
                                </div>
                                <h1 class="display2 mb-24 text-white fw-medium wow bounceInLeft">
                                    {{ $slide->title ?? 'Shaping Compassionate Nursing Professionals' }}
                                </h1>
                                @if($slide->short_description)
                                    <p class="text-white text-line-2 wow bounceInDown">{{ $slide->short_description }}</p>
                                @endif
                            </div>
                            <div class="buttons-wrapper flex-align flex-wrap gap-24 mt-40">
                                <a href="{{ $slide->link ?: route('frontend.training.development') }}" class="btn btn-main rounded-pill flex-align gap-8 wow bounceInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                                    View Details
                                    <i class="ph-bold ph-arrow-up-right d-flex text-lg"></i>
                                </a>
                                <div class="flex-align gap-16 wow bounceInRight" data-wow-duration="1s" data-wow-delay=".5s">
                                    <a href="{{ route('frontend.about.us') }}" class="text-white hover-text-decoration-underline hover-text-main-two-600">Learn More About Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="banner-three__item background-img bg-img linear-overlay position-relative" data-background-image="{{ asset('frontend/assets/images/thumbs/banner-three-img1.png') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-6 col-xl-8 col-lg-10 z-1">
                            <div class="banner-content pe-md-4">
                                <div class="flex-align gap-8 mb-16 wow bounceInDown">
                                    <span class="text-yellow-600 text-2xl d-flex"><i class="ph-bold ph-first-aid-kit"></i></span>
                                    <h5 class="text-yellow-600 mb-0 fw-medium">Peoples International Nursing College</h5>
                                </div>
                                <h1 class="display2 mb-24 text-white fw-medium wow bounceInLeft">
                                    Shaping Compassionate, Skilled Nursing Professionals
                                </h1>
                                <p class="text-white text-line-2 wow bounceInDown">Quality nursing education built on care, competence, and commitment to community health.</p>
                            </div>
                            <div class="buttons-wrapper flex-align flex-wrap gap-24 mt-40">
                                <a href="{{ route('frontend.admission') }}" class="btn btn-main rounded-pill flex-align gap-8 wow bounceInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                                    Apply for Admission
                                    <i class="ph-bold ph-arrow-up-right d-flex text-lg"></i>
                                </a>
                                <div class="flex-align gap-16 wow bounceInRight" data-wow-duration="1s" data-wow-delay=".5s">
                                    <a href="{{ route('frontend.about.us') }}" class="text-white hover-text-decoration-underline hover-text-main-two-600">Learn More About Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse

    </div>

</section>