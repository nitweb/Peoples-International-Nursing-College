@extends('frontend.dashboard')
@section('title', 'Meet Our Team')
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Meet Our Team</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('frontend.about.us') }}">About Us</a></li>
                    <li>Meet Our Team</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="team-page-section centred sec-pad">
        <div class="auto-container">
            <div class="row clearfix">
                @forelse ($team as $item)
                    @include('frontend.partials.team-card', ['item' => $item])
                @empty
                    <p style="text-align: center;">No team members found.</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection
