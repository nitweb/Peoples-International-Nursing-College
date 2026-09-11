@extends('frontend.dashboard')
@section('title', 'Page Not Found')
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Page Not Found</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Page Not Found</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- error-section -->
    <section class="error-section centred">
        <div class="auto-container">
            <div class="inner-box">
                <h1>404</h1>
                <h2>page is not found. <br />the page is doesn’t exist or deleted</h2>
                <a href="{{ route('index') }}" class="theme-btn-one">Go To Home</a>
            </div>
        </div>
    </section>
    <!-- error-section end -->

@endsection
