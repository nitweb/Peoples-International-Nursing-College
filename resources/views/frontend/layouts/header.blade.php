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

                        <li class="nav-menu__item">
                            <a href="{{ route('frontend.campus.facilities') }}" class="nav-menu__link">Campus</a>
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
                                    <a href="{{ route('frontend.academic.faculty') }}" class="nav-submenu__link hover-bg-neutral-30">Academic Faculty</a>
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

                        <li class="nav-menu__item">
                            <a href="{{ route('frontend.faq') }}" class="nav-menu__link">FAQ</a>
                        </li>

                    </ul>

                </div>
            </div>
            <!-- Menu End  -->

        </div>

    </div>

</header>
