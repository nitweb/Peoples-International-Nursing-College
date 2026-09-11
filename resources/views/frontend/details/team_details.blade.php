@extends('frontend.dashboard')
@section('title', $team->name)
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>{{ $team->name }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('frontend.team.list') }}">Team</a></li>
                    <li>Team Details</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="team-details">

        <div class="auto-container">

            <div class="team-details-content">

                <div class="row clearfix align-items-center">

                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <figure class="image-box">
                            <img src="{{ asset($team->team_image) }}" alt="{{ $team->name }}">
                        </figure>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <h2>{{ $team->name }}</h2>
                            <span class="designation">{{ $team->designation }}</span>
                            <p class="rich-content">{!! $team->description !!}</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection