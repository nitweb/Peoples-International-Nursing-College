{{-- Expects $service (Service model instance, with serviceDetail loaded) --}}
<div class="col-lg-4 col-sm-6">
    <div class="course-item bg-main-25 rounded-16 p-12 h-100 border border-neutral-30">
        <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
            <a href="{{ route('frontend.service.details', $service->slug) }}" class="w-100 h-100">
                <img src="{{ $service->serviceDetail && $service->serviceDetail->service_image ? asset($service->serviceDetail->service_image) : asset('frontend/assets/images/thumbs/course-img1.png') }}" alt="{{ $service->title }}" class="course-item__img rounded-12 cover-img transition-2">
            </a>
            @if($service->serviceDetail && $service->serviceDetail->icon && $service->serviceDetail->icon !== '#!')
                <div class="flex-align gap-8 bg-main-600 rounded-pill px-16 py-12 text-white position-absolute inset-block-start-0 inset-inline-start-0 mt-20 ms-20 z-1">
                    <span class="text-2xl d-flex"><i class="{{ $service->serviceDetail->icon }}"></i></span>
                </div>
            @endif
        </div>
        <div class="course-item__content">
            <h4 class="mb-16">
                <a href="{{ route('frontend.service.details', $service->slug) }}" class="link text-line-2">{{ $service->title }}</a>
            </h4>
            @if($service->serviceDetail && $service->serviceDetail->short_description)
                <p class="text-neutral-500 text-line-3 mb-24">{{ $service->serviceDetail->short_description }}</p>
            @endif
            <a href="{{ route('frontend.service.details', $service->slug) }}" class="btn btn-outline-main rounded-pill w-100 justify-content-center flex-align gap-8">
                Learn More
                <i class="ph-bold ph-arrow-up-right d-flex text-lg"></i>
            </a>
        </div>
    </div>
</div>
