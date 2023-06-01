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
  <meta property="og:image" content="https://motaadmin.dexignlab.com/xhtml/social-image.png" />
  <meta name="format-detection" content="telephone=no">
  
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
                <div class="col-md-5">
                    <div class="form-input-content text-center error-page">
                        <h1 class="error-text font-weight-bold">404</h1>
                        <h4><i class="fa fa-exclamation-triangle text-warning"></i> The page you were looking for is not found!</h4>
                        <p>You may have mistyped the address or the page may have moved.</p>
            <div>
                            <a class="btn btn-primary" href="{{route('home')}}">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
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