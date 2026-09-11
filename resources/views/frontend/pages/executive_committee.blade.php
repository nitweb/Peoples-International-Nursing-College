@extends('frontend.dashboard')
@section('title', 'Executive Committee')
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Executive Committee</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('frontend.about.us') }}">About Us</a></li>
                    <li>Executive Committee</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="team-page-section centred sec-pad">
        <div class="auto-container">
            <div class="row clearfix">
                @forelse ($executive_committee as $item)
                    @include('frontend.partials.team-card', ['item' => $item])
                @empty
                    <p style="text-align: center;">No members found.</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection
