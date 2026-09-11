@extends('frontend.dashboard')
@section('title', $job_application->title)
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>{{ $job_application->title }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('frontend.career') }}">Career</a></li>
                    <li>{{ $job_application->title }}</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="job-details-section sec-pad">
        <div class="auto-container">

            @include('widgets.errors')
            @include('widgets.success')

            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12">

                    @if ($job_application->career_image)
                        <figure style="margin-bottom:25px; border-radius:10px; overflow:hidden;">
                            <img src="{{ asset($job_application->career_image) }}" alt="{{ $job_application->title }}" style="width:100%;">
                        </figure>
                    @endif

                    <h3 style="margin-bottom:15px;">Job Description</h3>
                    <div class="rich-content" style="margin-bottom:30px;">
                        {!! $job_application->description !!}
                    </div>

                    @if ($job_application->requirements)
                        <h3 style="margin-bottom:15px;">Requirements</h3>
                        <div class="rich-content" style="margin-bottom:30px;">
                            {!! $job_application->requirements !!}
                        </div>
                    @endif

                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div style="background:#f8f9fa; border-radius:10px; padding:25px; position:sticky; top:20px;">
                        <h4 style="margin-bottom:20px;">Application Information</h4>

                        <ul style="list-style:none; padding:0; margin-bottom:25px;">
                            <li style="margin-bottom:12px;">
                                <strong>Job Type:</strong><br>
                                <span style="text-transform:capitalize;">{{ str_replace('-', ' ', $job_application->job_type) }}</span>
                            </li>
                            @if ($job_application->location)
                                <li style="margin-bottom:12px;">
                                    <strong>Location:</strong><br>{{ $job_application->location }}
                                </li>
                            @endif
                            <li style="margin-bottom:12px;">
                                <strong>Vacancy:</strong><br>{{ $job_application->vacancy }}
                            </li>
                            @if ($job_application->salary_range)
                                <li style="margin-bottom:12px;">
                                    <strong>Salary Range:</strong><br>{{ $job_application->salary_range }}
                                </li>
                            @endif
                            <li style="margin-bottom:12px;">
                                <strong>Application Deadline:</strong><br>
                                {{ $job_application->deadline ? $job_application->deadline->format('d M, Y') : 'N/A' }}
                            </li>
                        </ul>

                        @if (!$job_application->is_deadline_passed)
                            <button type="button" class="theme-btn-one" style="width:100%; border:none; cursor:pointer;"
                                data-toggle="modal" data-target="#applyModal">
                                <span>Apply Now</span>
                            </button>
                        @else
                            <button type="button" class="theme-btn-one" style="width:100%; border:none; opacity:0.6;" disabled>
                                <span>Application Closed</span>
                            </button>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- Apply Modal --}}
    <div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="border:none; border-radius:14px; overflow:hidden;">
                <div class="modal-header" style="background:linear-gradient(135deg,#1c4e64,#2d7089); color:#fff; padding:22px 28px; border:none;">
                    <h5 class="modal-title" style="font-weight:700; margin:0; color:#fff;">Apply for {{ $job_application->title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff; opacity:.85; text-shadow:none; font-size:26px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding:30px; max-height:75vh; overflow-y:auto;">
                    @include('frontend.partials.job_apply_form', ['career' => $job_application])
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var modal = document.getElementById('applyModal');
                if (modal && window.jQuery) {
                    jQuery(modal).modal('show');
                }
            });
        </script>
    @endif

@endsection