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
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/assets/font-awesome/css/font-awesome.min.css') }}">

    <!-- ionic fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/assets/css/ionicons.min.css') }}">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <!-- Owl Carousel Assets -->
    <link href="{{ asset('/assets/owl/owl.carousel.css" rel="stylesheet" type="text/css') }}">
    <link href="{{ asset('/assets/owl/owl.theme.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/owl/owl.transitions.css') }}" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- ragister page -->
    <div class="loginPage">
        <div class="container">
            <div class="row main">
                <div class="main-login main-center">
                    <h5>Sign up once and watch any of our demos.</h5>
                    <form class="" method="post" action="<?php echo url('/index/adduser') ?>" >
                        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                               <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Your Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Your Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Username</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter your Username" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label">Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirm your Password" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <button type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button">Register</button>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div style="border-top: 1px solid#888; padding-top:15px;">
                                    <a class="singinlink" href="<?php echo url('/index/login'); ?>">
                                        Login
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