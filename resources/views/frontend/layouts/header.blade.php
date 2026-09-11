<header class="main-header header-style-two">

    <!-- header-top -->
    <div class="header-top">

        <div class="top-inner">

            <div class="top-left">
                <ul class="social-links clearfix">
                    <li><a href="{{ siteSetting()->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="{{ siteSetting()->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="{{ siteSetting()->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="{{ siteSetting()->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>

            <div class="top-right">
                <ul class="info">
                    <li><i class="icon-20"></i>{{ siteSetting()->head_address }}</li>
                    <li><i class="icon-21"></i><a href="tel:{{ siteSetting()->site_phone }}">{{ siteSetting()->site_phone }}</a></li>
                    <li><i class="icon-22"></i><a href="mailto:{{ siteSetting()->site_email }}">{{ siteSetting()->site_email }}</a></li>
                </ul>
            </div>

        </div>

    </div>

    <!-- header-lower -->
    <div class="header-lower">

        <div class="outer-box">

            <div class="logo-box">
                <figure class="logo">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset(siteSetting()->header_logo) }}" alt="Site Logo">
                    </a>
                </figure>
            </div>

            <div class="menu-area clearfix">

                <!--Mobile Navigation Toggler-->
                <div class="mobile-nav-toggler">
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                </div>

                <nav class="main-menu navbar-expand-md navbar-light">
                    <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                        <ul class="navigation clearfix">

                            <li><a href="{{ route('index') }}">Home</a></li>

                            <li class="dropdown"><a href="javascript:void(0)">About Us</a>
                                <ul>
                                    <li><a href="{{ route('frontend.about.us') }}">About Company</a></li>
                                    <li><a href="{{ route('frontend.mission.vision.values') }}">Mission, Vision & Values</a></li>
                                    <li><a href="{{ route('frontend.executive.director.message') }}">Executive Director's Message</a></li>
                                    <li><a href="{{ route('frontend.executive.committee') }}">Executive Committee</a></li>
                                    <li><a href="{{ route('frontend.our.leadership') }}">Our Leadership</a></li>
                                    <li><a href="{{ route('frontend.our.partners') }}">Our Partners</a></li>
                                    <li><a href="{{ route('frontend.meet.our.team') }}">Meet Our Team</a></li>
                                </ul>
                            </li>

                            <li><a href="{{ route('frontend.all.services.list') }}">Services</a></li>

                            <li class="dropdown"><a href="javascript:void(0)">Resources</a>
                                <ul>
                                    <li><a href="{{ route('frontend.media') }}">Media</a></li>
                                    <li><a href="{{ route('frontend.blog.list') }}">Blog</a></li>
                                    <li><a href="{{ route('frontend.notice.list') }}">Notice</a></li>
                                    <li><a href="{{ route('frontend.donation.list') }}">Donate</a></li>
                                </ul>
                            </li>

                            <li><a href="{{ route('frontend.career') }}">Career</a></li>

                            <li><a href="{{ route('frontend.contact.us') }}">Contact</a></li>

                        </ul>

                    </div>

                </nav>

            </div>

            <ul class="nav-right">
                <div class="btn-box">
                    <a href="{{ route('frontend.donation.list') }}" class="donate-box-btn theme-btn-one"><span>Donate Now</span></a>
                </div>
            </ul>

        </div>

    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="outer-container">
            <div class="outer-box">
                <div class="logo-box">
                    <figure class="logo">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset(siteSetting()->header_logo) }}" alt="Site Logo">
                        </a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                    <ul class="nav-right">
                        <div class="btn-box">
                            <a href="{{ route('frontend.donation.list') }}" class="donate-box-btn theme-btn-one"><span>Donate Now</span></a>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</header>
