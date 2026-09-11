@extends('frontend.dashboard')
@section('title', 'Terms & Condition')
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
                <h1>Terms & Condition</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Terms & Condition</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="policy-section sec-pad">
        <div class="auto-container">

            <div class="text-center">
                <span class="policy-updated-badge"><i class="fas fa-file-contract"></i> Last updated: {{ now()->format('d F Y') }}</span>
            </div>

            <div class="policy-intro-card">
                <p>Welcome to the People's International Foundation website. By accessing or using this website, you agree to be bound by the following terms and conditions. Please read them carefully before using our site or services.</p>
            </div>

            <div class="row clearfix">

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="policy-toc">
                        <h4>On This Page</h4>
                        <ul>
                            <li><a href="#use-of-website"><i class="fas fa-caret-right"></i> Use of Website</a></li>
                            <li><a href="#intellectual-property"><i class="fas fa-caret-right"></i> Intellectual Property</a></li>
                            <li><a href="#donations"><i class="fas fa-caret-right"></i> Donations</a></li>
                            <li><a href="#applications"><i class="fas fa-caret-right"></i> Applications & Enrollments</a></li>
                            <li><a href="#liability"><i class="fas fa-caret-right"></i> Limitation of Liability</a></li>
                            <li><a href="#changes"><i class="fas fa-caret-right"></i> Changes to These Terms</a></li>
                            <li><a href="#contact"><i class="fas fa-caret-right"></i> Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12 col-sm-12">

                    <div class="policy-card" id="use-of-website">
                        <div class="policy-card-head">
                            <div class="policy-card-icon"><i class="fas fa-globe"></i></div>
                            <h3>Use of Website</h3>
                        </div>
                        <p>The content published on this website is for general informational purposes about People's International Foundation, its programs, services, and activities. You agree to use this website only for lawful purposes and in a way that does not infringe the rights of others.</p>
                    </div>

                    <div class="policy-card" id="intellectual-property">
                        <div class="policy-card-head">
                            <div class="policy-card-icon"><i class="fas fa-copyright"></i></div>
                            <h3>Intellectual Property</h3>
                        </div>
                        <p>All text, images, logos, and other materials on this website are the property of People's International Foundation unless otherwise stated, and may not be reproduced or distributed without prior written permission.</p>
                    </div>

                    <div class="policy-card" id="donations">
                        <div class="policy-card-head">
                            <div class="policy-card-icon"><i class="fas fa-hand-holding-heart"></i></div>
                            <h3>Donations</h3>
                        </div>
                        <p>All donations made through this website are voluntary contributions to support our programs. Donation details are processed securely, and receipts will be provided where applicable.</p>
                    </div>

                    <div class="policy-card" id="applications">
                        <div class="policy-card-head">
                            <div class="policy-card-icon"><i class="fas fa-file-signature"></i></div>
                            <h3>Applications & Enrollments</h3>
                        </div>
                        <p>Information submitted through career, training, or enrollment forms on this website is used solely for evaluation and communication purposes related to that application.</p>
                    </div>

                    <div class="policy-card" id="liability">
                        <div class="policy-card-head">
                            <div class="policy-card-icon"><i class="fas fa-balance-scale"></i></div>
                            <h3>Limitation of Liability</h3>
                        </div>
                        <p>While we strive to keep the information on this website accurate and up to date, People's International Foundation makes no warranties about the completeness or reliability of the content and shall not be held liable for any loss arising from its use.</p>
                    </div>

                    <div class="policy-card" id="changes">
                        <div class="policy-card-head">
                            <div class="policy-card-icon"><i class="fas fa-sync-alt"></i></div>
                            <h3>Changes to These Terms</h3>
                        </div>
                        <p>We may revise these terms and conditions from time to time. Continued use of the website after changes are posted constitutes your acceptance of the updated terms.</p>
                    </div>

                    <div class="policy-card" id="contact">
                        <div class="policy-card-head">
                            <div class="policy-card-icon"><i class="fas fa-envelope-open-text"></i></div>
                            <h3>Contact Us</h3>
                        </div>
                        <p>If you have any questions about these Terms & Conditions, please <a href="{{ route('frontend.contact.us') }}">contact us</a>.</p>
                    </div>

                </div>

            </div>

        </div>
    </section>

@endsection
