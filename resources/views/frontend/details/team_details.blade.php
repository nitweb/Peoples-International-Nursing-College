@extends('frontend.dashboard')
@section('title', $team->name)
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => $team->name, 'parent' => 'Our Team', 'parent_url' => route('frontend.team.list')])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-4">
                    <div class="rounded-16 overflow-hidden border border-neutral-30 bg-white p-12">
                        <img src="{{ asset($team->team_image) }}" alt="{{ $team->name }}" class="rounded-12 w-100 object-fit-cover" style="aspect-ratio: 1/1;">
                        <div class="p-16 text-center">
                            <h4 class="mb-8">{{ $team->name }}</h4>
                            <span class="text-main-600 fw-medium">{{ $team->designation }}</span>
                            @if ($team->qualification)
                                <p class="text-neutral-500 text-sm mt-8 mb-0">{{ $team->qualification }}</p>
                            @endif
                            @if ($team->subject)
                                <p class="text-neutral-500 text-sm mb-0">{{ $team->subject }}</p>
                            @endif
                            @if ($team->batch_year)
                                <p class="text-neutral-500 text-sm mt-8 mb-0"><i class="ph-bold ph-graduation-cap"></i> Batch {{ $team->batch_year }}</p>
                            @endif
                            @if ($team->current_position)
                                <p class="text-neutral-500 text-sm mb-0"><i class="ph-bold ph-briefcase"></i> {{ $team->current_position }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="flex-align gap-8 mb-16">
                        <span class="w-8 h-8 bg-main-600 rounded-circle"></span>
                        <h5 class="text-main-600 mb-0">Profile</h5>
                    </div>
                    <h2 class="mb-24">{{ $team->name }}</h2>
                    <div class="text-neutral-500 fs-5">
                        {!! $team->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
