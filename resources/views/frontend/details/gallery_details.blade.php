@extends('frontend.dashboard')
@section('title', $gallery->title)
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => $gallery->title, 'parent' => 'Gallery', 'parent_url' => route('frontend.gallery')])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}" class="rounded-16 w-100 mb-32">
                    <h2 class="mb-24">{{ $gallery->title }}</h2>
                    @if($gallery->description)
                        <div class="text-neutral-500 fs-5">
                            {!! $gallery->description !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
