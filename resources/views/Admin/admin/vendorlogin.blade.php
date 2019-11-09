<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Qubiee Login</title>
    <meta name="description" content="Qubiee Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="icon.png">

    <link rel="stylesheet" href="{{  asset('public/admin/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{  asset('public/admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{  asset('public/admin/assets/css/font-awesome.min.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css"> -->
    <link rel="stylesheet" href="{{  asset('public/admin/assets/css/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{  asset('public/admin/assets/scss/style.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-darkblue">
    <div class="divTable">
        <div class="divTableCell">
            <div class="sufee-login d-flex align-content-center flex-wrap">
                <div class="container">
                    <div class="login-content">
                         @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif
                        <div class="login-logo">
                            <a href="index.html">
                                <img class="align-content" src="{{  asset('public/
admin/images/logo.png') }}" alt="">
                            </a>
                        </div>
                        <div class="login-form">
                             @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                       <form action="{{ route('vendor.login.submit')}}" method="post">
                              {{csrf_field()}}
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <div class="checkbox">
                                    <label>
<!--                                        <input type="checkbox"> Remember Me-->
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                    </label>
                                    <label class="pull-right">
                                        <!--<a href="#">Forgotten Password?</a>-->
                                     <a class="btn btn-link" href="{{ route('vendor.password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                    </label>

                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30"><i class="fa fa-paper-plane"></i> Sign in</button>
                                <!-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                                        <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
                                    </div>
                                </div>
                                <div class="register-link m-t-15 text-center">
                                    <p>Don't have account ? <a href="page-register.html"> Sign Up Here</a></p>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{  asset('public/admin/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{  asset('public/admin/assets/js/popper.min.js') }}"></script>
    <script src="{{  asset('public/admin/assets/js/plugins.js') }}"></script>
    <script src="{{  asset('public/admin/assets/js/main.js') }}"></script>
  <!--   <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script> -->
</body>
</html>
