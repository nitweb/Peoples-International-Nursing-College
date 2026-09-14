@extends('frontend.dashboard')
@section('title', $training_details->title)
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => $training_details->title, 'parent' => 'Professional Academy', 'parent_url' => route('frontend.training.development')])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row gy-5">

                <div class="col-lg-8">
                    <div class="rounded-16 overflow-hidden mb-32">
                        <img src="{{ $training_details->training_banner_image ? asset($training_details->training_banner_image) : ($training_details->training_image ? asset($training_details->training_image) : asset('frontend/assets/images/thumbs/course-img1.png')) }}" alt="{{ $training_details->title }}" class="w-100 rounded-16" style="max-height: 420px; object-fit: cover;">
                    </div>

                    <h2 class="mb-24">{{ $training_details->title }}</h2>

                    @if($training_details->short_description)
                        <p class="text-neutral-500 fs-5 mb-24">{{ $training_details->short_description }}</p>
                    @endif

                    <div class="text-neutral-500">
                        {!! $training_details->long_description !!}
                    </div>

                    @if($training_details->trainers->count())
                        <div class="mt-48 pt-40 border-top border-neutral-50 border-dashed border-0">
                            <h4 class="mb-24">Trainers</h4>
                            <div class="row gy-4">
                                @foreach($training_details->trainers as $trainer)
                                    <div class="col-sm-6">
                                        <a href="{{ route('frontend.trainer.details', $trainer->slug) }}" class="flex-align gap-16 p-16 bg-main-25 rounded-16 border border-neutral-30 text-decoration-none">
                                            <img src="{{ asset($trainer->trainer_image) }}" alt="{{ $trainer->name }}" class="w-64 h-64 rounded-circle object-fit-cover flex-shrink-0">
                                            <div>
                                                <h6 class="mb-4 text-neutral-700">{{ $trainer->name }}</h6>
                                                <span class="text-neutral-500 text-sm">{{ $trainer->designation }}</span>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="p-32 bg-main-25 rounded-16 border border-neutral-30 position-sticky" style="top: 24px;">
                        <div class="flex-between gap-8 pb-24 border-bottom border-neutral-50 mb-24 border-dashed border-0">
                            <span class="text-neutral-500">Regular Fee</span>
                            <h4 class="mb-0 text-main-two-600">
                                @if($training_details->regular_fee)
                                    ৳{{ number_format($training_details->regular_fee) }}
                                @else
                                    Free
                                @endif
                            </h4>
                        </div>

                        <ul class="list-unstyled mb-32">
                            @if($training_details->type)
                                <li class="flex-between gap-8 mb-16">
                                    <span class="flex-align gap-8 text-neutral-700"><i class="ph-bold ph-chart-bar"></i> Type</span>
                                    <span class="fw-medium text-neutral-700">{{ ucfirst($training_details->type) }}</span>
                                </li>
                            @endif
                            @if($training_details->duration)
                                <li class="flex-between gap-8 mb-16">
                                    <span class="flex-align gap-8 text-neutral-700"><i class="ph-bold ph-clock"></i> Duration</span>
                                    <span class="fw-medium text-neutral-700">{{ $training_details->duration }}</span>
                                </li>
                            @endif
                            @if($training_details->no_of_classes)
                                <li class="flex-between gap-8 mb-16">
                                    <span class="flex-align gap-8 text-neutral-700"><i class="ph-bold ph-video-camera"></i> Classes</span>
                                    <span class="fw-medium text-neutral-700">{{ $training_details->no_of_classes }}</span>
                                </li>
                            @endif
                            @if($training_details->course_start)
                                <li class="flex-between gap-8 mb-16">
                                    <span class="flex-align gap-8 text-neutral-700"><i class="ph-bold ph-calendar"></i> Course Start</span>
                                    <span class="fw-medium text-neutral-700">{{ \Carbon\Carbon::parse($training_details->course_start)->format('d M, Y') }}</span>
                                </li>
                            @endif
                            @if($training_details->registration_deadline)
                                <li class="flex-between gap-8 mb-16">
                                    <span class="flex-align gap-8 text-neutral-700"><i class="ph-bold ph-hourglass"></i> Registration Deadline</span>
                                    <span class="fw-medium text-neutral-700">{{ \Carbon\Carbon::parse($training_details->registration_deadline)->format('d M, Y') }}</span>
                                </li>
                            @endif
                            @if($training_details->certification)
                                <li class="flex-between gap-8">
                                    <span class="flex-align gap-8 text-neutral-700"><i class="ph-bold ph-certificate"></i> Certification</span>
                                    <span class="fw-medium text-neutral-700">{{ $training_details->certification }}</span>
                                </li>
                            @endif
                        </ul>

                        <a href="{{ route('frontend.training.enroll', $training_details->slug) }}" class="btn btn-main rounded-pill w-100 justify-content-center">
                            Enroll Now
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
