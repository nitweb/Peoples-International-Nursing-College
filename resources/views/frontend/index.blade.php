@extends('frontend.dashboard')
@section('title', 'Home')
@section('contents')

    {{-- Banner Section --}}
    @include('frontend.home.01_banner')

    {{-- Info Section --}}
    @include('frontend.home.02_info')

    {{-- About Section --}}
    @include('frontend.home.03_about')

    {{-- Video Section --}}
    @include('frontend.home.04_video')

    {{-- Counter Section --}}
    @include('frontend.home.05_counter')

    {{-- Academy Programs Section --}}
    @include('frontend.home.06_academy_programs')

    {{-- Choose Us / Notices Section --}}
    @include('frontend.home.07_choose_us')

    {{-- Testimonials Section --}}
    @include('frontend.home.08_testimonials')

    {{-- Blog Section --}}
    @include('frontend.home.09_blog')

    {{-- Brand Section --}}
    @include('frontend.home.10_brand')

@endsection
