@extends('frontend.dashboard')
@section('title', 'Career')
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Join Our Team, Be a Proud Development Professional</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Career</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="team-page-section centred bg-color-1">
        <div class="auto-container">

            @include('widgets.errors')
            @include('widgets.success')

            <div class="sec-title centred mb_55">
                <span class="sub-title">Career</span>
                <h2>Current Openings</h2>
                <div class="text">Explore exciting career opportunities and join our mission</div>
            </div>

            @if ($career->isEmpty())
                <div class="text-center" style="padding: 60px 0;">
                    <h4>No vacancies available right now. Please check back soon.</h4>
                </div>
            @else
                <div class="row clearfix">
                    @foreach ($career as $item)
                        <div class="col-lg-4 col-md-6 col-sm-12 cause-block">
                            <div class="cause-block-one wow fadeInUp animated" data-wow-delay="{{ ($loop->index % 3) * 200 }}ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <div class="category">
                                            <a href="javascript:void(0)" style="text-transform:capitalize;">{{ str_replace('-', ' ', $item->job_type) }}</a>
                                        </div>
                                        <figure class="image">
                                            <a href="{{ route('frontend.career.details', $item->slug) }}">
                                                <img src="{{ $item->career_image ? asset($item->career_image) : asset('frontend/assets/images/background/page-title-4.jpg') }}" alt="{{ $item->title }}">
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="lower-content">
                                        <div class="text" style="border-bottom: none;">
                                            <h3><a href="{{ route('frontend.career.details', $item->slug) }}">{{ $item->title }}</a></h3>

                                            <ul style="list-style:none; padding:0; margin-bottom:0; color:#666; font-size:14px;">
                                                @if ($item->location)
                                                    <li style="margin-bottom:6px;"><strong>Location:</strong> {{ $item->location }}</li>
                                                @endif
                                                <li style="margin-bottom:6px;"><strong>Vacancy:</strong> {{ $item->vacancy }}</li>
                                                <li style="margin-bottom:0;">
                                                    <strong>Deadline:</strong>
                                                    {{ $item->deadline ? $item->deadline->format('d M, Y') : 'N/A' }}
                                                </li>
                                            </ul>
                                        </div>

                                        <div style="display:flex; gap:10px; padding:0 40px 32px;">
                                            <a href="{{ route('frontend.career.details', $item->slug) }}" class="theme-btn-one" style="flex:1; text-align:center; padding-left:0; padding-right:0;">
                                                <span>Details</span>
                                            </a>
                                            <button type="button" class="theme-btn-one" style="flex:1; text-align:center; border:none; cursor:pointer; padding-left:0; padding-right:0;"
                                                data-toggle="modal" data-target="#applyModal{{ $item->id }}">
                                                <span>Apply Now</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Apply Modal for this job --}}
                        <div class="modal fade" id="applyModal{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content" style="border:none; border-radius:14px; overflow:hidden;">
                                    <div class="modal-header" style="background:linear-gradient(135deg,#1c4e64,#2d7089); color:#fff; padding:22px 28px; border:none;">
                                        <h5 class="modal-title" style="font-weight:700; margin:0; color:#fff;">Apply for {{ $item->title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff; opacity:.85; text-shadow:none; font-size:26px;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="padding:30px; max-height:75vh; overflow-y:auto;">
                                        @include('frontend.partials.job_apply_form', ['career' => $item])
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>

    @if ($errors->any() && old('career_id'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var modal = document.getElementById('applyModal{{ old('career_id') }}');
                if (modal && window.jQuery) {
                    jQuery(modal).modal('show');
                }
            });
        </script>
    @endif

@endsection