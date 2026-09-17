<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login | Peoples International Nursing College</title>
    {{-- App CSS --}}
    <link rel="stylesheet" href="{{ asset('/backend/assets/css/app.min.css') }}">
    {{-- Bootstrap Social CSS --}}
    <link rel="stylesheet" href="{{ asset('/backend/assets/bundles/bootstrap-social/bootstrap-social.css') }}">
    {{-- Style CSS --}}
    <link rel="stylesheet" href="{{ asset('/backend/assets/css/style.css') }}">
    {{-- Components CSS --}}
    <link rel="stylesheet" href="{{ asset('/backend/assets/css/components.css') }}">
    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('/backend/assets/css/custom.css') }}">
    {{-- Favicon --}}
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('frontend/assets/images/logo/favicon.png') }}' />

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            margin: 0;
            font-family: 'Poppins', 'Nunito', sans-serif;
            background: linear-gradient(135deg, #0F3050 0%, #18477F 45%, #67C8D9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .pif-login-wrapper {
            width: 100%;
            max-width: 960px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0px 25px 60px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            display: flex;
            min-height: 560px;
        }

        .pif-login-brand {
            position: relative;
            flex: 0 0 42%;
            background: linear-gradient(160deg, #0F3050 0%, #18477F 55%, #67C8D9 130%);
            padding: 55px 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: #fff;
            overflow: hidden;
        }

        .pif-login-brand:before,
        .pif-login-brand:after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
        }

        .pif-login-brand:before {
            width: 260px;
            height: 260px;
            top: -80px;
            right: -80px;
        }

        .pif-login-brand:after {
            width: 180px;
            height: 180px;
            bottom: -60px;
            left: -60px;
        }

        .pif-login-brand .brand-logo {
            position: relative;
            z-index: 1;
            background: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 16px;
            border-radius: 12px;
            width: fit-content;
            min-height: 46px;
            min-width: 80px;
        }

        .pif-login-brand .brand-logo img {
            max-width: 150px;
            max-height: 70px;
            width: auto;
            height: auto;
            display: block;
        }

        .pif-login-brand .brand-text {
            position: relative;
            z-index: 1;
        }

        .pif-login-brand .brand-text h2 {
            font-size: 26px;
            font-weight: 700;
            line-height: 1.35;
            margin-bottom: 14px;
        }

        .pif-login-brand .brand-text p {
            font-size: 14.5px;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.85);
            margin: 0;
        }

        .pif-login-brand .brand-footer {
            position: relative;
            z-index: 1;
            font-size: 12.5px;
            color: rgba(255, 255, 255, 0.7);
        }

        .pif-login-form-side {
            flex: 1;
            padding: 60px 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .pif-login-form-side h3 {
            font-size: 26px;
            font-weight: 700;
            color: #202124;
            margin-bottom: 6px;
        }

        .pif-login-form-side .subtitle {
            font-size: 14px;
            color: #8a8a8a;
            margin-bottom: 34px;
        }

        .pif-form-group {
            margin-bottom: 22px;
        }

        .pif-form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .pif-input-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }

        .pif-input-wrap .input-icon {
            position: absolute;
            left: 16px;
            color: #18477F;
            font-size: 15px;
            line-height: 1;
            pointer-events: none;
        }

        .pif-form-group input {
            width: 100%;
            padding: 13px 16px 13px 44px;
            border: 1.5px solid #e6e6e6;
            border-radius: 10px;
            font-size: 14.5px;
            line-height: 1.4;
            color: #333;
            background: #FAFAFA;
            transition: all 250ms ease;
        }

        .pif-form-group input:focus {
            outline: none;
            border-color: #18477F;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(24, 71, 127, 0.12);
        }

        .pif-form-group input:-webkit-autofill,
        .pif-form-group input:-webkit-autofill:hover,
        .pif-form-group input:-webkit-autofill:focus {
            -webkit-text-fill-color: #333;
            -webkit-box-shadow: 0 0 0 1000px #FAFAFA inset;
            transition: background-color 5000s ease-in-out 0s;
        }

        .pif-form-group .invalid-feedback {
            display: none;
            font-size: 12.5px;
            color: #E02424;
            margin-top: 6px;
        }

        .pif-login-btn {
            width: 100%;
            border: none;
            padding: 14px;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            color: #fff;
            background: linear-gradient(90deg, #18477F, #2E7DA8);
            letter-spacing: 0.3px;
            transition: all 300ms ease;
        }

        .pif-login-btn:hover {
            background: linear-gradient(90deg, #123A5C, #67C8D9);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(24, 71, 127, 0.3);
        }

        @media only screen and (max-width: 767px) {
            .pif-login-wrapper {
                flex-direction: column;
                min-height: 0;
            }

            .pif-login-brand,
            .pif-login-form-side {
                flex: 1 1 auto;
                padding: 40px 30px;
            }
        }
    </style>
</head>

<body>
    <div class="loader"></div>

    <div id="app">

        <div class="pif-login-wrapper">

            <div class="pif-login-brand">
                <div class="brand-logo">
                    <img src="{{ asset(siteSetting()->header_logo) }}" alt="Site Logo" onerror="this.replaceWith(Object.assign(document.createElement('span'), {innerText: 'PINC', style: 'font-weight:700;font-size:18px;color:#18477F;padding:0 6px;'}))" style="width: 100%;">
                </div>

                <div class="brand-text">
                    <h2>Welcome to the<br>Admin Dashboard</h2>
                    <p>Manage academic programs, admissions, faculty, notices, gallery and everything that powers Peoples International Nursing College's website — all in one place.</p>
                </div>

                <div class="brand-footer">
                    &copy; {{ date('Y') }} Peoples International Nursing College. All rights reserved.
                </div>
            </div>

            <div class="pif-login-form-side">

                <h3>Sign In</h3>
                <p class="subtitle">Enter your credentials to access the admin panel.</p>

                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                    @csrf

                    <div class="pif-form-group">
                        <label for="email">Email Address</label>
                        <div class="pif-input-wrap">
                            <i class="fas fa-envelope input-icon"></i>
                            <input id="email" type="email" class="form-control" name="email" placeholder="you@example.com" tabindex="1" required autofocus style="padding-left: 40px;">
                        </div>
                        <div class="invalid-feedback">Please fill in your email</div>
                    </div>

                    <div class="pif-form-group">
                        <label for="password">Password</label>
                        <div class="pif-input-wrap">
                            <i class="fas fa-lock input-icon"></i>
                            <input id="password" type="password" class="form-control" name="password" placeholder="••••••••" tabindex="2" required style="padding-left: 40px;">
                        </div>
                        <div class="invalid-feedback">Please fill in your password</div>
                    </div>

                    <div class="pif-form-group mb-0">
                        <button type="submit" class="pif-login-btn" tabindex="4">
                            Login
                        </button>
                    </div>
                </form>

            </div>

        </div>

    </div>

    {{-- App JS --}}
    <script src="{{ asset('/backend/assets/js/app.min.js') }}"></script>
    {{-- Script JS --}}
    <script src="{{ asset('/backend/assets/js/scripts.js') }}"></script>
    {{-- Custom JS --}}
    <script src="{{ asset('/backend/assets/js/custom.js') }}"></script>
</body>

</html>
