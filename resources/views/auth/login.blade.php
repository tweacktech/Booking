<!DOCTYPE html>
<html lang="en" class="h-100">
<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="MotaAdmin - Bootstrap Admin Dashboard" />
	<meta property="og:title" content="MotaAdmin - Bootstrap Admin Dashboard" />
	<meta property="og:description" content="MotaAdmin - Bootstrap Admin Dashboard" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="">
	
	<!-- PAGE TITLE HERE -->
	<title>MotaAdmin - Bootstrap Admin Dashboard</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" />
	
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
	
</head>
<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input id="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="gmail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                <!--end::Input-->
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                               <div class="custom-control custom-checkbox ml-1">
													<input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
													<label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
												</div>
                                            </div>
                                            <div class="form-group">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                             <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                   <!--  <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="#./page-register.html">Sign up</a></p>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('/vendor/global/global.min.js')}}"></script>
	<script src="{{asset('/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('/js/custom.min.js')}}"></script>
    <script src="{{asset('/js/deznav-init.js')}}"></script>

</body>

</html>