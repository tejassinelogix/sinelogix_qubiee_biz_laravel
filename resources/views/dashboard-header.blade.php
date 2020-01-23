<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta charset="utf-8">
        <!--<meta name="referrer" content="origin">-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php
            if (isset($homedata[0]['meta_title'])) {
                $homadatatitle = json_decode($homedata[0]['meta_title'], true);
                echo $homadatatitle[$language];
            } else {
                echo "Home";
            }
            ?></title>
        <meta name="description" content="<?php
        if (isset($homedata[0]['meta_description'])) {
            $homametadescription = json_decode($homedata[0]['meta_description'], true);
            echo $homametadescription[$language];
        } else {
            echo "Home";
        }
        ?>">
        <meta name="keywords" content="<?php
        if (isset($homedata[0]['meta_keyword'])) {
            $homamemetakeyword = json_decode($homedata[0]['meta_keyword'], true);
            echo $homamemetakeyword[$language];
        } else {
            echo "Home";
        }
        ?>">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <?php
        if (isset($homedata[0]['url'])) {
            if ($homedata[0]['url'] == 'home') {
                ?>
                <link rel="canonical" href="<?php echo url('/'); ?>" />
            <?php } else { ?>
                <link rel="canonical" href="<?php echo url('/'); ?>/<?php echo $homedata[0]['url']; ?>" />
                <?php
            }
        } else {
            ?>
            <link rel="canonical" href="<?php echo url('/'); ?>/home" />
        <?php }
        ?>

        <!-- Latest compiled and minified CSS -->

        <!-- Favicons-->
        <link rel="shortcut icon" href="{{ URL::to('public/assets/images/icon.png') }}" type="image/x-icon"/>

        <!-- Bootstrap -->
        <link href="{{ URL::to('public/assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <!--style-->
        <link href="{{ URL::to('public/assets/css/normalize.css') }}" rel="stylesheet">
        <link href="{{ URL::to('public/assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ URL::to('public/assets/css/custom_style.css') }}" rel="stylesheet">
        <link href="{{ URL::to('public/assets/css/starratings.css') }}" rel="stylesheet">

        <!-- Fancybox CSS -->
        <link href="{{ URL::to('public/assets/fancybox/jquery.fancybox.css?v=2.1.4') }}" rel="stylesheet" />

        <!--Font-Awesome-->
        <link rel="stylesheet" href="{{ URL::to('public/assets/font-awesome/css/font-awesome.min.css') }}">

        <!--Animate.css-->
        <link rel="stylesheet" href="{{ URL::to('public/assets/animatecss/animate.css') }}">

        <!-- Flexslider CSS -->
        <link href="{{ URL::to('public/assets/flexslider/flexslider.css') }}" rel="stylesheet" />

        <!-- Owl Carousel Assets -->
        <link href="{{ URL::to('public/assets/owl/owl.carousel.css') }}" rel="stylesheet">
        <link href="{{ URL::to('public/assets/owl/owl.theme.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ URL::to('public/assets/owl/owl.transitions.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,800|Fahkwang:400,600|Tajawal:400,700" rel="stylesheet">
        <!-- range-slider -->
        <link rel="stylesheet" type="text/css" href="{{ URL::to('public/assets/range-slider/ion.rangeSlider.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::to('public/assets/range-slider/ion.rangeSlider.skinNice.css') }}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/cupertino/jquery-ui.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">

        <link href="{{ URL::to('public/assets/css/pretty-checkbox.min.css') }}" rel="stylesheet">
        <!--<link rel="stylesheet" href="{{ URL::to('public/assets/css/materialdesignicons.min.css') }}">-->

        <link type="text/css" href="https://uicdn.toast.com/tui-color-picker/v2.2.0/tui-color-picker.css" rel="stylesheet">
        <link type="text/css" href="{{ URL::to('public/assets/dist/tui-image-editor.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="{{ URL::to('public/assets/css/sweetalert.min.css') }}" />
        <script src="{{ URL::to('public/assets/js/sweetalert.min.js') }}"></script>
        <link href="{{ URL::to('public/assets/rate/star-rating.css') }}" rel="stylesheet">
        <script>
            function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            //            $('#blah').attr('src', e.target.result);
            $('#blah').html('<p>Image Uploaded </p>');
            };

            reader.readAsDataURL(input.files[0]);
            }
            }
            function AddToCarts(){
                document.getElementById('loaders').style.display="block";
            }
                    
        </script>
        <style type="text/css">
            .ajax-load{
                background: #e1e1e1;
                padding: 10px 0px;
                width: 100%;
            }
            .swal-footer{
                text-align: center;
            }
        </style>

        <!--google fonts-->
        <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,800|Playfair+Display:400,900" rel="stylesheet"> -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,800" rel="stylesheet"> -->

        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->

        @yield('styles')
    </head>
    <?php
    if (Session::has('locale')) {
        $language = $this->language = Session::get('locale');
    } else {
        $language = $this->language = app()->getLocale();
    }
    ?>
    <body class="<?php echo $language . 'language'; ?>  <?php echo $layoutclass_name ?>" style="background-color: <?php echo $background_color; ?>">
        <div id="loaders" class="overlay">
            <span id="loaders-c"></span>
        </div>
        @include('sweet_alert.alert')

        <!-- @if(Session::has('qty_message')) -->
            <!--<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('qty_message') }}</p>-->
        <!-- @endif -->
        <!-- navigationBar -->
        <div class="navigationBar">
            <div class="topHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="navigTop">
                                <div class="pull-left">
                                    <p>{{ __('message.Cash On Delivery') }} <span>|</span> {{ __('message.Free Returns') }}</p>
                                </div>
                                <div class="pull-right sellwithUsTopBtn">
                                    <a href="<?php echo url('/'); ?>/contact">{{ __('message.Sell with Us') }} <i class="fa fa-arrow-circle-right"></i></a>
                                    <!--<a href="mailto:sales@qubiee.com" >{{ __('message.Sell with Us') }} <i class="fa fa-arrow-circle-right"></i></a>-->
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('email'))
                        <span style="color:red" class="invalid-feedback" role="alert">
                            <strong>Invalid credentials. Please enter valid email or Password</strong>
                        </span>
                        @endif
                        @if ($errors->has('password'))
                        <span style="color:red" class="invalid-feedback" role="alert">
                            <strong>Invalid credentials. Please enter valid email or Password</strong>
                        </span>
                        @endif
                        <div class="col-md-3 col-sm-3">
                            <?php
                            if (Session::has('locale')) {
                                $language = $this->language = Session::get('locale');
                            } else {
                                $language = $this->language = app()->getLocale();
                            }
                            if ($language == 'en') {
                                ?>
                                <a href="{{ url('/') }}" class="logo"><img src="{{ URL::to('public/assets/images/logo.png') }}" alt="" /></a>
                            <?php } else { ?>
                                <a href="{{ url('/') }}" class="logo"><img src="{{ URL::to('public/assets/images/logo.png') }}" alt="" /></a>
                            <?php } ?>


                        </div>
                        <div class="col-sm-4 searchboxCol">
                            <div class="searchbox">
                                <form action="<?php echo url('/search') ?>" method="POST" class="headerSearch">
                                    {{ csrf_field() }}
                                    <input type="text" placeholder="{{ __('message.Search') }}" name="searchproduct" id="searchproduct"><button type="submit"  class="searchproduct"><i class="fa fa-search"></i></button>
                                    <div class="finalResult" id="finalResult" name="finalResult">
                                    </div>
                                </form>
<!--                            <input type="text" placeholder="Search for Products">
<button><i class="fa fa-search"></i></button>-->
                            </div>
                        </div>
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
                        <div class="col-sm-5 mycartCol">
                            <div class="mycartContainer">
                                <div class="myAccount">
                                    <ul class="nav navbar-nav navbar-right">
                                        <?php
                                        //$language = app()->getLocale();
                                        // echo $lang;
                                        ?>
                                        <li>
                                            <label class="selectLabel" for="Locale">
                                                <i class="fa fa-angle-down"></i>
                                                <select class="language" id="Locale" name="Locale" data-width="fit">
                                                    <option value="en" >Language</option>
                                                    <option value="en" <?php
                                                    if ($language == 'en') {
                                                        echo "selected";
                                                    }
                                                    ?> >English</option>
                                                    <option value="ar" <?php
                                                    if ($language == 'ar') {
                                                        echo "selected";
                                                    }
                                                    ?> >Arabic</option>
                                                </select>
                                            </label>
                                        </li>

                                        @guest
                                        <!--                                        <li><a href="{{ route('login') }}">{{ __('message.Login') }}</a></li>-->
                                        <li><a href="#" data-toggle="modal" data-target="#userLoginModal">{{ __('message.Login') }}</a>
                                        </li>
                                        @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}">{{ __('message.Register') }}</a></li>
                                        @endif
                                        @else
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ url('/dashboard') }}">{{ __('message.My Account') }}</a></li>
                                                <li><a href="{{ url('/order') }}">{{ __('message.My Order') }}</a></li>
                                                <!--<li><a href="{{ url('/wallet') }}">{{ __('message.Wallet') }}</a></li>-->
                                                <!--                                    <li><a href="#">Return & Refund</a></li>-->
                                                <li><a class="dropdown-item" href="{{ route('users.logout') }}"
                                                       onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                                        {{ __('message.Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('users.logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                        @endguest
                                        <?php if (Auth::user()) { ?>
                                            <li><a href="{{ url('/user-wishlist') }}"><i class="fa fa-heart"></i>
                                                    {{ __('message.Wishlist') }}
                                                </a></li>
                                        <?php } else { ?>
                                            <li><li><a href="#" data-toggle="modal" data-target="#userLoginModal">{{ __('message.Wishlist') }}</a></li>

                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="mycartbox">
                                    <div class="mycarthead"><i class="fa fa-shopping-cart"></i>{{ __('message.shopping cart') }}<i class="fa fa-angle-down"></i>
                                        @if(Session::has('cart'))
                                        <span>
                                            {{ Session::has('cart') ? Session::get('cart')->totalQty :'' }}
                                        </span>
                                        @endif
                                        <ul>
                                            @if(Session::has('cart'))
                                            <?php $cart = Session::get('cart'); ?>
                                            <div class="empty-cartmsg">
                                                <p>{{ __('message.Cart Items') }}<br></p>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Item Name</th>
                                                            <th>Quantity</th>
                                                            <th>Price ($)</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
//print_r($product['item']['product_name']);
//  $pro_name = json_decode($product['item']['product_name'], true);
                                                    ?>
                                                    <tbody>
                                                        <?php if ($cart->items) { ?>
                                                            @foreach($cart->items as $product)
                                                            <tr>
                                                                <td><strong><a href="<?php echo url('/productdetails'); ?>/{{$product['item']['url'] }}"><?php echo $product['item']['product_name'][$language]; ?></a></strong></span>
                                                                <td><span class="badge">{{ $product['qty'] }}</span></td>
                                                                <td><span class="label label-success">$ {{ $product['item']['product_price'] }}</span></td>
                                                            </tr>
                                                            @endforeach
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <p>
                                                    <strong style="margin-right: 10px; ">
                                                        {{ __('message.Delivery Charges') }}: <?php $dilverychargeitem=0; if($cart->dilverycharge==0){?>{{ __('message.Free') }}<?php }else{?>$<?php echo $dilverychargeitem=abs($cart->dilverycharge); } ?>
                                                    </strong>
                                                    <strong style="margin-right: 10px; ">
                                                        {{ __('message.Total') }} : $ {{ $cart->totalPrice+$dilverychargeitem }}
                                                    </strong>
                                                    <a href="{{ url('/shopping-cart') }}">{{ __('message.shopping cart') }}</a>
                                                </p>
                                            </div>
                                            @else
                                            <div class="empty-cartmsg">
                                                <p>{{ __('message.Your Shopping Cart is empty') }} <br> <a href="<?php echo url('/'); ?>">{{ __('message.Start shopping now') }}!</a></p>
                                            </div>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navigationBarContent">
                <div class="containerWrapper">
                    <nav role="navigation" class="navbar navbar-default">
                        <div class="navbar-header">
                            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="navbarCollapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li>
                                    <!--<a href="/<?php //echo "allcategories"   ?>">-->
                                    <a>
                                        <i class="fa fa-bars"></i>
                                    </a>
                                    <ul>
                                        <?php
                                        foreach ($getMainCategory as $getMainCatego) {
                                            if(!$getMainCatego->is_visible)
                                            continue;

                                            $cat_name = json_decode($getMainCatego->category_name, true);
                                            ?>
                                            <li>
                                                <a href="/<?php echo $getMainCatego->url; ?>">
                                                    <!--<span> <img src="https://xtacky.com/public/images/<?php //echo $getMainCatego->category_image;              ?>" height="21px" width="31px" ></span>-->
                                                    <!--<i class="fa fa-bars"></i>-->
                                                    <?php //echo $getMainCatego->category_name;   ?>
                                                    <?php echo $cat_name[$language]; ?>
                                                    <!--<i class="fa fa-angle-down"></i>-->
                                                </a>
                                                <ul>

                                                    <?php
                                                    foreach ($getSubCategory as $maincat) {
                                                        $lang_typea = explode(',', $getMainCatego->category_id);
                                                        $lang_invitee = explode(',', $maincat->category_parent_id);
                                                        if (in_array("$lang_typea[0]", $lang_invitee)) {
                                                            $sub_cat_name = json_decode($maincat->category_name, true);
                                                            $urlcat_name = str_replace(' ', '-', $sub_cat_name);
                                                            ?>
                                                            <li>
                                                                <a href="<?php echo url('/categoryproduct'); ?>/{{ $urlcat_name[$language] }}/{{ $maincat->category_id }}"><?php echo $sub_cat_name[$language]; ?></a>

																<ul>
                                                                    <?php
                                                                    foreach ($getSubCategory as $key => $mainsubsumenu) {
                                                                        if ($maincat->category_id == $mainsubsumenu->category_parent_id) {
                                                                            ?>
                                                                            <?php
                                                                            //foreach ($getSubCategory as $key => $mainsubsumenu) {
                                                                            if ($maincat->category_id == $mainsubsumenu->category_parent_id) {
                                                                                $subSubCatName = json_decode($mainsubsumenu->category_name, true);
                                                                                ?>
                                                                                <li>
                                                                                    <a href="<?php echo url('/categoryproduct'); ?>/{{ $mainsubsumenu->url }}/{{ $mainsubsumenu->category_id }}"><?php echo strtoupper($subSubCatName[$language]); ?></a>
                                                                                </li>
                                                                                <?php
                                                                            }
                                                                            //}
                                                                            ?>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </ul>

                                                            </li>
                                                            <?php
                                                        }
                                                    }
                                                    ?>                                                                                </ul>
                                            </li>
                                        <?php } ?>
                                    </ul>

                                </li>
                                <?php
//echo "<pre>";
//print_r($getMainCategory);
//echo $getMainCategory[0]->category_name[$language];
                                foreach ($getMainCategory as $getMainCatego) {
                                    if(!$getMainCatego->is_visible)
                                        continue;
                                    $cat_name = json_decode($getMainCatego->category_name, true);
                                    ?>
                                    <li>
                                        <a href="/<?php echo $getMainCatego->url; ?>">
                                            <!--<span> <img src="https://xtacky.com/public/images/<?php //echo $getMainCatego->category_image;              ?>" height="21px" width="31px" ></span>-->
                                            <!--<i class="fa fa-bars"></i>-->
                                            <?php //echo $getMainCatego->category_name;   ?>
                                            <?php echo $cat_name[$language]; ?>
                                            <!--<i class="fa fa-angle-down"></i>-->
                                        </a>
                                        <ul>
                                            <?php
                                            foreach ($getSubCategory as $maincat) {
                                                $lang_typea = explode(',', $getMainCatego->category_id);
                                                $lang_invitee = explode(',', $maincat->category_parent_id);
                                                if (in_array("$lang_typea[0]", $lang_invitee)) {
                                                    $sub_cat_name = json_decode($maincat->category_name, true);
                                                    $urlcat_name = str_replace(' ', '-', $sub_cat_name);
                                                    ?>
                                                    <li>
                                                        <a href="<?php echo url('/categoryproduct'); ?>/{{ $urlcat_name[$language] }}/{{ $maincat->category_id }}"><?php echo $sub_cat_name[$language]; ?></a>
                                                        <ul>
                                                            <?php
                                                            foreach ($getSubCategory as $key => $mainsubsumenu) {
                                                                if ($maincat->category_id == $mainsubsumenu->category_parent_id) {
                                                                    ?>
                                                                    <?php
                                                                    //foreach ($getSubCategory as $key => $mainsubsumenu) {
                                                                    if ($maincat->category_id == $mainsubsumenu->category_parent_id) {
                                                                        $subSubCatName = json_decode($mainsubsumenu->category_name, true);
                                                                        ?>
                                                                        <li>
                                                                            <a href="<?php echo url('/categoryproduct'); ?>/{{ $mainsubsumenu->url }}/{{ $mainsubsumenu->category_id }}"><?php echo strtoupper($subSubCatName[$language]); ?></a>
                                                                        </li>
                                                                        <?php
                                                                    }
                                                                    //}
                                                                    ?>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>                                                                                </ul>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </nav>
                </div><!-- navigationBarContent -->
            </div>
        </div><!-- End of navigationBar -->
