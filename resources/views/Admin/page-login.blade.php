<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Xtacky Admin</title>
    <meta name="description" content="Xtacky Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="icon.png">

    <link rel="stylesheet" href="{{ asset('/admin/assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/cs-skin-elastic.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('/admin/assets/scss/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="{{ asset('/public/admin/images/logo.png')}}" alt="">
                    </a>
                </div>
                <div class="login-form">
                   <form class="" method="post" action="<?php echo url('/administration/loginuser') ?>">
                        @if (\Session::has('errorMessage'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! \Session::get('errorMessage') !!}</li>
                    </ul>
                </div>
                @endif
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="pages-forget.html">Forgotten Password?</a>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <div class="social-login-content">
                            <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
                            </div>
                        </div>
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="<?php echo url('/administration/registration'); ?>"> Sign Up Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('/admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/plugins.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/main.js')}}"></script>


</body>
</html>
