@extends('frontend.dashboard')
@section('title', $trainer->name)
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => $trainer->name, 'parent' => 'Professional Academy', 'parent_url' => route('frontend.training.development')])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-4">
                    <div class="rounded-16 overflow-hidden border border-neutral-30 bg-white p-12">
                        <img src="{{ asset($trainer->trainer_image) }}" alt="{{ $trainer->name }}" class="rounded-12 w-100 object-fit-cover" style="aspect-ratio: 1/1;">
                        <div class="p-16 text-center">
                            <h4 class="mb-8">{{ $trainer->name }}</h4>
                            <span class="text-main-600 fw-medium d-block mb-4">{{ $trainer->designation }}</span>
                            @if($trainer->no_of_experience)
                                <span class="text-neutral-500 text-sm">{{ $trainer->no_of_experience }} experience</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="flex-align gap-8 mb-16">
                        <span class="w-8 h-8 bg-main-600 rounded-circle"></span>
                        <h5 class="text-main-600 mb-0">Trainer Profile</h5>
                    </div>
                    <h2 class="mb-24">{{ $trainer->name }}</h2>
                    <div class="text-neutral-500 fs-5 mb-40">
                        {!! $trainer->description !!}
                    </div>

                    @if($trainings->count())
                        <div class="pt-40 border-top border-neutral-50 border-dashed border-0">
                            <h4 class="mb-24">Courses by {{ $trainer->name }}</h4>
                            <div class="row gy-4">
                                @foreach($trainings as $training)
                                    @include('frontend.partials.training_card', ['training' => $training])
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
