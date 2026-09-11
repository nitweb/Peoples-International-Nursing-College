<footer class="main-footer">

    <div class="auto-container">

        <div class="widget-section">

            <div class="row clearfix">

                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="about-widget footer-widget">
                        <div class="widget-title">
                            <figure class="footer-logo">
                                <a href="{{ route('index') }}">
                                    <img src="{{ asset(siteSetting()->footer_logo) }}" alt="Site Logo">
                                </a>
                            </figure>
                        </div>
                        <div class="text rich-content">
                            <p>{{ siteSetting()->footer_text }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="links-widget footer-widget ml_50">
                        <div class="widget-title">
                            <h3>Quick Link</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                <li><a href="{{ route('frontend.about.us') }}">About Us</a></li>
                                <li><a href="{{ route('frontend.all.services.list') }}">Services</a></li>
                                <li><a href="{{ route('frontend.career') }}">Career</a></li>
                                <li><a href="{{ route('frontend.donation.list') }}">Donate Now</a></li>
                                <li><a href="{{ route('frontend.contact.us') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="links-widget footer-widget ml_30">
                        <div class="widget-title">
                            <h3>Usefull Links</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                <li><a href="{{ route('frontend.blog.list') }}">Blog</a></li>
                                <li><a href="{{ route('frontend.media') }}">Media</a></li>
                                <li><a href="{{ route('frontend.notice.list') }}">Notice</a></li>
                                <li><a href="{{ route('frontend.privacy.policy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('frontend.terms.conditions') }}">Terms & Condition</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="contact-widget footer-widget ml_30">
                        <div class="widget-title">
                            <h3>Contact</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="info-list clearfix">
                                <li><i class="icon-17"></i>{{ siteSetting()->head_address }}</li>
                                <li><i class="icon-18"></i><a href="mailto:{{ siteSetting()->site_phone }}">{{ siteSetting()->site_phone }}</a></li>
                                <li><i class="icon-19"></i><a href="tel:{{ siteSetting()->site_email }}">{{ siteSetting()->site_email }}</a></li>
                            </ul>
                        </div>
                        <div class="footer-top">
                            <ul class="social-links">
                                <li><a href="{{ siteSetting()->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ siteSetting()->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="{{ siteSetting()->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="{{ siteSetting()->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="footer-bottom centred">
            <div class="copyright">
                <p>
                    ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    {{ siteSetting()->copyright }} By <a href="https://web.nebulaitbd.com/" target="_blank">Nebula IT.</a> All Rights Reserved.
                </p>
            </div>
        </div>

    </div>

</footer>
