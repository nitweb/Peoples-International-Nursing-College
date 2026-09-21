@extends('frontend.dashboard')
@section('title', 'Our Services')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Our Services'])

    <section class="course-grid-view pt-120 pb-120">
        <div class="container">
            @if ($services->count())
                <div class="row gy-4">
                    @foreach ($services as $service)
                        @include('frontend.partials.service_card', ['service' => $service])
                    @endforeach
                </div>
            @else
                <div class="text-center py-40">
                    <p class="text-neutral-500 mb-0">No services available right now. Please check back soon.</p>
                </div>
            @endif
        </div>
    </section>

@endsection
