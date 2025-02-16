<!DOCTYPE html>
<html lang="en" data-layout-mode="light_mode">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta name="description" content="Garments Manufacturing ERP SOFTWARE" />
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects" />
    <meta name="author" content="Dreamguys - Bootstrap Admin Template" />
    <meta name="robots" content="noindex, nofollow" />
    <title>Inventory & POS</title>

    <script
        src="{{asset('assets')}}/js/theme-script.js"
        type="6bc737fdedebc88b41732761-text/javascript"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon"
        href="https://dreamspos.dreamstechnologies.com/html/template/assets/img/favicon.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css" />

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap-datetimepicker.min.css" />

    <!-- animation CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/animate.css" />

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/select2.min.css" />

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/fontawesome.min.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/all.min.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    @yield('css')
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"></div>
    </div>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <div class="page-wrapper" style="margin-left: 0px !important">
            <div class="content">
                <div class="account-content">
                    <div class="login-wrapper" style="min-height: 0 !important">
                        <div class="login-content shadow-lg p-4 rounded bg-white" style="max-width: 400px; margin: auto;">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="login-userset">
                                    <div class="login-logo logo-normal">
                                        <img src="{{ asset('assets/img/logo.webp') }}" alt="logo">
                                    </div>
                                    <a href="{{ url('/') }}" class="login-logo logo-white">
                                        <img src="{{ asset('assets/img/logo-white.webp') }}" alt="logo">
                                    </a>

                                    <div class="login-userheading">
                                        <h3>Sign In</h3>
                                        <h4>Access the Dreamspos panel using your email and passcode.</h4>
                                    </div>

                                    <!-- Email Input -->
                                    <div class="form-login mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <div class="form-addons">
                                            <input id="email" type="email" name="email" class="block mt-1 w-full form-control" value="{{ old('email') }}" required autofocus autocomplete="username">
                                            <img src="{{ asset('assets/img/mail.svg') }}" alt="email icon">
                                        </div>
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Password Input -->
                                    <div class="form-login mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="pass-group">
                                            <input id="password" type="password" name="password" class="block mt-1 w-full pass-input form-control" required autocomplete="current-password">
                                            <span class="fas toggle-password fa-eye-slash"></span>
                                        </div>
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Remember Me Checkbox -->
                                    <div class="form-login authentication-check">
                                        <div class="row">
                                            <div class="col-12 d-flex align-items-center justify-content-between">
                                                <label for="remember_me" class="checkboxs ps-4 mb-0 pb-0 line-height-1">
                                                    <input id="remember_me" type="checkbox" name="remember" class="form-control rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700">
                                                    <span class="checkmarks"></span> Remember me
                                                </label>

                                                <div class="text-end">
                                                    <a class="forgot-link" href="{{ route('password.request') }}">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="form-login">
                                        <button type="submit" class="btn btn-login">Sign In</button>
                                    </div>

                                    <!-- Register Link -->
                                    <div class="signinform">
                                        <h4>New on our platform?
                                            <a href="{{ route('register') }}" class="hover-a">Create an account</a>
                                        </h4>
                                    </div>

                                    <!-- Social Links -->
                                    <div class="form-setlogin or-text">
                                        <h4>OR</h4>
                                    </div>
                                    <div class="form-sociallink">
                                        <ul class="d-flex">
                                            <li>
                                                <a href="javascript:void(0);" class="facebook-logo">
                                                    <img src="{{ asset('assets/img/facebook-logo.svg') }}" alt="Facebook">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img src="{{ asset('assets/img/google.webp') }}" alt="Google">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="apple-logo">
                                                    <img src="{{ asset('assets/img/apple-logo.svg') }}" alt="Apple">
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                                            <p>Copyright © 2023 DreamsPOS. All rights reserved</p>
                                        </div>
                                    </div>
                                </div>
                            </form>


                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="customizer-links" id="setdata">
            <ul class="sticky-sidebar">
                <li class="sidebar-icons">
                    <a href="#" class="navigation-add" data-bs-toggle="tooltip" data-bs-placement="left"
                        data-bs-original-title="Theme">
                        <i data-feather="settings" class="feather-five"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script
        src="{{asset('assets')}}/js/jquery-3.7.1.min.js"
        type="6bc737fdedebc88b41732761-text/javascript"></script>

    <!-- Feather Icon JS -->
    <script
        src="{{asset('assets')}}/js/feather.min.js"
        type="6bc737fdedebc88b41732761-text/javascript"></script>

    <!-- Slimscroll JS -->
    <script
        src="{{asset('assets')}}/js/jquery.slimscroll.min.js"
        type="6bc737fdedebc88b41732761-text/javascript"></script>

    <!-- Bootstrap Core JS -->
    <script
        src="{{asset('assets')}}/js/bootstrap.bundle.min.js"
        type="6bc737fdedebc88b41732761-text/javascript"></script>

    <!-- Chart JS -->
    <script
        src="{{asset('assets')}}/js/plugins/apexchart/apexcharts.min.js"
        type="6bc737fdedebc88b41732761-text/javascript"></script>
    <script
        src="{{asset('assets')}}/js/plugins/apexchart/chart-data.js"
        type="6bc737fdedebc88b41732761-text/javascript"></script>

    <!-- Sweetalert 2 -->
    <script
        src="{{asset('assets')}}/js/plugins/sweetalert/sweetalert2.all.min.js"
        type="6bc737fdedebc88b41732761-text/javascript"></script>
    <script
        src="{{asset('assets')}}/js/plugins/sweetalert/sweetalerts.min.js"
        type="6bc737fdedebc88b41732761-text/javascript"></script>

    <!-- Custom JS -->

    <script
        src="{{asset('assets')}}/js/script.js"
        type="6bc737fdedebc88b41732761-text/javascript"></script>

    <script src="{{ asset('assets') }}/js/rocket-loader.min.js" data-cf-settings="6bc737fdedebc88b41732761-|49" defer>
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"90e33fd83af0a475","version":"2025.1.0","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}'
        crossorigin="anonymous"></script>
    @yield('script')
</body>

</html>