@extends('frontend.dashboard')
@section('title', 'Publications')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Publications'])

    <section class="py-120 position-relative z-1">
        <div class="container">
            @include('frontend.partials.document_list', ['documents' => $publications_data])
        </div>
    </section>

@endsection
