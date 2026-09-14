<header class="header">

    <div class="container container--xl">

        <nav class="header-inner flex-between gap-8">

            <div class="header-content-wrapper flex-align flex-grow-1">

                <!-- Logo Start -->
                <div class="logo">
                    <a href="{{ route('index') }}" class="link">
                        <img src="{{ asset('frontend/assets/images/logo/logo.png') }}" alt="Logo">
                    </a>
                </div>
                <!-- Logo End  -->


                <!-- Menu Start  -->
                <div class="header-menu d-lg-block d-none">

                    <ul class="nav-menu flex-align ">

                        <li class="nav-menu__item activePage">
                            <a href="{{ route('index') }}" class="nav-menu__link">Home</a>
                        </li>

                        <li class="nav-menu__item has-submenu">
                            <a href="javascript:void(0)" class="nav-menu__link">Courses</a>
                            <ul class="nav-submenu scroll-sm">
                                <li class="nav-submenu__item">
                                    <a href="course.html" class="nav-submenu__link hover-bg-neutral-30"> Course Grid View</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="course-list-view.html" class="nav-submenu__link hover-bg-neutral-30"> Course List View</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="course-details.html" class="nav-submenu__link hover-bg-neutral-30"> Course Details</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="lesson-details.html" class="nav-submenu__link hover-bg-neutral-30"> Lesson Details</a>
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
                            <a href="javascript:void(0)" class="nav-menu__link">Blog</a>
                            <ul class="nav-submenu scroll-sm">
                                <li class="nav-submenu__item">
                                    <a href="blog.html" class="nav-submenu__link hover-bg-neutral-30"> Blog Grid</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="blog-list.html" class="nav-submenu__link hover-bg-neutral-30"> Blog List</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="blog-classic.html" class="nav-submenu__link hover-bg-neutral-30"> Blog Classic</a>
                                </li>
                                <li class="nav-submenu__item">
                                    <a href="blog-details.html" class="nav-submenu__link hover-bg-neutral-30"> Blog Details</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-menu__item">
                            <a href="contact.html" class="nav-menu__link">Contact</a>
                        </li>

                    </ul>

                </div>
                <!-- Menu End  -->

            </div>

            <!-- Header Right start -->
            <div class="header-right flex-align">
                <form action="#" class="search-form position-relative d-xl-block d-none">
                    <input type="text" class="common-input rounded-pill bg-main-25 pe-48 border-neutral-30" placeholder="Search...">
                    <button type="submit" class="w-36 h-36 bg-main-600 hover-bg-main-700 rounded-circle flex-center text-md text-white position-absolute top-50 translate-middle-y inset-inline-end-0 me-8">
                        <i class="ph-bold ph-magnifying-glass"></i>
                    </button>
                </form>
                <a href="sign-in.html" class="info-action w-52 h-52 bg-main-25 hover-bg-main-600 border border-neutral-30 rounded-circle flex-center text-2xl text-neutral-500 hover-text-white hover-border-main-600">
                    <i class="ph ph-user-circle"></i>
                </a>
                <button type="button" class="toggle-mobileMenu d-lg-none text-neutral-200 flex-center">
                    <i class="ph ph-list"></i>
                </button>
            </div>
            <!-- Header Right End  -->

        </nav>

    </div>

</header>
