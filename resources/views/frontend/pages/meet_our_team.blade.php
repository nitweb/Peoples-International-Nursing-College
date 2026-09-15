@extends('frontend.dashboard')
@section('title', 'Meet Our Team')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Meet Our Team', 'parent' => 'About Us', 'parent_url' => route('frontend.about.us')])

    @include('frontend.partials.team_grid', [
        'members' => $team,
        'heading' => 'Meet Our Team',
        'subheading' => 'The faculty and staff who support our students every day',
    ])

@endsection
