@extends('frontend.dashboard')
@section('title', 'Academic Faculty')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Academic Faculty', 'parent' => 'About Us', 'parent_url' => route('frontend.about.us')])

    @include('frontend.partials.team_grid', [
        'members' => $faculty,
        'heading' => 'Meet Our Academic Faculty',
        'subheading' => 'Qualified, experienced teachers delivering the nursing & midwifery curriculum',
    ])

@endsection
