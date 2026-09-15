@extends('frontend.dashboard')
@section('title', 'Apply for a Position')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Apply Now', 'parent' => 'Career', 'parent_url' => route('frontend.career')])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @include('frontend.partials.job_apply_form', ['career_list' => $career])
                </div>
            </div>
        </div>
    </section>

@endsection
