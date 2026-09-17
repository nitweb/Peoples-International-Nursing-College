@extends('frontend.dashboard')
@section('title', 'Alumni')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Alumni', 'parent' => 'About Us', 'parent_url' => route('frontend.about.us')])

    @include('frontend.partials.team_grid', [
        'members' => $alumni,
        'heading' => 'Our Alumni',
        'subheading' => 'Graduates now serving as nursing professionals across Bangladesh',
    ])

@endsection
