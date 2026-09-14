@extends('frontend.dashboard')
@section('title', $job_application->title)
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => $job_application->title, 'parent' => 'Career', 'parent_url' => route('frontend.career')])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-8">
                    @if($job_application->career_image)
                        <img src="{{ asset($job_application->career_image) }}" alt="{{ $job_application->title }}" class="rounded-16 w-100 mb-32" style="max-height: 360px; object-fit: cover;">
                    @endif

                    <div class="flex-between gap-16 flex-wrap mb-24">
                        <h2 class="mb-0">{{ $job_application->title }}</h2>
                        @if($job_application->is_deadline_passed)
                            <span class="badge bg-danger-focus text-danger-main px-16 py-6 rounded-pill">Closed</span>
                        @else
                            <span class="badge bg-success-focus text-success-main px-16 py-6 rounded-pill">Open</span>
                        @endif
                    </div>

                    @if($job_application->description)
                        <h5 class="mb-16">Job Description</h5>
                        <div class="text-neutral-500 mb-32">{!! $job_application->description !!}</div>
                    @endif

                    @if($job_application->requirements)
                        <h5 class="mb-16">Requirements</h5>
                        <div class="text-neutral-500 mb-32">{!! $job_application->requirements !!}</div>
                    @endif

                    @if(!$job_application->is_deadline_passed)
                        <a href="{{ route('frontend.career.details.apply', $job_application->id) }}" class="btn btn-main rounded-pill">
                            Apply for this Position
                        </a>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="p-32 bg-main-25 rounded-16 border border-neutral-30">
                        <h6 class="mb-24">Job Overview</h6>
                        <ul class="list-unstyled mb-0">
                            @if($job_application->location)
                                <li class="flex-between gap-8 mb-16">
                                    <span class="flex-align gap-8 text-neutral-700"><i class="ph-bold ph-map-pin"></i> Location</span>
                                    <span class="fw-medium text-neutral-700">{{ $job_application->location }}</span>
                                </li>
                            @endif
                            @if($job_application->job_type)
                                <li class="flex-between gap-8 mb-16">
                                    <span class="flex-align gap-8 text-neutral-700"><i class="ph-bold ph-briefcase"></i> Job Type</span>
                                    <span class="fw-medium text-neutral-700">{{ ucfirst(str_replace('-', ' ', $job_application->job_type)) }}</span>
                                </li>
                            @endif
                            @if($job_application->vacancy)
                                <li class="flex-between gap-8 mb-16">
                                    <span class="flex-align gap-8 text-neutral-700"><i class="ph-bold ph-users"></i> Vacancy</span>
                                    <span class="fw-medium text-neutral-700">{{ $job_application->vacancy }}</span>
                                </li>
                            @endif
                            @if($job_application->salary_range)
                                <li class="flex-between gap-8 mb-16">
                                    <span class="flex-align gap-8 text-neutral-700"><i class="ph-bold ph-money"></i> Salary</span>
                                    <span class="fw-medium text-neutral-700">{{ $job_application->salary_range }}</span>
                                </li>
                            @endif
                            @if($job_application->deadline)
                                <li class="flex-between gap-8">
                                    <span class="flex-align gap-8 text-neutral-700"><i class="ph-bold ph-hourglass"></i> Deadline</span>
                                    <span class="fw-medium text-neutral-700">{{ $job_application->deadline->format('d M, Y') }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
