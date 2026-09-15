<footer class="footer bg-neutral-900 position-relative z-1">

    <img src="{{ asset('frontend/assets/images/shapes/shape2.png') }}" alt="" class="shape five animation-scalation">
    <img src="{{ asset('frontend/assets/images/shapes/shape6.png') }}" alt="" class="shape one animation-scalation">

    <div class="py-120">

        <div class="container container-two">

            <div class="row gy-5">

                <div class="col-lg-3 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-duration="400">
                    <div class="footer-item">
                        <div class="footer-item__logo mb-0" data-aos="zoom-in-right">
                            <a href="{{ route('index') }}">
                                <img src="{{ !empty($global_setting->footer_logo) ? asset($global_setting->footer_logo) : asset('frontend/assets/images/logo/logo-white.png') }}" alt="Peoples International Nursing College">
                            </a>
                        </div>
                        <p class="my-32 text-white txt_justify">{{ $global_setting->footer_text }}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-duration="400">
                    <div class="footer-item">
                        <h4 class="footer-item__title fw-medium text-white mb-32">Quick Links</h4>
                        <ul class="footer-menu">
                            <li class="mb-16">
                                <a href="{{ route('frontend.about.us') }}" class="text-white hover-text-main-600 hover-text-decoration-underline">About Us</a>
                            </li>
                            <li class="mb-16">
                                <a href="{{ route('frontend.training.development') }}" class="text-white hover-text-main-600 hover-text-decoration-underline">Academy</a>
                            </li>
                            <li class="mb-16">
                                <a href="{{ route('frontend.team.list') }}" class="text-white hover-text-main-600 hover-text-decoration-underline">Our Team</a>
                            </li>
                            <li class="mb-16">
                                <a href="{{ route('frontend.career') }}" class="text-white hover-text-main-600 hover-text-decoration-underline">Career</a>
                            </li>
                            <li class="mb-0">
                                <a href="{{ route('frontend.blog.list') }}" class="text-white hover-text-main-600 hover-text-decoration-underline">Blog</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-duration="600">
                    <div class="footer-item">
                        <h4 class="footer-item__title fw-medium text-white mb-32">Resources</h4>
                        <ul class="footer-menu">
                            <li class="mb-16">
                                <a href="{{ route('frontend.notice.list') }}" class="text-white hover-text-main-600 hover-text-decoration-underline">Notice</a>
                            </li>
                            <li class="mb-16">
                                <a href="{{ route('frontend.notice.circular') }}" class="text-white hover-text-main-600 hover-text-decoration-underline">Notice &amp; Circular</a>
                            </li>
                            <li class="mb-16">
                                <a href="{{ route('frontend.publications') }}" class="text-white hover-text-main-600 hover-text-decoration-underline">Publications</a>
                            </li>
                            <li class="mb-16">
                                <a href="{{ route('frontend.gallery') }}" class="text-white hover-text-main-600 hover-text-decoration-underline">Gallery</a>
                            </li>
                            <li class="mb-0">
                                <a href="{{ route('frontend.donation.list') }}" class="text-white hover-text-main-600 hover-text-decoration-underline">Donation</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-duration="800">

                    <div class="footer-item">

                        <h4 class="footer-item__title fw-medium text-white mb-32">Contact Us</h4>

                        <div class="flex-align gap-20 mb-24">
                            <span class="icon d-flex text-32 text-main-600"><i class="ph ph-map-trifold"></i></span>
                            <div class="">
                                @if (!empty($global_setting->head_address))
                                    <a href="javascript:void(0)" class="text-white d-block hover-text-main-600 mb-4">{{ $global_setting->head_address }}</a>
                                @endif
                            </div>
                        </div>

                        <div class="flex-align gap-20 mb-24">
                            <span class="icon d-flex text-32 text-main-600"><i class="ph ph-phone"></i></span>
                            <div class="">
                                @if (!empty($global_setting->site_phone))
                                    <a href="tel:{{ $global_setting->site_phone }}" class="text-white d-block hover-text-main-600 mb-4">{{ $global_setting->site_phone }}</a>
                                @endif
                                @if (!empty($global_setting->site_phone_alter))
                                    <a href="tel:{{ $global_setting->site_phone_alter }}" class="text-white d-block hover-text-main-600 mb-0">{{ $global_setting->site_phone_alter }}</a>
                                @endif
                            </div>
                        </div>

                        <div class="flex-align gap-20 mb-24">
                            <span class="icon d-flex text-32 text-main-600"><i class="ph ph-envelope-open"></i></span>
                            <div class="">
                                @if (!empty($global_setting->site_email))
                                    <a href="mailto:{{ $global_setting->site_email }}" class="text-white d-block hover-text-main-600 mb-4">{{ $global_setting->site_email }}</a>
                                @endif
                                @if (!empty($global_setting->site_email_alter))
                                    <a href="mailto:{{ $global_setting->site_email_alter }}" class="text-white d-block hover-text-main-600 mb-0">{{ $global_setting->site_email_alter }}</a>
                                @endif
                            </div>
                        </div>

                        <ul class="social-list flex-align gap-24" data-aos="zoom-in-left">
                            @if (!empty($global_setting->facebook))
                                <li class="social-list__item">
                                    <a href="{{ $global_setting->facebook }}" target="_blank" class="text-white text-2xl hover-text-main-two-600"><i class="ph-bold ph-facebook-logo"></i></a>
                                </li>
                            @endif
                            @if (!empty($global_setting->youtube))
                                <li class="social-list__item">
                                    <a href="{{ $global_setting->youtube }}" target="_blank" class="text-white text-2xl hover-text-main-two-600"><i class="ph-bold ph-youtube-logo"></i></a>
                                </li>
                            @endif
                            @if (!empty($global_setting->linkedin))
                                <li class="social-list__item">
                                    <a href="{{ $global_setting->linkedin }}" target="_blank" class="text-white text-2xl hover-text-main-two-600"><i class="ph-bold ph-linkedin-logo"></i></a>
                                </li>
                            @endif
                            @if (!empty($global_setting->instagram))
                                <li class="social-list__item">
                                    <a href="{{ $global_setting->instagram }}" target="_blank" class="text-white text-2xl hover-text-main-two-600"><i class="ph-bold ph-instagram-logo"></i></a>
                                </li>
                            @endif
                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="container">

        <!-- bottom Footer -->
        <div class="bottom-footer border-top border-dashed border-neutral-600 border-0 py-32">

            <div class="container container-two">

                <div class="bottom-footer__inner flex-center gap-16 flex-wrap">

                    <p class="text-white text-line-1 fw-normal" data-aos="zoom-in">
                        {!! $global_setting->copyright !!}
                    </p>

                </div>

            </div>

        </div>

    </div>

</footer>
