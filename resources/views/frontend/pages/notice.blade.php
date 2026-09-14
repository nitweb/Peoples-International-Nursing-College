@extends('frontend.dashboard')
@section('title', 'Notice')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Notice'])

    <section class="py-120 position-relative z-1">
        <div class="container">
            @include('frontend.partials.document_list', ['documents' => $notice])
        </div>
    </section>

@endsection
