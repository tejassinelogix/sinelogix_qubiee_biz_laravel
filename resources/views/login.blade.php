<!DOCTYPE html>
<html lang="en">

<head>
    <title>Xtacky Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('/assets/images/icon.png') }}" type="image/x-icon" />

    <!-- Bootstrap -->
    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--style-->
    <link href="{{ asset('/assets/css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">

    <!--Font-Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/font-awesome/css/font-awesome.min.css') }}">

    <!-- ionic fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/ionicons.min.css') }}">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <!-- Owl Carousel Assets -->
    <link href="{{ asset('/assets/owl/owl.carousel.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/owl/owl.theme.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/owl/owl.transitions.css') }}" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- login page -->
    <div class="loginPage">
        <div class="container">
            <div class="row main">
                <div class="main-login main-center">
                    <h5>Sign in once and watch any of our demos.</h5>
                    <form class="" method="post" action="<?php echo url('/index/loginuser') ?>">
                      @if (\Session::has('errorMessage'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! \Session::get('errorMessage') !!}</li>
                    </ul>
                </div>
                @endif
                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">User Name or Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="uname" id="name" placeholder="Username or Email" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label">Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="psw" id="password" placeholder="Password" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg login-button">Login</button>
                            <!--<a href="#" target="_blank" type="button" id="button" class="btn btn-primary btn-lg login-button">Login</a>-->
                      
                            <a id="btn-fblogin" href="#" class="btn btn-primary btn-lg login-button"><i class="fa fa-facebook"></i> Login with Facebook</a>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div style="border-top: 1px solid#888; padding-top:15px;">
                                    Don't have an account!
                                    <a class="singinlink" href="<?php echo url('/index/registration'); ?>">
                                        Sign Up Here
                                    </a> &nbsp;&nbsp;or <br>
                                    <a class="singinlink text-center" href="<?php echo url('/index/forgetpassoword'); ?>">
                                        Forgot password?
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end of login page -->

    <!--Scroll to top-->
    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>

    <!-- jQuery library -->
    <script type="text/javascript" src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/jquery.transit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/modernizr.custom.js') }}"></script>

    <!-- owl carousel -->
    <script type="text/javascript" src="{{ asset('/assets/owl/owl.carousel.js') }}"></script>

    <!-- custom jquery -->
    <script type="text/javascript" src="{{ asset('/assets/js/custom.js') }}"></script>

</body>

</html>