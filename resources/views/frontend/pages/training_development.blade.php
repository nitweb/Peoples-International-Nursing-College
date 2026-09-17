@extends('frontend.dashboard')
@section('title', 'Academic Programs & Training')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Academic Programs & Training'])

    {{-- Academic Programs (Diploma / BSc / MSc) --}}
    <section class="course-grid-view pt-120 pb-40">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="mb-24">Academic Programs</h2>
                <p>BNMC-affiliated diploma and degree programs in nursing &amp; midwifery</p>
            </div>

            @if ($academic_programs->count())
                <div class="row gy-4">
                    @foreach ($academic_programs as $training)
                        @include('frontend.partials.academic_program_card', ['training' => $training])
                    @endforeach
                </div>
            @else
                <div class="text-center py-40">
                    <p class="text-neutral-500 mb-0">Academic program details are being updated. Please check back soon.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- Short Courses / Training --}}
    <section class="course-grid-view pt-40 pb-120 border-top border-neutral-30">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="mb-24">Short Courses &amp; Training</h2>
                <p>Build career-ready skills with our short professional training programs</p>
            </div>

            @if ($training_list->count())
                <div class="row gy-4">
                    @foreach ($training_list as $training)
                        @include('frontend.partials.training_card', ['training' => $training])
                    @endforeach
                </div>

                <div class="mt-48">
                    {{ $training_list->links() }}
                </div>
            @else
                <div class="text-center py-40">
                    <p class="text-neutral-500 mb-0">No short courses available right now. Please check back soon.</p>
                </div>
            @endif
        </div>
    </section>

@endsection
