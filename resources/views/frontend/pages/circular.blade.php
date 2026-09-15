@extends('frontend.dashboard')
@section('title', 'Notice & Circular')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Notice & Circular'])

    <section class="py-120 position-relative z-1">
        <div class="container">
            @include('frontend.partials.document_list', ['documents' => $circular_data])
        </div>
    </section>

@endsection
