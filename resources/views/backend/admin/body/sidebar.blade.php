<div class="main-sidebar sidebar-style-2">

    <aside id="sidebar-wrapper">

        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}" title="Peoples International Nursing College">
                <img alt="image" src="{{ asset('frontend/assets/images/logo/pinc_logo.png') }}" class="header-logo mt-3" alt="Site Logo" style="width: 50px;height: 75px;margin-bottom: 20px;" />
                {{-- <span class="logo-name">Peoples International Nursing College</span> --}}
            </a>
        </div>

        <ul class="sidebar-menu mt-3">

            <li class="menu-header">Main</li>

            <li class="dropdown {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i data-feather="monitor"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="dropdown {{ request()->routeIs('admin.slider.list') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="image"></i>
                    <span>Slider Manage</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.slider.list') }}">Slider List</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs(['admin.about-us.list', 'admin.our-contents.list', 'admin.enlistment.list', 'admin.successful_portfolios.list', 'admin.about-message.list', 'admin.our-team.list']) ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="info"></i>
                    <span>About Us</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.about-us.list') }}">About Us</a></li>
                    <li><a class="nav-link" href="{{ route('admin.our-contents.list') }}">Our Contents</a></li>
                    {{-- <li><a class="nav-link" href="{{ route('admin.enlistment.list') }}">Important Enlistment</a></li> --}}
                    {{-- <li><a class="nav-link" href="{{ route('admin.successful_portfolios.list') }}">Firm Profile</a></li> --}}
                    <li><a class="nav-link" href="{{ route('admin.about-message.list') }}">Managing Partner Message</a></li>
                    <li><a class="nav-link" href="{{ route('admin.our-team.list') }}">Our Team</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs(['admin.service.list', 'admin.client.list']) ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="layers"></i>
                    <span>Services</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.service.list') }}">Services List</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs(['admin.institution.list']) ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="home"></i>
                    <span>Institutions</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.institution.list') }}">Institutions List</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs(['admin.scholarship.list', 'admin.scholarship.add', 'admin.scholarship.edit']) ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="award"></i>
                    <span>Scholarship</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.scholarship.list') }}">Scholarship List</a></li>
                    <li><a class="nav-link" href="{{ route('admin.scholarship.add') }}">Add Scholarship</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs(['admin.facility.list', 'admin.facility.add', 'admin.facility.edit']) ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="grid"></i>
                    <span>Campus & Facilities</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.facility.list') }}">Facility List</a></li>
                    <li><a class="nav-link" href="{{ route('admin.facility.add') }}">Add Facility</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs(['admin.admission-info.edit']) ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="clipboard"></i>
                    <span>Admission</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.admission-info.edit') }}">Admission Information</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs(['admin.finance.list']) ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="dollar-sign"></i>
                    <span>Finance Support</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.finance.list') }}">Finance Support</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('admin.trainer.list') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="users"></i>
                    <span>Trainers</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.trainer.list') }}">Trainer List</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs(['admin.training.list']) ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="book-open"></i>
                    <span>Academy</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.training.list') }}">Academy List</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs(['admin.training.enrollment.list']) ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="user-check"></i>
                    <span>Training Enrollments</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.training.enrollment.list') }}">Training Enrollment List</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('admin.testimonial.list') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="star"></i>
                    <span>Testimonials</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.testimonial.list') }}">Testimonial List</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs(['admin.blog-category.list', 'admin.blog.list']) ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="edit-3"></i>
                    <span>Blog</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.blog-category.list') }}">Blog Category List</a></li>
                    <li><a class="nav-link" href="{{ route('admin.blog.list') }}">Blog List</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs(['admin.notice.list', 'admin.notice.add', 'admin.notice.edit']) ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="bell"></i>
                    <span>Notice</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.notice.list') }}">Notice List</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs(['admin.admission-notice.list', 'admin.admission-notice.add', 'admin.admission-notice.edit']) ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="volume-2"></i>
                    <span>Admission Notice</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.admission-notice.list') }}">Admission Notice List</a></li>
                    <li><a class="nav-link" href="{{ route('admin.admission-notice.add') }}">Add Admission Notice</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs(['admin.gallery.list']) ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="camera"></i>
                    <span>Gallery</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.gallery.list') }}">Gallery List</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs(['admin.media_video.list']) ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="video"></i>
                    <span>Media</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.media_video.list') }}">Media Video List</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs(['admin.career.list', 'admin.job_apply.list']) ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="briefcase"></i>
                    <span>Careers</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.career.list') }}">Job Post</a></li>
                    <li><a class="nav-link" href="{{ route('admin.job_apply.list') }}">Job Application</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('admin.contact.list') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="mail"></i>
                    <span>Contact</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.contact.list') }}">Contact Message</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('admin.setting.font-awesome') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="settings"></i>
                    <span>Settings</span>
                </a>
                <ul class="dropdown-menu">
                    {{-- <li><a class="nav-link" href="{{ route('admin.setting.font-awesome') }}">FontAwesome</a></li> --}}
                    <li><a class="nav-link" href="{{ route('admin.setting.edit', siteSetting()->id) }}">Site Setting</a></li>
                </ul>
            </li>

        </ul>

    </aside>

</div>
