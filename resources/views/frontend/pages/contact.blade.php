@extends('frontend.dashboard')
@section('title', 'Contact Us')
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Contact Us</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- contact-info-section -->
    <section class="contact-info-section bg-color-1 centred">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                    <div class="info-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-63"></i></div>
                            <h3>Phone Number</h3>
                            <p>
                                <a href="tel:{{ $site_setting->site_phone }}">{{ $site_setting->site_phone }}</a>
                                <br>
                                <a href="tel:{{ $site_setting->site_phone_alter }}">{{ $site_setting->site_phone_alter }}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                    <div class="info-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-64"></i></div>
                            <h3>Email Address</h3>
                            <p>
                                <a href="mailto:{{ $site_setting->site_email }}">{{ $site_setting->site_email }}</a>
                                <br />
                                <a href="mailto:{{ $site_setting->site_email_alter }}">{{ $site_setting->site_email_alter }}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                    <div class="info-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-65"></i></div>
                            <h3>Our Location</h3>
                            <p>{{ $site_setting->head_address }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-info-section end -->


    <!-- contact-section -->
    <section class="contact-section sec-pad">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 content-column">
                    <div class="content-box p_relative mr_70">
                        <h3>Feel Free to Contact with us</h3>
                        <div class="rich-content">
                            <p>{{ siteSetting()->footer_text }}</p>
                        </div>
                        <ul class="social-links clearfix">
                            <li><a href="{{ siteSetting()->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ siteSetting()->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="{{ siteSetting()->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="{{ siteSetting()->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <form method="post" action="{{ route('admin.contact.store') }}" id="contact-form">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}" required="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="email" name="email" placeholder="Your email" value="{{ old('email') }}" required="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="phone" required="" placeholder="Phone" value="{{ old('phone') }}">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="subject" required="" placeholder="Subject" value="{{ old('subject') }}">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea name="message" placeholder="Write your message">{{ old('message') }}</textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn mr-0">
                                    <button class="theme-btn-one" type="submit" name="submit-form"><span>Send message</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-section end -->


    <div class="google_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14601.770464306786!2d90.36453465323065!3d23.80285485815108!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d33532b3fb%3A0x2b27b0c01cb2bc0d!2sMirpur-10%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1787906586728!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
    </div>

    {{-- SweetAlert2 (page-specific, only needed here for the contact form response) --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        {{-- 'load' (not 'DOMContentLoaded') so this runs after nice-select's one-time
             page scan has already finished — otherwise nice-select picks up SweetAlert2's
             own hidden internal <select> and renders it as a visible fake dropdown. --}}
        window.addEventListener('load', function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: @json(session('success')),
                    confirmButtonColor: '#f89928',
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: @json(session('error')),
                    confirmButtonColor: '#f89928',
                });
            @endif

            @if ($errors->any())
                Swal.fire({
                    icon: 'warning',
                    title: 'Please check the form',
                    html: '{!! implode('<br>', $errors->all()) !!}',
                    confirmButtonColor: '#f89928',
                });
            @endif
        });
    </script>

@endsection
