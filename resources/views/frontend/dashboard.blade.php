<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | People's International Foundation</title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('frontend/assets/images/favicon.png') }}" type="image/x-icon">

    <!-- Open Graph Meta Tags -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title') | People's International Foundation" />
    <meta property="og:description" content="People's International Foundation: Dedicated to the empowerment of poor women by creating strong economic and social resource bases." />
    <meta property="og:image" content="{{ asset('frontend/assets/images/og_image.jpg') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="People's International Foundation" />

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('title') | People's International Foundation" />
    <meta name="twitter:description" content="People's International Foundation: Dedicated to the empowerment of poor women by creating strong economic and social resource bases." />
    <meta name="twitter:image" content="{{ asset('frontend/assets/images/og_image.jpg') }}" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('frontend/assets/css/font-awesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/jquery.bootstrap-touchspin.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/color.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/elpath.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/style.css') }}?v={{ filemtime(public_path('frontend/assets/css/style.css')) }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/custom.css') }}?v={{ filemtime(public_path('frontend/assets/css/custom.css')) }}" rel="stylesheet">

</head>

<body>

    <div class="boxed_wrapper">

        <!-- preloader -->
        {{-- @include('frontend.layouts.preloader') --}}

        <!--Search Popup-->
        @include('frontend.layouts.search_popup')

        <!-- main header -->
        @include('frontend.layouts.header')

        <!-- Mobile Menu  -->
        @include('frontend.layouts.mobile_menu')

        {{-- Home Page Contents --}}
        @yield('contents')

        <!-- main-footer -->
        @include('frontend.layouts.footer')

        <!--Scroll to top-->
        <div class="scroll-to-top">
            <div>
                <div class="scroll-top-inner">
                    <div class="scroll-bar">
                        <div class="bar-inner"></div>
                    </div>
                    <div class="scroll-bar-text">Go To Top</div>
                </div>
            </div>
        </div>

    </div>

    <!-- jequery plugins -->
    <script src="{{ asset('frontend/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/validation.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/appear.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/parallax-scroll.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/nav-tool.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bxslider.js') }}"></script>

    <!-- main-js -->
    <script src="{{ asset('frontend/assets/js/script.js') }}?v={{ filemtime(public_path('frontend/assets/js/script.js')) }}"></script>

</body>

</html>