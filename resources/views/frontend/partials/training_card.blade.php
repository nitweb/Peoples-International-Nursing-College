{{-- Expects $training (Training model instance) --}}
<div class="col-lg-4 col-sm-6">
    <div class="course-item bg-main-25 rounded-16 p-12 h-100 border border-neutral-30">
        <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
            <a href="{{ route('frontend.training.development.details', $training->slug) }}" class="w-100 h-100">
                <img src="{{ $training->training_image ? asset($training->training_image) : asset('frontend/assets/images/thumbs/course-img1.png') }}" alt="{{ $training->title }}" class="course-item__img rounded-12 cover-img transition-2">
            </a>
            @if($training->duration)
                <div class="flex-align gap-8 bg-main-600 rounded-pill px-24 py-12 text-white position-absolute inset-block-start-0 inset-inline-start-0 mt-20 ms-20 z-1">
                    <span class="text-2xl d-flex"><i class="ph ph-clock"></i></span>
                    <span class="text-lg fw-medium">{{ $training->duration }}</span>
                </div>
            @endif
        </div>
        <div class="course-item__content">
            <div class="">
                <h4 class="mb-28">
                    <a href="{{ route('frontend.training.development.details', $training->slug) }}" class="link text-line-2">{{ $training->title }}</a>
                </h4>
                <div class="flex-between gap-8 flex-wrap mb-16">
                    @if($training->no_of_classes)
                        <div class="flex-align gap-8">
                            <span class="text-neutral-700 text-2xl d-flex"><i class="ph-bold ph-video-camera"></i></span>
                            <span class="text-neutral-700 text-lg fw-medium">{{ $training->no_of_classes }} Classes</span>
                        </div>
                    @endif
                    @if($training->type)
                        <div class="flex-align gap-8">
                            <span class="text-neutral-700 text-2xl d-flex"><i class="ph-bold ph-chart-bar"></i></span>
                            <span class="text-neutral-700 text-lg fw-medium">{{ ucfirst($training->type) }}</span>
                        </div>
                    @endif
                </div>
                @if($training->short_description)
                    <p class="text-neutral-500 text-line-2 mb-0">{{ $training->short_description }}</p>
                @endif
            </div>
            <div class="flex-between gap-8 pt-24 border-top border-neutral-50 mt-28 border-dashed border-0">
                <h4 class="mb-0 text-main-two-600">
                    @if($training->regular_fee)
                        ৳{{ number_format($training->regular_fee) }}
                    @else
                        Free
                    @endif
                </h4>
                <a href="{{ route('frontend.training.development.details', $training->slug) }}" class="flex-align gap-8 text-main-600 hover-text-decoration-underline transition-1 fw-semibold" tabindex="0">
                    View Details
                    <i class="ph ph-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
