@extends('frontend.dashboard')
@section('title', 'Our Partners')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Our Partners', 'parent' => 'About Us', 'parent_url' => route('frontend.about.us')])

    @include('frontend.partials.team_grid', [
        'members' => $partners,
        'heading' => 'Our Partners',
        'subheading' => 'Organizations and individuals who collaborate with us',
    ])

@endsection
