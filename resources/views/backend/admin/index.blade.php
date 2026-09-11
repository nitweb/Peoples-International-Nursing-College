@extends('backend.admin.master')
@section('admin_title', 'Dashboard')

@section('admin_content')

    <style>
        .custom_dashboard_title {
            color: var(--bs-body-color);
        }

        .stats-card {
            transition: all 0.25s ease-in-out;
            border-radius: 12px;
        }

        a .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        a {
            color: inherit;
        }

        a:hover {
            text-decoration: none;
        }

        a .stats-card {
            cursor: pointer;
        }

        .gradient-banner {
            background: linear-gradient(90deg, #0B6B3D, #E04237);
            border-radius: 15px;
        }

        .hover-scale {
            transition: all 0.25s ease;
        }

        .hover-scale:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(255, 255, 255, 0.3);
        }

        .visit_card_btn {
            background-color: #0B6B3D;
            border-color: #0B6B3D;
            color: #fff !important;
        }

        .visit_card_btn:hover {
            background-color: #fff !important;
            color: #0B6B3D !important;
        }

        /* Enrollment status badges */
        .enroll-stats {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            margin-top: 4px;
        }

        .enroll-badge {
            font-size: 10px;
            font-weight: 600;
            padding: 2px 8px;
            border-radius: 20px;
        }
    </style>

    <div class="main-content">
        <section class="section">

            {{-- Breadcrumb --}}
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Frontend Visit Banner --}}
            <div class="row mb-3 mt-3">
                <div class="col-12">
                    <div class="card border-0 shadow-sm gradient-banner text-white p-4 d-flex flex-md-row flex-column align-items-center justify-content-between">
                        <div class="mb-3 mb-md-0">
                            <h4 class="fw-bold mb-1 text-white">View Your Website</h4>
                            <p class="mb-0 opacity-75">Click below to open the live frontend of your site.</p>
                        </div>
                        <a href="{{ route('index') }}" target="_blank" class="btn btn-light fw-semibold px-4 py-2 rounded-pill shadow-sm hover-scale visit_card_btn">
                            🌐 Visit Frontend
                        </a>
                    </div>
                </div>
            </div>

            {{-- Stats Cards --}}
            <div class="row">

                {{-- Services --}}
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.service.list') }}">
                        <div class="card stats-card">
                            <div class="card-statistic-4">
                                <div class="align-items-center justify-content-between">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                            <div class="card-content">
                                                <h5 class="font-20 custom_dashboard_title">Services</h5>
                                                <h2 class="mb-3 font-18">{{ $services->count() }}</h2>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                            <div class="banner-img">
                                                <img src="{{ asset('/backend/assets/img/banner/services.svg') }}" style="width:140px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Institutions --}}
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.institution.list') }}">
                        <div class="card stats-card">
                            <div class="card-statistic-4">
                                <div class="align-items-center justify-content-between">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                            <div class="card-content">
                                                <h5 class="font-20 custom_dashboard_title">Institutions</h5>
                                                <h2 class="mb-3 font-18">{{ $institutions->count() }}</h2>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                            <div class="banner-img">
                                                <img src="{{ asset('/backend/assets/img/banner/trainers.svg') }}" style="width:140px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Donation Categories --}}
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.donation-category.list') }}">
                        <div class="card stats-card">
                            <div class="card-statistic-4">
                                <div class="align-items-center justify-content-between">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                            <div class="card-content">
                                                <h5 class="font-20 custom_dashboard_title">Donation Categories</h5>
                                                <h2 class="mb-3 font-18">{{ $donation_categories->count() }}</h2>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                            <div class="banner-img">
                                                <img src="{{ asset('/backend/assets/img/banner/trainings.png') }}" style="width:140px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Donation Transactions --}}
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.donation.list') }}">
                        <div class="card stats-card">
                            <div class="card-statistic-4">
                                <div class="align-items-center justify-content-between">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                            <div class="card-content">
                                                <h5 class="font-20 custom_dashboard_title">Donation Transactions</h5>
                                                <h2 class="mb-3 font-18">{{ $donations->count() }}</h2>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                            <div class="banner-img">
                                                <img src="{{ asset('/backend/assets/img/banner/enrollments.png') }}" style="width:140px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Blog --}}
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.blog.list') }}">
                        <div class="card stats-card">
                            <div class="card-statistic-4">
                                <div class="align-items-center justify-content-between">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                            <div class="card-content">
                                                <h5 class="font-20 custom_dashboard_title">Blogs</h5>
                                                <h2 class="mb-3 font-18">{{ $blogs->count() }}</h2>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                            <div class="banner-img">
                                                <img src="{{ asset('/backend/assets/img/banner/blog.svg') }}" style="width:140px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Contact Messages --}}
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.contact.list') }}">
                        <div class="card stats-card">
                            <div class="card-statistic-4">
                                <div class="align-items-center justify-content-between">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                            <div class="card-content">
                                                <h5 class="font-20 custom_dashboard_title">Contact Messages</h5>
                                                <h2 class="mb-3 font-18">{{ $contacts->count() }}</h2>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                            <div class="banner-img">
                                                <img src="{{ asset('/backend/assets/img/banner/contacts.png') }}" style="width:140px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Site Settings --}}
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.setting.edit', siteSetting()->id) }}">
                        <div class="card stats-card">
                            <div class="card-statistic-4">
                                <div class="align-items-center justify-content-between">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                            <div class="card-content">
                                                <h5 class="font-20 custom_dashboard_title">Site Settings</h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                            <div class="banner-img">
                                                <img src="{{ asset('/backend/assets/img/banner/site_settings.svg') }}" style="width:140px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

        </section>
    </div>

@endsection
