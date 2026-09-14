<div class="mobile-menu scroll-sm d-lg-none d-block">
        <button type="button" class="close-button"><i class="ph ph-x"></i> </button>
        <div class="mobile-menu__inner">
            <a href="{{ route('index') }}" class="mobile-menu__logo">
                <img src="{{ !empty($global_setting->header_logo) ? asset($global_setting->header_logo) : asset('frontend/assets/images/logo/logo.png') }}" alt="Peoples International Nursing College">
            </a>
            <div class="mobile-menu__menu">

                <ul class="nav-menu flex-align nav-menu--mobile">
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
                                <a href="{{ route('frontend.team.list') }}" class="nav-submenu__link hover-bg-neutral-30">Our Team</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-menu__item has-submenu">
                        <a href="javascript:void(0)" class="nav-menu__link">Notices</a>
                        <ul class="nav-submenu scroll-sm">
                            <li class="nav-submenu__item">
                                <a href="{{ route('frontend.notice.list') }}" class="nav-submenu__link hover-bg-neutral-30">Notice</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="{{ route('frontend.notice.circular') }}" class="nav-submenu__link hover-bg-neutral-30">Notice &amp; Circular</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="{{ route('frontend.publications') }}" class="nav-submenu__link hover-bg-neutral-30">Publications</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-menu__item">
                        <a href="{{ route('frontend.career') }}" class="nav-menu__link">Career</a>
                    </li>

                    <li class="nav-menu__item">
                        <a href="{{ route('frontend.gallery') }}" class="nav-menu__link">Gallery</a>
                    </li>

                    <li class="nav-menu__item">
                        <a href="{{ route('frontend.media') }}" class="nav-menu__link">Media</a>
                    </li>

                    <li class="nav-menu__item">
                        <a href="{{ route('frontend.blog.list') }}" class="nav-menu__link">Blog</a>
                    </li>
                    <li class="nav-menu__item">
                        <a href="{{ route('frontend.donation.list') }}" class="nav-menu__link">Donation</a>
                    </li>

                    <li class="nav-menu__item">
                        <a href="{{ route('frontend.contact.us') }}" class="nav-menu__link">Contact</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>