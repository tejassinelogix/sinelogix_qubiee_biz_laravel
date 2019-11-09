<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Qubiee') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="https://qbe.demosoftwares.biz/public/css/app.css" rel="stylesheet">
        <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">

        <!--Font-Awesome-->
        <link rel="stylesheet" href="{{ URL::to('public/assets/font-awesome/css/font-awesome.min.css') }}">

        <!-- Ionicons -->
        <script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>
        <link href="https://unpkg.com/ionicons@4.4.6/dist/css/ionicons.min.css" rel="stylesheet">
        <!-- Ionicons -->
        <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,600" rel="stylesheet">
        <style type="text/css">
            .social {
                display: inline-block;
                margin-left: auto;
                margin-right: auto;
                margin-top: 10px;
                font-weight: bold;
                font-size: 16px;
            }
            .social ul li {
                float: left;
                padding-left: 15px;
                margin-top: 15px;
                font-weight: bold;
            }
        </style>
        
        <link href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <!--                <a class="navbar-brand" href="{{ url('/') }}">
                                        {{ config('app.name', 'Qubiee') }}
                                    </a>-->
                    <nav role="navigation" class="navbar navbar-default">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img alt="Etcs-Themes" src="{{ URL::to('public/assets/images/logo.png') }}">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">

                            </ul>
                            <div class="navigationRightSide">
                                <div class="topheader">

                                    <div class="topheaderLinks">
                                        <ul class="navbar-nav ml-auto">
                                            <li><a href="{{ url('/locale/en') }}"><img src="{{asset('public/images/eng.png')}}" style="width: 30px; height: 25px;margin: 5px;"></a></li>
                                <!--    <li><a href="{{ url('/locale/in') }}"><img src="{{asset('images/hin.png')}}" style="width: 30px; height: 25px;margin: 5px;"></a></li> -->
                                            <li><a href="{{ url('/locale/ar') }}"><img src="{{asset('public/images/ar.png')}}" style="width: 30px; height: 25px;margin: 5px;"></a></li>

                                            <!-- Authentication Links -->
                                            @guest
                                            <!--                            <li class="nav-item">
                                                                           <ion-icon name="lock"></ion-icon> <a class="nav-link" href="{{ route('login') }}">{{ __('message.Login') }}</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            @if (Route::has('register'))
                                                                                <ion-icon name="clipboard"></ion-icon><a class="nav-link" href="{{ route('register') }}">{{ __('message.Register') }}</a>
                                                                            @endif
                                                                        </li>-->
                                            <li class="nav-item">
                                            <ion-icon name="cart"></ion-icon><a class="nav-link" href="{{ url('/shopping-cart') }}">{{ __('message.Cart') }}
                                                @if(Session::has('cart'))
                                                <span class="badge">
                                                    {{ Session::has('cart') ? Session::get('cart')->totalQty :'' }}
                                                </span>
                                                @endif
                                            </a>
                                            </li>
                                            @else
                                            <li class="nav-item">
                                            <ion-icon name="cart"></ion-icon> <a class="nav-link" href="{{ url('/shopping-cart') }}">{{ __('message.Cart') }}
                                                @if(Session::has('cart'))
                                                <span class="badge">
                                                    {{ Session::has('cart') ? Session::get('cart')->totalQty :'' }}
                                                </span>
                                                @endif
                                            </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/order') }}">{{ __('message.Orders') }}</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                                        {{ __('message.Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                            @endguest
                                        </ul>

                                    </div>

                                </div>
                            </div>
                    </nav>
                </div>
            </nav>
        </div>

        <main class="py-4">
            @yield('content')
        </main>

        <!-- jQuery library -->
        <script src="https://qbe.demosoftwares.biz/public/js/app.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
        <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

        <script type="text/javascript">
            /*$(function () {
            $(".datepicker").datepicker({ 
            autoclose: true, 
            todayHighlight: true
            }).datepicker('update', new Date());
            });*/
            
            $(function () {
            $('.datepicker').datetimepicker({
                /*inline: false,*/
                format: 'DD/MM/YYYY',
                /*debug:true*/
            });
        });
        </script>
    </body>
</html>
