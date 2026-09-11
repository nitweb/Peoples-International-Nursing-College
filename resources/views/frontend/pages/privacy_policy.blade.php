@extends('frontend.dashboard')
@section('title', 'Privacy Policy')
@section('contents')

    <style>
        .policy-section {
            background: #f9f9fb;
        }

        .policy-updated-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #fef1ec;
            color: #f15a29;
            font-size: 14px;
            font-weight: 600;
            padding: 8px 18px;
            border-radius: 30px;
            margin-bottom: 35px;
        }

        .policy-intro-card {
            background: #fff;
            border-left: 4px solid #f15a29;
            border-radius: 10px;
            padding: 28px 30px;
            margin-bottom: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
        }

        .policy-intro-card p {
            margin: 0;
            line-height: 1.9;
            color: #555;
        }

        .policy-toc {
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            position: sticky;
            top: 110px;
        }

        .policy-toc h4 {
            font-size: 18px;
            margin-bottom: 18px;
            color: #17233b;
        }

        .policy-toc ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .policy-toc ul li {
            margin-bottom: 12px;
        }

        .policy-toc ul li a {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #555;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .policy-toc ul li a:hover {
            color: #f15a29;
            padding-left: 4px;
        }

        .policy-toc ul li a i {
            color: #f15a29;
            font-size: 12px;
        }

        .policy-card {
            background: #fff;
            border-radius: 10px;
            padding: 32px 34px;
            margin-bottom: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            scroll-margin-top: 110px;
        }

        .policy-card-head {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
        }

        .policy-card-icon {
            flex-shrink: 0;
            width: 54px;
            height: 54px;
            border-radius: 50%;
            background: #fef1ec;
            color: #f15a29;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .policy-card-head h3 {
            margin: 0;
            font-size: 21px;
            color: #17233b;
        }

        .policy-card p {
            color: #666;
            line-height: 1.9;
            margin: 0;
            text-align: justify;
        }

        .policy-card p a {
            color: #f15a29;
            font-weight: 600;
        }

        @media (max-width: 991px) {
            .policy-toc {
                position: static;
                margin-bottom: 30px;
            }
        }
    </style>

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Privacy Policy</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Privacy Policy</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="policy-section sec-pad">
        <div class="auto-container">

            <div class="text-center">
                <span class="policy-updated-badge"><i class="fas fa-shield-alt"></i> Last updated: {{ now()->format('d F Y') }}</span>
            </div>

            <div class="policy-intro-card">
                <p>People's International Foundation ("we", "our", "us") is committed to protecting the privacy of everyone who visits this website or interacts with our programs. This Privacy Policy explains how we collect, use, and safeguard your information whenever you browse our site, apply for a program, or make a donation.</p>
            </div>

            <div class="row clearfix">

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="policy-toc">
                        <h4>On This Page</h4>
                        <ul>
                            <li><a href="#information-we-collect"><i class="fas fa-caret-right"></i> Information We Collect</a></li>
                            <li><a href="#how-we-use"><i class="fas fa-caret-right"></i> How We Use Your Information</a></li>
                            <li><a href="#cookies"><i class="fas fa-caret-right"></i> Cookies</a></li>
                            <li><a href="#data-security"><i class="fas fa-caret-right"></i> Data Security</a></li>
                            <li><a href="#third-party"><i class="fas fa-caret-right"></i> Third-Party Links</a></li>
                            <li><a href="#changes"><i class="fas fa-caret-right"></i> Changes to This Policy</a></li>
                            <li><a href="#contact"><i class="fas fa-caret-right"></i> Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12 col-sm-12">

                    <div class="policy-card" id="information-we-collect">
                        <div class="policy-card-head">
                            <div class="policy-card-icon"><i class="fas fa-database"></i></div>
                            <h3>Information We Collect</h3>
                        </div>
                        <p>We may collect personal information such as your name, email address, phone number, and mailing address when you fill out a form on our website, apply for a training or job opening, make a donation, or otherwise contact us.</p>
                    </div>

                    <div class="policy-card" id="how-we-use">
                        <div class="policy-card-head">
                            <div class="policy-card-icon"><i class="fas fa-cogs"></i></div>
                            <h3>How We Use Your Information</h3>
                        </div>
                        <p>Information collected through this website is used to respond to your inquiries, process donations and applications, communicate updates about our programs, and improve our services. We do not sell or rent your personal information to third parties.</p>
                    </div>

                    <div class="policy-card" id="cookies">
                        <div class="policy-card-head">
                            <div class="policy-card-icon"><i class="fas fa-cookie-bite"></i></div>
                            <h3>Cookies</h3>
                        </div>
                        <p>Our website may use cookies to enhance your browsing experience and understand how visitors use the site. You can choose to disable cookies through your browser settings; however, some features of the website may not function properly as a result.</p>
                    </div>

                    <div class="policy-card" id="data-security">
                        <div class="policy-card-head">
                            <div class="policy-card-icon"><i class="fas fa-lock"></i></div>
                            <h3>Data Security</h3>
                        </div>
                        <p>We take reasonable technical and organizational measures to protect the information you share with us from unauthorized access, alteration, or disclosure.</p>
                    </div>

                    <div class="policy-card" id="third-party">
                        <div class="policy-card-head">
                            <div class="policy-card-icon"><i class="fas fa-external-link-alt"></i></div>
                            <h3>Third-Party Links</h3>
                        </div>
                        <p>Our website may contain links to external websites. We are not responsible for the privacy practices or content of those third-party sites.</p>
                    </div>

                    <div class="policy-card" id="changes">
                        <div class="policy-card-head">
                            <div class="policy-card-icon"><i class="fas fa-sync-alt"></i></div>
                            <h3>Changes to This Policy</h3>
                        </div>
                        <p>We may update this Privacy Policy from time to time. Any changes will be posted on this page.</p>
                    </div>

                    <div class="policy-card" id="contact">
                        <div class="policy-card-head">
                            <div class="policy-card-icon"><i class="fas fa-envelope-open-text"></i></div>
                            <h3>Contact Us</h3>
                        </div>
                        <p>If you have any questions about this Privacy Policy, please <a href="{{ route('frontend.contact.us') }}">contact us</a>.</p>
                    </div>

                </div>

            </div>

        </div>
    </section>

@endsection
