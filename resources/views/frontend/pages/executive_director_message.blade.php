@extends('frontend.dashboard')
@section('title', "Executive Director's Message")
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => "Director's Message", 'parent' => 'About Us', 'parent_url' => route('frontend.about.us')])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-lg-2">
                    <img src="{{ asset($about_message->about_us_image) }}" alt="Executive Director" class="rounded-16 w-100">
                </div>
                <div class="col-lg-12">
                    <span class="text-6xl text-main-100 d-block mb-16"><i class="ph-fill ph-quotes"></i></span>
                    <div class="text-neutral-500 fs-5">{!! $about_message->description !!}</div>
                </div>
            </div>
        </div>
    </section>

@endsection
