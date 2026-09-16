@extends('frontend.dashboard')
@section('title', 'Admission')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Admission'])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row gy-5">

                <div class="col-lg-8">

                    @if ($admission_info && $admission_info->long_description)
                        <div class="mb-48">
                            <h2 class="mb-24">Admission Information</h2>
                            <div class="text-neutral-500">{!! $admission_info->long_description !!}</div>
                        </div>
                    @endif

                    @if ($admission_info && $admission_info->eligibility_notes)
                        <div class="mb-48 pt-40 border-top border-neutral-50 border-dashed border-0">
                            <h3 class="mb-24">General Eligibility</h3>
                            <div class="text-neutral-500">{!! $admission_info->eligibility_notes !!}</div>
                        </div>
                    @endif

                    @if ($admission_info && $admission_info->required_documents)
                        <div class="mb-48 pt-40 border-top border-neutral-50 border-dashed border-0">
                            <h3 class="mb-24">Required Documents</h3>
                            <div class="text-neutral-500">{!! $admission_info->required_documents !!}</div>
                        </div>
                    @endif

                    @if ($admission_info && $admission_info->key_dates)
                        <div class="mb-48 pt-40 border-top border-neutral-50 border-dashed border-0">
                            <h3 class="mb-24">Key Admission Dates</h3>
                            <div class="text-neutral-500">{!! $admission_info->key_dates !!}</div>
                        </div>
                    @endif

                    @if (!$admission_info || (!$admission_info->long_description && !$admission_info->eligibility_notes))
                        <div class="text-center py-40">
                            <p class="text-neutral-500 mb-0">Admission information is being updated. Please check back soon or contact our admissions office.</p>
                        </div>
                    @endif

                    {{-- Per-program eligibility & seats quick reference --}}
                    @if ($academic_programs->count())
                        <div class="mt-48 pt-40 border-top border-neutral-50 border-dashed border-0">
                            <h3 class="mb-24">Program-wise Eligibility &amp; Seats</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            <th>Program</th>
                                            <th>Duration</th>
                                            <th>Seats</th>
                                            <th>Affiliation</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($academic_programs as $program)
                                            <tr>
                                                <td>{{ $program->title }}</td>
                                                <td>{{ $program->duration ?? '—' }}</td>
                                                <td>{{ $program->total_seats ?? '—' }}</td>
                                                <td>{{ $program->affiliation ?? '—' }}</td>
                                                <td>
                                                    <a href="{{ route('frontend.training.development.details', $program->slug) }}" class="text-main-600 fw-semibold hover-text-decoration-underline">Details</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                </div>

                <div class="col-lg-4">
                    <div class="p-32 bg-main-25 rounded-16 border border-neutral-30 position-sticky" style="top: 24px;">
                        <h5 class="mb-24">Downloads</h5>

                        @if ($admission_info && $admission_info->prospectus_file)
                            <a href="{{ asset($admission_info->prospectus_file) }}" target="_blank" class="btn btn-outline-main rounded-pill w-100 justify-content-center mb-16">
                                <i class="ph-bold ph-file-pdf"></i> Download Prospectus
                            </a>
                        @endif

                        @if ($admission_info && $admission_info->admission_form_file)
                            <a href="{{ asset($admission_info->admission_form_file) }}" target="_blank" class="btn btn-outline-main rounded-pill w-100 justify-content-center mb-16">
                                <i class="ph-bold ph-file-pdf"></i> Download Admission Form
                            </a>
                        @endif

                        <a href="{{ route('frontend.training.development') }}" class="btn btn-main rounded-pill w-100 justify-content-center mb-16">
                            View Academic Programs
                        </a>

                        <a href="{{ route('frontend.contact.us') }}" class="btn btn-outline-main rounded-pill w-100 justify-content-center">
                            Contact Admissions Office
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
