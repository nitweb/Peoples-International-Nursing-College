@extends('frontend.dashboard')
@section('title', 'Our Team')
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Our Team</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Team List</li>
                </ul>
            </div>
        </div>
    </section>

    {{-- Executive Committee --}}
    <section class="team-page-section centred">
        <div class="auto-container">
            <div class="auto-container">
                <div class="sec-title centred mb_55">
                    <h2>Executive Committee</h2>
                </div>
            </div>
            <div class="row clearfix">
                @if ($executive_committee->isEmpty())
                    <p style="text-align: center;">No team members found.</p>
                @else
                    @foreach ($executive_committee as $item)
                        <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                            <div class="team-block-two">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ asset($item->team_image) }}" alt="{{ $item->name }}">
                                    </figure>
                                    <div class="lower-content">
                                        <h3><a href="{{ route('frontend.team.details', $item->slug) }}">{{ $item->name }}</a></h3>
                                        <span class="designation">{{ $item->designation }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    {{-- Our Leadership --}}
    <section class="team-page-section centred pt-0">
        <div class="auto-container">
            <div class="auto-container">
                <div class="sec-title centred mb_55">
                    <h2>Our Leadership</h2>
                </div>
            </div>
            <div class="row clearfix">
                @if ($leadership->isEmpty())
                    <p style="text-align: center;">No team members found.</p>
                @else
                    @foreach ($leadership as $item)
                        <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                            <div class="team-block-two">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ asset($item->team_image) }}" alt="{{ $item->name }}">
                                    </figure>
                                    <div class="lower-content">
                                        <h3><a href="{{ route('frontend.team.details', $item->slug) }}">{{ $item->name }}</a></h3>
                                        <span class="designation">{{ $item->designation }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    {{-- Our Partners --}}
    <section class="team-page-section centred pt-0">
        <div class="auto-container">
            <div class="auto-container">
                <div class="sec-title centred mb_55">
                    <h2>Our Partners</h2>
                </div>
            </div>
            <div class="row clearfix">
                @if ($partners->isEmpty())
                    <p style="text-align: center;">No team members found.</p>
                @else
                    @foreach ($partners as $item)
                        <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                            <div class="team-block-two">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ asset($item->team_image) }}" alt="{{ $item->name }}">
                                    </figure>
                                    <div class="lower-content">
                                        <h3><a href="{{ route('frontend.team.details', $item->slug) }}">{{ $item->name }}</a></h3>
                                        <span class="designation">{{ $item->designation }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    {{-- Meet Our Team --}}
    <section class="team-page-section centred pt-0">
        <div class="auto-container">
            <div class="auto-container">
                <div class="sec-title centred mb_55">
                    <h2>Meet Our Team</h2>
                </div>
            </div>
            <div class="row clearfix">
                @if ($team->isEmpty())
                    <p style="text-align: center;">No team members found.</p>
                @else
                    @foreach ($team as $item)
                        <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                            <div class="team-block-two">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ asset($item->team_image) }}" alt="{{ $item->name }}">
                                    </figure>
                                    <div class="lower-content">
                                        <h3><a href="{{ route('frontend.team.details', $item->slug) }}">{{ $item->name }}</a></h3>
                                        <span class="designation">{{ $item->designation }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

@endsection
