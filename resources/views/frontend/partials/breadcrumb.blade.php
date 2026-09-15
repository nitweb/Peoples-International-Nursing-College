<!-- ==================== Breadcrumb Start Here ==================== -->
<section class="breadcrumb py-120 bg-main-25 position-relative z-1 overflow-hidden mb-0">
    <img src="{{ asset('frontend/assets/images/shapes/shape1.png') }}" alt="" class="shape one animation-rotation d-md-block d-none">
    <img src="{{ asset('frontend/assets/images/shapes/shape2.png') }}" alt="" class="shape two animation-scalation d-md-block d-none">
    <img src="{{ asset('frontend/assets/images/shapes/shape3.png') }}" alt="" class="shape eight animation-walking d-md-block d-none">
    <img src="{{ asset('frontend/assets/images/shapes/shape5.png') }}" alt="" class="shape six animation-walking d-md-block d-none">
    <img src="{{ asset('frontend/assets/images/shapes/shape4.png') }}" alt="" class="shape four animation-scalation">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb__wrapper">
                    <h1 class="breadcrumb__title display-4 fw-semibold text-center">{{ $title ?? 'Page' }}</h1>
                    <ul class="breadcrumb__list d-flex align-items-center justify-content-center gap-4">
                        <li class="breadcrumb__item">
                            <a href="{{ route('index') }}" class="breadcrumb__link text-neutral-500 hover-text-main-600 fw-medium">
                                <i class="text-lg d-inline-flex ph-bold ph-house"></i> Home</a>
                        </li>
                        @if(!empty($parent))
                            <li class="breadcrumb__item">
                                <i class="text-neutral-500 d-flex ph-bold ph-caret-right"></i>
                            </li>
                            <li class="breadcrumb__item">
                                @if(!empty($parent_url))
                                    <a href="{{ $parent_url }}" class="breadcrumb__link text-neutral-500 hover-text-main-600 fw-medium">{{ $parent }}</a>
                                @else
                                    <span class="text-neutral-500 fw-medium">{{ $parent }}</span>
                                @endif
                            </li>
                        @endif
                        <li class="breadcrumb__item">
                            <i class="text-neutral-500 d-flex ph-bold ph-caret-right"></i>
                        </li>
                        <li class="breadcrumb__item">
                            <span class="text-main-two-600">{{ $title ?? 'Page' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==================== Breadcrumb End Here ==================== -->
