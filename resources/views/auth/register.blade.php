<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register & Signup | ADAK Recruitment Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">

    <!-- Bootstrap css -->
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>
    <!-- icons -->
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Head js -->
    <script src="{{asset('backend/assets/js/head.js')}}"></script>

</head>

<body class="authentication-bg authentication-bg-pattern">

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-8">
                <div class="card bg-pattern">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <div class="auth-logo">
                                <a href="" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="{{asset('backend/assets/images/logo-dark.png')}}" alt="" height="102">
                                            </span>
                                </a>

                                <a href="" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="{{asset('backend/assets/images/logo-light.png')}}" alt="" height="102">
                                            </span>
                                </a>
                            </div>
                            <p class="text-muted mb-4 mt-3">Don't have an account? Create your account, it takes less than a minute</p>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" type="email" id="email"  name="email"  placeholder="Enter your email">
                                <x-input-error :messages="$errors->get('email')" style="color: red" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input class="form-control" type="text" id="first_name" name="first_name"  placeholder="Enter your name" required>
                                <x-input-error :messages="$errors->get('first_name')" style="color: red" class="mt-2" />
                            </div>


                            <div class="mb-3">
                                <label for="other_name" class="form-label">Other Names</label>
                                <input class="form-control" type="text" id="other_name" name="other_name"  placeholder="Enter your name">
                                <x-input-error :messages="$errors->get('other_name')" style="color: red" class="mt-2" />
                            </div>

                            <div class="mb-3">
                                <label for="first_name" class="form-label">Last Name</label>
                                <input class="form-control" type="text" id="last_name" name="last_name"  placeholder="Enter your Last name" required>
                                <x-input-error :messages="$errors->get('last_name')" style="color: red" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('password')" style="color: red" class="mt-2" />

                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Enter your password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" style="color: red" class="mt-2" />

                            </div>
{{--                            <div class="mb-3">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input type="checkbox" class="form-check-input" id="checkbox-signup">--}}
{{--                                    <label class="form-check-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="text-center d-grid">
                                <button class="btn btn-success" type="submit"> Sign Up </button>
                            </div>

                        </form>



                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-white-50">Already have account?  <a href="{{route('login')}}" class="text-white ms-1"><b>Sign In</b></a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt">
    2015 - <script>document.write(new Date().getFullYear())</script> &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a>
</footer>

<!-- Vendor js -->
<script src="{{asset('backend/assets/js/vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('backend/assets/js/app.min.js')}}"></script>

</body>
</html>
