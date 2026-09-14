@extends('frontend.dashboard')
@section('title', "Executive Director's Message")
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => "Director's Message", 'parent' => 'About Us', 'parent_url' => route('frontend.about.us')])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-lg-5">
                    <img src="{{ asset($about_message->about_us_image) }}" alt="Executive Director" class="rounded-16 w-100">
                </div>
                <div class="col-lg-7">
                    <div class="flex-align gap-8 mb-16">
                        <span class="w-8 h-8 bg-main-600 rounded-circle"></span>
                        <h5 class="text-main-600 mb-0">A Message From Our Executive Director</h5>
                    </div>
                    <span class="text-6xl text-main-100 d-block mb-16"><i class="ph-fill ph-quotes"></i></span>
                    <div class="text-neutral-500 fs-5">{!! $about_message->description !!}</div>
                </div>
            </div>
        </div>
    </section>

@endsection
