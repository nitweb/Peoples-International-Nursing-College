@extends('frontend.dashboard')
@section('title', 'Apply for ' . $career_apply->title)
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Apply for {{ $career_apply->title }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('frontend.career') }}">Career</a></li>
                    <li>Apply</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="job-apply-section sec-pad">
        <div class="auto-container">
            <div class="col-lg-8 col-md-12 col-sm-12" style="margin: 0 auto; float:none;">
                <div style="background:#fff; border-radius:10px; box-shadow:0 0 20px rgba(0,0,0,0.08); padding:35px;">

                    @include('widgets.errors')
                    @include('widgets.success')

                    @include('frontend.partials.job_apply_form', ['career' => $career_apply])

                </div>
            </div>
        </div>
    </section>

@endsection
