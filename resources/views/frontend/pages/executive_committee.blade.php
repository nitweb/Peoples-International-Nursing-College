@extends('frontend.dashboard')
@section('title', 'Executive Committee')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Executive Committee', 'parent' => 'About Us', 'parent_url' => route('frontend.about.us')])

    @include('frontend.partials.team_grid', [
        'members' => $executive_committee,
        'heading' => 'Meet Our Executive Committee',
        'subheading' => 'The founding members guiding the vision and governance of our institution',
    ])

@endsection
