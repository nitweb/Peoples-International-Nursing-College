@extends('frontend.dashboard')
@section('title', 'Our Leadership')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Our Leadership', 'parent' => 'About Us', 'parent_url' => route('frontend.about.us')])

    @include('frontend.partials.team_grid', [
        'members' => $leadership,
        'heading' => 'Our Leadership Team',
        'subheading' => 'The senior leadership driving academic excellence and institutional growth',
    ])

@endsection
