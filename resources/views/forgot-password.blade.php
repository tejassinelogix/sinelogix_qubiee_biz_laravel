<!DOCTYPE html>
<html lang="en">

<head>
    <title>Qubiee Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('/public/assets/images/icon.png')}}" type="image/x-icon" />

    <!-- Bootstrap -->
    <link href="{{ asset('/public/assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!--style-->
    <link href="{{ asset('/public/assets/css/normalize.css')}}" rel="stylesheet">
    <link href="{{ asset('/public/assets/css/style.css')}}" rel="stylesheet">

    <!--Font-Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/assets/font-awesome/css/font-awesome.min.css')}}">

    <!-- ionic fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/assets/css/ionicons.min.css')}}">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <!-- Owl Carousel Assets -->
    <link href="{{ asset('/public/assets/owl/owl.carousel.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/public/assets/owl/owl.theme.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/public/assets/owl/owl.transitions.css')}}" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- login page -->
    <div class="loginPage">
        <div class="container">
            <div class="row main">
                <div class="main-login main-center">
                    <h4>Recover Account</h4>
                    <form class="" method="post" action="#">

                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Email Address</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Email Address" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <a href="#" target="_blank" type="button" id="button" class="btn btn-primary btn-lg btn-block login-button">Recover Account</a>
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
    <script type="text/javascript" src="{{ asset('/public/assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/public/assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/public/assets/js/jquery.transit.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/public/assets/js/modernizr.custom.js')}}"></script>

    <!-- owl carousel -->
    <script type="text/javascript" src="{{ asset('/public/assets/owl/owl.carousel.js')}}"></script>

    <!-- custom jquery -->
    <script type="text/javascript" src="{{ asset('/public/assets/js/custom.js')}}"></script>

</body>

</html>