@extends('frontend.dashboard')
@section('title', 'Professional Academy')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Professional Academy'])

    <section class="course-grid-view py-120">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="mb-24">Training &amp; Development Programs</h2>
                <p>Build career-ready skills with our short courses and professional training programs</p>
            </div>

            @if($training_list->count())
                <div class="row gy-4">
                    @foreach($training_list as $training)
                        @include('frontend.partials.training_card', ['training' => $training])
                    @endforeach
                </div>

                <div class="mt-48">
                    {{ $training_list->links() }}
                </div>
            @else
                <div class="text-center py-40">
                    <p class="text-neutral-500 mb-0">No training programs available right now. Please check back soon.</p>
                </div>
            @endif
        </div>
    </section>

@endsection
