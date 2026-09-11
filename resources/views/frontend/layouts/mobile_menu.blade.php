<div class="mobile-menu">

    <div class="menu-backdrop"></div>

    <div class="close-btn"><i class="fas fa-times"></i></div>

    <nav class="menu-box">

        <div class="nav-logo">
            <a href="{{ route('index') }}">
                <img src="{{ asset(siteSetting()->footer_logo) }}" alt="Site Logo">
            </a>
        </div>

        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>

        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>{{ siteSetting()->head_address }}</li>
                <li><a href="tel:{{ siteSetting()->site_phone }}">{{ siteSetting()->site_phone }}</a></li>
                <li><a href="mailto:{{ siteSetting()->site_email }}">{{ siteSetting()->site_email }}</a></li>
            </ul>
        </div>

        <div class="social-links">
            <ul class="clearfix">
                <li><a href="{{ siteSetting()->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="{{ siteSetting()->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                <li><a href="{{ siteSetting()->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="{{ siteSetting()->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>

    </nav>

</div>
