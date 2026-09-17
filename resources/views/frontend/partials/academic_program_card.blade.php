{{-- Expects $training (Training model instance, category = academic_program) --}}
<div class="col-lg-4 col-sm-6">
    <div class="course-item bg-main-25 rounded-16 p-12 h-100 border border-neutral-30">
        <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
            <a href="{{ route('frontend.training.development.details', $training->slug) }}" class="w-100 h-100">
                <img src="{{ $training->training_image ? asset($training->training_image) : asset('frontend/assets/images/thumbs/course-img1.png') }}" alt="{{ $training->title }}" class="course-item__img rounded-12 cover-img transition-2">
            </a>
            @if ($training->program_level)
                <div class="flex-align gap-8 bg-main-600 rounded-pill px-24 py-12 text-white position-absolute inset-block-start-0 inset-inline-start-0 mt-20 ms-20 z-1">
                    <span class="text-2xl d-flex"><i class="ph ph-graduation-cap"></i></span>
                    <span class="text-lg fw-medium">{{ $training->program_level }}</span>
                </div>
            @endif
        </div>
        <div class="course-item__content">
            <div class="">
                <h4 class="mb-16">
                    <a href="{{ route('frontend.training.development.details', $training->slug) }}" class="link text-line-2">{{ $training->title }}</a>
                </h4>
                <div class="flex-between gap-8 flex-wrap mb-16">
                    @if ($training->duration)
                        <div class="flex-align gap-8">
                            <span class="text-neutral-700 text-2xl d-flex"><i class="ph-bold ph-clock"></i></span>
                            <span class="text-neutral-700 text-lg fw-medium">{{ $training->duration }}</span>
                        </div>
                    @endif
                    @if ($training->total_seats)
                        <div class="flex-align gap-8">
                            <span class="text-neutral-700 text-2xl d-flex"><i class="ph-bold ph-users-three"></i></span>
                            <span class="text-neutral-700 text-lg fw-medium">{{ $training->total_seats }} Seats</span>
                        </div>
                    @endif
                </div>
                @if ($training->affiliation)
                    <p class="text-neutral-500 text-sm mb-8">
                        <i class="ph-bold ph-seal-check text-main-600"></i> {{ $training->affiliation }}
                    </p>
                @endif
                @if ($training->short_description)
                    <p class="text-neutral-500 text-line-2 mb-0">{{ $training->short_description }}</p>
                @endif
            </div>
            <div class="flex-between gap-8 pt-24 border-top border-neutral-50 mt-28 border-dashed border-0">
                <a href="{{ route('frontend.training.development.details', $training->slug) }}" class="btn btn-main rounded-pill px-24 py-8">
                    Program Details
                </a>
                <a href="{{ route('frontend.training.development.details', $training->slug) }}" class="flex-align gap-8 text-main-600 hover-text-decoration-underline transition-1 fw-semibold" tabindex="0">
                    Eligibility &amp; Fees
                    <i class="ph ph-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
