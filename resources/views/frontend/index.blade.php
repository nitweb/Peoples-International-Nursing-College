@extends('frontend.dashboard')
@section('title', 'Home')
@section('contents')

    {{-- Banner Section --}}
    @include('frontend.home.01_banner')

    {{-- Feature Section --}}
    @include('frontend.home.02_feature')

    {{-- Our Institutions Section --}}
    @include('frontend.home.03_institutions')

    {{-- About Section --}}
    @include('frontend.home.04_about')

    {{-- What We Do Section --}}
    @include('frontend.home.05_what_we_do')

    {{-- Services Section --}}
    @include('frontend.home.06_services')

    {{-- Media Section --}}
    @include('frontend.home.07_media')

@endsection
