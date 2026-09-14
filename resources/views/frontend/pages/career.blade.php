@extends('frontend.dashboard')
@section('title', 'Career')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Career'])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="mb-24">Current Openings</h2>
                <p>Join our team and help shape the future of nursing education</p>
            </div>

            @if($career->count())
                <div class="row gy-4">
                    @foreach($career as $job)
                        <div class="col-lg-6">
                            <div class="p-24 bg-white rounded-16 border border-neutral-30 h-100">
                                <div class="flex-between gap-16 flex-wrap mb-16">
                                    <h5 class="mb-0">
                                        <a href="{{ route('frontend.career.details', $job->slug) }}" class="link">{{ $job->title }}</a>
                                    </h5>
                                    @if($job->is_deadline_passed)
                                        <span class="badge bg-danger-focus text-danger-main px-16 py-6 rounded-pill">Closed</span>
                                    @else
                                        <span class="badge bg-success-focus text-success-main px-16 py-6 rounded-pill">Open</span>
                                    @endif
                                </div>
                                <div class="flex-align flex-wrap gap-16 mb-16">
                                    @if($job->location)
                                        <span class="flex-align gap-8 text-neutral-500 text-sm"><i class="ph-bold ph-map-pin"></i> {{ $job->location }}</span>
                                    @endif
                                    @if($job->job_type)
                                        <span class="flex-align gap-8 text-neutral-500 text-sm"><i class="ph-bold ph-briefcase"></i> {{ ucfirst(str_replace('-', ' ', $job->job_type)) }}</span>
                                    @endif
                                    @if($job->vacancy)
                                        <span class="flex-align gap-8 text-neutral-500 text-sm"><i class="ph-bold ph-users"></i> {{ $job->vacancy }} Vacancy</span>
                                    @endif
                                </div>
                                @if($job->deadline)
                                    <p class="text-neutral-500 text-sm mb-16">Application deadline: <strong>{{ $job->deadline->format('d M, Y') }}</strong></p>
                                @endif
                                <a href="{{ route('frontend.career.details', $job->slug) }}" class="flex-align gap-8 text-main-600 hover-text-decoration-underline transition-1 fw-semibold">
                                    View Details &amp; Apply
                                    <i class="ph ph-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-40">
                    <p class="text-neutral-500 mb-0">No open positions right now. Please check back soon.</p>
                </div>
            @endif
        </div>
    </section>

@endsection
