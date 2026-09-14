@extends('frontend.dashboard')
@section('title', 'Apply - ' . $career_apply->title)
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Apply Now', 'parent' => $career_apply->title, 'parent_url' => route('frontend.career.details', $career_apply->slug)])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @include('frontend.partials.job_apply_form', ['career' => $career_apply])
                </div>
            </div>
        </div>
    </section>

@endsection
