@extends('frontend.dashboard')
@section('title', 'Terms & Conditions')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Terms & Conditions'])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">

                    <div class="text-neutral-500">

                        <p>Last updated: {{ now()->format('F j, Y') }}</p>

                        <p>Please read these Terms &amp; Conditions carefully before using the Peoples International Nursing College website or applying for any of our programs. By accessing this website or submitting an application, you agree to be bound by these terms.</p>

                        <h3>Use of the Website</h3>
                        <ul>
                            <li>This website is provided for informational purposes about our academic programs, admissions, training, and related services.</li>
                            <li>You agree not to misuse the website, including attempting unauthorized access, disrupting services, or submitting false information through our forms.</li>
                        </ul>

                        <h3>Admissions &amp; Enrollment</h3>
                        <ul>
                            <li>Submitting an admission or enrollment form does not guarantee a seat. All applications are subject to review and approval as per our eligibility criteria.</li>
                            <li>Applicants are responsible for providing accurate and complete information. Incomplete or inaccurate applications may be rejected.</li>
                            <li>Program schedules, fees, and eligibility requirements are subject to change; the latest details on each program's page will apply.</li>
                        </ul>

                        <h3>Payments</h3>
                        <ul>
                            <li>Payments made through listed methods for training enrollment are subject to the payment provider's own terms.</li>
                            <li>Refund eligibility, if any, is determined on a case-by-case basis. Please contact our office directly with your invoice/transaction details for any refund inquiries.</li>
                        </ul>

                        <h3>Intellectual Property</h3>
                        <p>All content on this website, including text, images, logos, and course materials, is the property of Peoples International Nursing College unless otherwise stated, and may not be reproduced without written permission.</p>

                        <h3>Limitation of Liability</h3>
                        <p>We make reasonable efforts to keep information on this website accurate and up to date, but we do not guarantee that all content is error-free. Peoples International Nursing College is not liable for any indirect or incidental loss arising from the use of this website.</p>

                        <h3>Third-Party Links</h3>
                        <p>Our website may contain links to third-party sites (e.g. social media, partner hospitals). We are not responsible for the content or privacy practices of these external sites.</p>

                        <h3>Changes to These Terms</h3>
                        <p>We may revise these Terms &amp; Conditions from time to time. Continued use of the website after changes are posted constitutes acceptance of the revised terms.</p>

                        <h3>Governing Law</h3>
                        <p>These terms are governed by the laws of Bangladesh.</p>

                        <h3>Contact Us</h3>
                        <p>For any questions regarding these Terms &amp; Conditions, please contact us at
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