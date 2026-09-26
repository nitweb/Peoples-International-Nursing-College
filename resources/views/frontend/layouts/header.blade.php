<header class="header">

    <div class="container">

        <div class="row align-items-center justify-content-between">

            <!-- Logo Start -->
            <div class="col-auto">
                <div class="logo">
                    <a href="{{ route('index') }}" class="link">
                        <img src="{{ !empty($global_setting->header_logo) ? asset($global_setting->header_logo) : asset('frontend/assets/images/logo/logo.png') }}" alt="Peoples International Nursing College">
                    </a>
                </div>
            </div>
            <!-- Logo End  -->

            <!-- Menu Start  -->
            <div class="col d-lg-block d-none">
                <div class="header-menu d-flex justify-content-center">

                    <ul class="nav-menu flex-align ">

                        <li class="nav-menu__item activePage">
                            <a href="{{ route('index') }}" class="nav-menu__link">Home</a>
                        </li>

                        <li class="nav-menu__item has-submenu">
                            <a href="{{ route('frontend.training.development') }}" class="nav-menu__link">Academy</a>
                            <ul class="nav-submenu scroll-sm">
                                <li class="nav-submenu__item">
                                    <a href="{{ route('frontend.training.development') }}" class="nav-submenu__link hover-bg-neutral-30">Training &amp; Development</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-menu__item">
                            <a href="{{ route('frontend.admission') }}" class="nav-menu__link">Admission</a>
                        </li>

                        <li class="nav-menu__item has-submenu">
                            <a href="{{ route('frontend.about.us') }}" class="nav-menu__link">About Us</a>
                            <ul class="nav-submenu scroll-sm">
                                <li class="nav-submenu__item">
                                    <a href="{{ route('frontend.about.us') }}" class="nav-submenu__link hover-bg-neutral-30">About Us</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="{{ route('frontend.mission.vision.values') }}" class="nav-submenu__link hover-bg-neutral-30">Mission, Vision &amp; Values</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="{{ route('frontend.executive.director.message') }}" class="nav-submenu__link hover-bg-neutral-30">Director's Message</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="{{ route('frontend.executive.committee') }}" class="nav-submenu__link hover-bg-neutral-30">Executive Committee</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="{{ route('frontend.our.leadership') }}" class="nav-submenu__link hover-bg-neutral-30">Our Leadership</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="{{ route('frontend.our.partners') }}" class="nav-submenu__link hover-bg-neutral-30">Our Partners</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="{{ route('frontend.campus.facilities') }}" class="nav-submenu__link hover-bg-neutral-30">Campus &amp; Facilities</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="{{ route('frontend.academic.faculty') }}" class="nav-submenu__link hover-bg-neutral-30">Academic Faculty</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="{{ route('frontend.alumni') }}" class="nav-submenu__link hover-bg-neutral-30">Alumni</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="{{ route('frontend.team.list') }}" class="nav-submenu__link hover-bg-neutral-30">Our Team</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-menu__item">
                            <a href="{{ route('frontend.notice.list') }}" class="nav-menu__link">Notice</a>
                        </li>

                        <li class="nav-menu__item">
                            <a href="{{ route('frontend.contact.us') }}" class="nav-menu__link">Contact</a>
                        </li>

                        <li class="nav-menu__item has-submenu">
                            <a href="javascript:void(0)" class="nav-menu__link">More</a>
                            <ul class="nav-submenu scroll-sm">
                                <li class="nav-submenu__item">
                                    <a href="{{ route('frontend.scholarship') }}" class="nav-submenu__link hover-bg-neutral-30">Scholarship</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="{{ route('frontend.all.services.list') }}" class="nav-submenu__link hover-bg-neutral-30">Services</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="{{ route('frontend.gallery') }}" class="nav-submenu__link hover-bg-neutral-30">Gallery</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="{{ route('frontend.media') }}" class="nav-submenu__link hover-bg-neutral-30">Media</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="{{ route('frontend.blog.list') }}" class="nav-submenu__link hover-bg-neutral-30">Blog</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="{{ route('frontend.career') }}" class="nav-submenu__link hover-bg-neutral-30">Career</a>
                                </li>
                                <li class="nav-submenu__item">
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="{{ route('frontend.faq') }}" class="nav-submenu__link hover-bg-neutral-30">FAQ</a>
                                </li>
                            </ul>
                        </li>

                    </ul>

                </div>
            </div>
            <!-- Menu End  -->

            <!-- Right Actions Start -->
            <div class="col-auto">
                <div class="flex-align gap-16">
                    <a href="{{ route('frontend.admission') }}" class="btn btn-main rounded-pill d-none d-lg-flex">
                        Apply for Admission
                    </a>
                    <button type="button" class="toggle-mobileMenu d-lg-none flex-center w-48 h-48 rounded-circle border border-neutral-100 text-neutral-700 text-2xl">
                        <i class="ph-bold ph-list"></i>
                    </button>
                </div>
            </div>
            <!-- Right Actions End -->

        </div>

    </div>

</header>

@php
    $admission_notices = \App\Models\AdmissionNotice::where('status', 1)->latest()->get();
@endphp

@if ($admission_notices->isNotEmpty())
    <div class="admission-notice-bar">
        <div class="admission-notice-bar__label">Admission Notice:</div>
        <div class="admission-notice-bar__track">
            <div class="admission-notice-bar__scroll">
                @foreach ($admission_notices as $notice)
                    <a href="{{ $notice->link ?: route('frontend.admission') }}" class="admission-notice-bar__link">
                        {{ $notice->text }}
                    </a>
                    @if (!$loop->last)
                        <span class="admission-notice-bar__sep">&nbsp;&nbsp;&raquo;&nbsp;&nbsp;</span>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <style>
        .admission-notice-bar {
            display: flex;
            align-items: center;
            width: 100%;
            background: #0a7a5c;
            overflow: hidden;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
        }

        .admission-notice-bar__label {
            flex: 0 0 auto;
            background: #d32f2f;
            color: #fff;
            font-weight: 700;
            font-size: 14px;
            padding: 10px 16px;
            white-space: nowrap;
        }

        .admission-notice-bar__track {
            flex: 1 1 auto;
            overflow: hidden;
            white-space: nowrap;
            position: relative;
        }

        .admission-notice-bar__scroll {
            display: inline-flex;
            align-items: center;
            padding-left: 100%;
            white-space: nowrap;
            animation: admission-notice-scroll 60s linear infinite;
        }

        .admission-notice-bar:hover .admission-notice-bar__scroll {
            animation-play-state: paused;
        }

        .admission-notice-bar__link {
            display: inline-block;
            color: #fff;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
        }

        .admission-notice-bar__link:hover {
            color: #ffe08a;
            text-decoration: underline;
        }

        .admission-notice-bar__sep {
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px;
        }

        @keyframes admission-notice-scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>
@endif
