<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $homedata[0]['meta_title'];?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $homedata[0]['meta_description'];?>">
    <meta name="keywords" content="<?php echo $homedata[0]['meta_keyword'];?>">

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
     <link rel="stylesheet" type="text/css" href="{{ asset('/assets/range-slider/ion.rangeSlider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/range-slider/ion.rangeSlider.skinNice.css')}}">
<link rel="stylesheet" href="{{ asset('/assets/zoomslider/etalage.css')}}">

</head>

<body>
  <!-- fixed middal menu -->
        <a href="#" class="menuBtn">
            <div class="menuBtnOpen">
                <i class="fa fa-bars"></i>
                <span>Categories</span>
            </div>
            <div class="menuBtnClose">
                <i class="fa fa-close"></i>
                <span>Close</span>
            </div>
        </a>
        <div class="menuSection">
            <div class="menuSectionInner">
                <ul class="row">
               <?php foreach ($getSubCategorycate as $category){?>
                    <li class="">
                        <a href="<?php echo url('index/categoryproduct'); ?>/{{ $category->category_id }}/{{ $category->url }}">
                            <!--<i class="fa fa-laptop"></i>-->
                         {{ $category->category_name }}
                        </a>
                    </li>
               <?php }?>
                    <!-- <li class="col-md-3 col-xs-6">
                        <a href="#">
                            <i class="fa fa-briefcase"></i>
                            Business &amp; Services
                        </a>
                    </li>
                    <li class="col-md-3 col-xs-6">
                        <a href="#">
                            <i class="fa fa-building-o"></i>
                            Real Estate
                        </a>
                    </li>
                    <li class="col-md-3 col-xs-6">
                        <a href="#">
                            <i class="fa fa-building"></i>
                            Construction
                        </a>
                    </li>
                    <li class="col-md-3 col-xs-6">
                        <a href="#">
                            <i class="fa fa-gears"></i>
                            Engineering
                        </a>
                    </li>
                    <li class="col-md-3 col-xs-6">
                        <a href="#">
                            <i class="fa fa-building-o"></i>
                            Malls
                        </a>
                    </li>
                    <li class="col-md-3 col-xs-6">
                        <a href="#">
                            <i class="fa fa-shopping-basket"></i>
                            Food &amp; Beverages
                        </a>
                    </li>
                    <li class="col-md-3 col-xs-6">
                        <a href="#">
                            <i class="fa fa-medkit"></i>
                            Medical
                        </a>
                    </li>
                    <li class="col-md-3 col-xs-6">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            Society &amp; People
                        </a>
                    </li>
                    <li class="col-md-3 col-xs-6">
                        <a href="#">
                            <i class="fa fa-graduation-cap"></i>
                            Education
                        </a>
                    </li>
                    <li class="col-md-3 col-xs-6">
                        <a href="#">
                            <i class="fa fa-desktop"></i>
                            Design &amp; Technology
                        </a>
                    </li>
                    <li class="col-md-3 col-xs-6">
                        <a href="#">
                            <i class="fa fa-plug"></i>
                            Electronics
                        </a>
                    </li>
                    <li class="col-md-3 col-xs-6">
                        <a href="#">
                            <i class="fa fa-cab"></i>
                            Automotive
                        </a>
                    </li> -->
                </ul>
            </div>
        </div> <!-- End of menuSection -->
        <!-- menuOverlay -->
        <div class="menuOverlay"></div>
        <!-- End of menuOverlay -->
    <!-- navigationBar  -->
    <div class="navigationBar">
        <div class="container">
            <nav role="navigation" class="navbar navbar-default">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo url('/'); ?>">
                        <img alt="Etcs-Themes" src="{{ asset('/assets/images/logo.png') }}">
                    </a>
                    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navigationRightSide">
                    <div class="topheader">
                        <form action="" method="get" class="headerSearch">
                            <input type="text" placeholder="Search anything" name="searchproduct" id="searchproduct">
                             <div class="finalResult" id="finalResult" name="finalResult">
                            </div>
<!--                            <button type="submit">
                                <i class="fa fa-search"></i>
                            </button>-->
                        </form>


                        <div class="topheaderLinks">
                             <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a href="{{ url('/shopping-cart') }}">Shopping Cart
                                <span class="badge">
                                    {{ Session::has('cart') ? Session::get('cart')->totalQty :'' }}
                                </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ url('/shopping-cart') }}">Shopping Cart
                                <span class="badge">
                                    {{ Session::has('cart') ? Session::get('cart')->totalQty :'' }}
                                </span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('users.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('users.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    <!--  <div class="col-md-5">
                        @component('components.who')

                        @endcomponent
                    </div> -->

                            
                            <!-- <ul> -->
                              <!--   <li>
                                    <a href="#">
                                        <i class="fa  fa-bell"></i>
                                    </a>
                                </li>
                                <li>
                                     @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif -->
                                   <!--  <a href="<?php //echo url('/index/login'); ?>">
                                        <i class="fa fa-user"></i>
                                    <?php 
                    //  $successful_login = Session::get('successful_login_id');
            //   $successful_login_name = Session::get('successful_login_name');
               //echo $successful_login_name;
                                    ?>
                                    </a> -->
                                <!-- </li> -->
<!--                                <li>
                                    <a href="<?php //echo url('/index/registration'); ?>">
                                        <i class="fa fa-question-circle"></i>
                                    </a>
                                </li>-->
<!--                                 <li class="cartDropdown dropdown">
                                        <a href="#" class="mycarthead" data-toggle="modal" data-target="#mycart-modal">
                                            <i class="fa fa-shopping-cart"><span>2</span></i>
                                        </a>

                                    </li>-->
                      
                            <!-- </ul> -->
                        </div>

                    </div>

                </div>

            </nav>
        </div>
        <div class="navbar-center">
            <div class="container">
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <!-- <li class="active">
                            <a href="index.html"><span class="icon-wordpress"></span> <p>WordPress Themes</p>
                            </a>
                        </li> -->
                        <li class="dropdown">
                      <!--   <a href="<?php //echo url('index/wordpress'); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> -->
                     
                            <a href="<?php echo url('index/wordpress'); ?>"><span class="wordpress-icon"></span>
                                <p>WordPress</p>
                                <i class="fa fa-angle-down"></i>
                            </a>
                        
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                               <?php foreach ($getSubCategoryWordpress as $maincat){?>
                                <li>
                                    <a href="<?php echo url('index/categoryproduct'); ?>/{{ $maincat->category_id }}/{{ $maincat->url }}">{{ $maincat->category_name }}</a>
                                </li>
                               <?php }?>
                               <!--  <li>
                                    <a href="#">Featured Items</a>
                                </li>
                                <li>
                                    <a href="#">Business & Services</a>
                                </li>
                                <li>
                                    <a href="#">Real Estate</a>
                                </li>
                                <li>
                                    <a href="#">Design & Photography</a>
                                </li>
                                <li>
                                    <a href="#">Cars & Motorcycles</a>
                                </li>
                                <li>
                                    <a href="#">Medical</a>
                                </li>
                                <li>
                                    <a href="#">Food & Restaurant</a>
                                </li>
                                <li>
                                    <a href="#">Magazine & News</a>
                                </li>
                                <li>
                                    <a href="#">IT & Software</a>
                                </li>
                                <li>
                                    <a href="#">Construction</a>
                                </li>
                                <li>
                                    <a href="#">Fashion</a>
                                </li> -->

                            </ul>

                        </li>

                        <li class="dropdown">
                        <!-- <a href="<?php //echo url('index/website/?category=website'); ?>"> -->
                            <a href="<?php echo url('index/website'); ?>"><span class="html5-icon"></span>
                                <p>Website
                                </p>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                   <?php foreach ($getSubCategoryWebsite as $website){ ?>
                                <li>
                                    <a href="<?php echo url('index/categoryproduct'); ?>/{{ $website->category_id }}/{{ $website->url }}"> {{ $website->category_name }}</a>
                                </li>
                                  <?php  } ?>
                               <!--  <li>
                                    <a href="#">Featured Items</a>
                                </li>
                                <li>
                                    <a href="#">Business & Services</a>
                                </li>
                                <li>
                                    <a href="#">Real Estate</a>
                                </li>
                                <li>
                                    <a href="#">Design & Photography</a>
                                </li>
                                <li>
                                    <a href="#">Cars & Motorcycles</a>
                                </li>
                                <li>
                                    <a href="#">Medical</a>
                                </li>
                                <li>
                                    <a href="#">Food & Restaurant</a>
                                </li>
                                <li>
                                    <a href="#">Magazine & News</a>
                                </li>
                                <li>
                                    <a href="#">IT & Software</a>
                                </li>
                                <li>
                                    <a href="#">Construction</a>
                                </li>
                                <li>
                                    <a href="#">Fashion</a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo url('index/woocommerce'); ?>"><span class="woo-commerce-icon"></span>
                                <p>WooCommerce
                                </p>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                             <?php foreach ($getSubCategorywoocomer as $woocomer){?>
                                <li>
                                    <a href="<?php echo url('index/categoryproduct'); ?>/{{ $woocomer->category_id }}/{{ $woocomer->url }}">{{ $woocomer->category_name }}</a>
                                </li>
                             <?php } ?>
                               <!--  <li>
                                    <a href="#">Featured Items</a>
                                </li>

                                <li>
                                    <a href="#">Real Estate</a>
                                </li>
                                <li>
                                    <a href="#">Design & Photography</a>
                                </li>
                                <li>
                                    <a href="#">Cars & Motorcycles</a>
                                </li>

                                <li>
                                    <a href="#">Food & Restaurant</a>
                                </li>

                                <li>
                                    <a href="#">IT & Software</a>
                                </li>
                                <li>
                                    <a href="#">Construction</a>
                                </li> -->

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo url('index/prestashop'); ?>" ><span class="prestaShop-icon"></span>
                                <p>PrestaShop
                                </p>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <?php foreach ($getSubCategorypresta as $presta){?>
                                <li>
                                    <a href="<?php echo url('index/categoryproduct'); ?>/{{ $presta->category_id }}/{{ $presta->url }}">{{ $presta->category_name }}</a>
                                </li>
                                 <?php } ?>
                               <!--  <li>
                                    <a href="#">Featured Items</a>
                                </li>

                                <li>
                                    <a href="#">Real Estate</a>
                                </li>
                                <li>
                                    <a href="#">Design & Photography</a>
                                </li>
                                <li>
                                    <a href="#">Cars & Motorcycles</a>
                                </li>

                                <li>
                                    <a href="#">Food & Restaurant</a>
                                </li>

                                <li>
                                    <a href="#">IT & Software</a>
                                </li>
                                <li>
                                    <a href="#">Construction</a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo url('index/magento'); ?>" ><span class="magantoStore-icon"></span>
                                <p>Magento
                                </p>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                               <?php foreach ($getSubCategorymagento as $magento){?>
                                <li>
                                    <a href="<?php echo url('index/categoryproduct'); ?>/{{ $magento->category_id }}/{{ $magento->url }}">{{ $magento->category_name }}</a>
                                </li>
                               <?php }?>
                                <!-- <li>
                                    <a href="#">Featured Items</a>
                                </li>

                                <li>
                                    <a href="#">Real Estate</a>
                                </li>
                                <li>
                                    <a href="#">Design & Photography</a>
                                </li>
                                <li>
                                    <a href="#">Cars & Motorcycles</a>
                                </li>

                                <li>
                                    <a href="#">Food & Restaurant</a>
                                </li>

                                <li>
                                    <a href="#">IT & Software</a>
                                </li>
                                <li>
                                    <a href="#">Construction</a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo url('index/opencart'); ?>"><span class="opencart-icon"></span>
                                <p>Opencart
                                </p>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <?php foreach ($getSubCategoryjoomala as $joomala){?>
                                <li>
                                    <a href="<?php echo url('index/categoryproduct'); ?>/{{ $joomala->category_id }}/{{ $joomala->url }}">{{ $joomala->category_name }}</a>
                                </li>
                        <?php }?>
                               <!--  <li>
                                    <a href="#">Featured Items</a>
                                </li>

                                <li>
                                    <a href="#">Real Estate</a>
                                </li>
                                <li>
                                    <a href="#">Design & Photography</a>
                                </li>
                                <li>
                                    <a href="#">Cars & Motorcycles</a>
                                </li>

                                <li>
                                    <a href="#">Food & Restaurant</a>
                                </li>

                                <li>
                                    <a href="#">IT & Software</a>
                                </li>
                                <li>
                                    <a href="#">Construction</a>
                                </li> -->
                            </ul>
                        </li>

                        <!--<li class="dropdown">-->
<!--                            <a href="<?php //echo url('index/categories'); ?>" >
                                <span class="categories-icon"></span><p>Categories</p>
                                <i class="fa fa-angle-down"></i>
                            </a>-->
                            <!--<ul class="dropdown-menu navDropdownMenu" aria-labelledby="dropdownMenu3">-->
                            <?php //foreach ($getSubCategorycate as $category){?>
<!--                                <li>
                                    <a href="<?php //echo url('index/categoryproduct'); ?>/{{ $category->category_id }}/{{ $category->url }}">{{ $category->category_name }}</a>
                                </li>-->
                            <?php //}?>
                     
                            <!--</ul>-->
                        <!--</li>-->
                   <!--      <li class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="categories-icon"></span><p>Php</p>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu navDropdownMenu" aria-labelledby="dropdownMenu3">
                                <li>
                                    <a href="#">Codeigniter</a>
                                </li>
                                <li>
                                    <a href="#">Laravel</a>
                                </li>
                                
                                
                            </ul>
                        </li> -->

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End of navigationBar -->