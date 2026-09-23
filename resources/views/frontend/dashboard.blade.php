<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Title --}}
    <title>@yield('title') | Peoples International Nursing College</title>

    {{-- Open Graph Meta Tags --}}
    <meta property="og:title" content="@yield('title') | Peoples International Nursing College">
    <meta property="og:description" content="@yield('meta_description', 'Peoples International Nursing College')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ !empty($global_setting->header_logo) ? asset($global_setting->header_logo) : asset('frontend/assets/images/logo/logo.png') }}">
    <meta property="og:site_name" content="Peoples International Nursing College">

    {{-- Twitter Card Meta Tags --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title') | Peoples International Nursing College">
    <meta name="twitter:description" content="@yield('meta_description', 'Peoples International Nursing College')">
    <meta name="twitter:image" content="{{ !empty($global_setting->header_logo) ? asset($global_setting->header_logo) : asset('frontend/assets/images/logo/logo.png') }}">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/logo/favicon.png') }}">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plyr.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/editor-quill.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/dataTables.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">

</head>

<body>

    {{-- Overlay --}}
    <div class="overlay"></div>

    {{-- Sidebar Overlay --}}
    <div class="side-overlay"></div>

    {{-- Scroll to Top End --}}
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    {{-- Mobile Menu --}}
    @include('frontend.layouts.mobile_menu')

    {{-- Header --}}
    @include('frontend.layouts.header')

    {{-- Home Contents --}}
    @yield('contents')

    {{-- Footer --}}
    @include('frontend.layouts.footer')

    {{-- Scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('frontend/assets/js/boostrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/phosphor-icon.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/counter.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/marquee.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/apexcharts.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plyr.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/editor-quill.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vanilla-tilt.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/aos.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</body>

</html>
