@extends('frontend.dashboard')
@section('title', 'Gallery')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Gallery'])

    <section class="gallery py-120">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="mb-24">Explore Our Gallery</h2>
                <p>A glimpse into campus life, events, and activities at Peoples International Nursing College</p>
            </div>

            @if($gallery->count())
                <div class="row gy-4">
                    @foreach($gallery as $item)
                        <div class="col-lg-4 col-sm-6">
                            <a href="{{ route('frontend.gallery.details', $item->id) }}" class="d-block position-relative rounded-12 overflow-hidden group">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="w-100 cover-img transition-2" style="height: 260px; object-fit: cover;">
                                <span class="position-absolute inset-block-end-0 inset-inline-start-0 w-100 p-20 text-white" style="background: linear-gradient(to top, rgba(0,0,0,.65), transparent);">
                                    <span class="fw-medium">{{ $item->title }}</span>
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-40">
                    <p class="text-neutral-500 mb-0">No gallery items published yet. Please check back soon.</p>
                </div>
            @endif
        </div>
    </section>

@endsection
