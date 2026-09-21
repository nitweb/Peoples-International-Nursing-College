@extends('frontend.dashboard')
@section('title', 'Privacy Policy')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Privacy Policy'])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">

                    <div class="text-neutral-500">

                        <p>Last updated: {{ now()->format('F j, Y') }}</p>

                        <p>Peoples International Nursing College ("we", "our", "us") is committed to protecting the privacy of visitors to our website and prospective, current, and former students. This Privacy Policy explains what information we collect, how we use it, and the choices you have.</p>

                        <h3>Information We Collect</h3>
                        <ul>
                            <li>Personal details you provide directly, such as name, email address, phone number, and postal address, when you fill out an admission, enrollment, career application, or contact form.</li>
                            <li>Payment-related information when you make a payment (e.g. bKash transaction details) for training enrollment or donations. We do not store full payment credentials on our servers.</li>
                            <li>Technical information such as IP address, browser type, and pages visited, collected automatically to help us improve the website.</li>
                        </ul>

                        <h3>How We Use Your Information</h3>
                        <ul>
                            <li>To process admissions, enrollments, and career applications.</li>
                            <li>To respond to inquiries submitted through our contact forms.</li>
                            <li>To send important updates about notices, circulars, admissions, and programs.</li>
                            <li>To improve our website and services.</li>
                        </ul>

                        <h3>How We Protect Your Information</h3>
                        <p>We take reasonable administrative and technical measures to protect the personal information we collect from unauthorized access, disclosure, alteration, or destruction. However, no method of transmission over the internet is 100% secure.</p>

                        <h3>Sharing of Information</h3>
                        <p>We do not sell or rent your personal information to third parties. Information may be shared with affiliated hospitals or institutions strictly for the purpose of clinical training placement, or with authorities where required by law.</p>

                        <h3>Cookies</h3>
                        <p>Our website may use cookies to enhance your browsing experience. You can choose to disable cookies through your browser settings; some features of the site may not function properly as a result.</p>

                        <h3>Your Rights</h3>
                        <p>You may request access to, correction of, or deletion of your personal information by contacting us using the details below.</p>

                        <h3>Changes to This Policy</h3>
                        <p>We may update this Privacy Policy from time to time. Any changes will be posted on this page with an updated revision date.</p>

                        <h3>Contact Us</h3>
                        <p>If you have any questions about this Privacy Policy, please contact us at
                            @if (!empty($global_setting->site_email))
                                <a href="mailto:{{ $global_setting->site_email }}">{{ $global_setting->site_email }}</a>
                            @else
                                our contact page
                            @endif.
                        </p>

                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection