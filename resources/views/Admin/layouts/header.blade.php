    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <?php 
                   if ($language == 'en') {
                                ?>
                                <a class="navbar-brand" href="<?php echo url( Request::segment(1).'/dashboard') ?>" class="logo"><img src="{{ asset('/admin/images/logo-eng-transparent.png') }}" alt="Logo" /></a>
                            <?php } else { ?>
                                <a class="navbar-brand" href="<?php echo url( Request::segment(1).'/dashboard') ?>" class="logo"><img src="{{ asset('/admin/images/logo-ar-transparent.png') }}" alt="Logo" /></a>
                            <?php } ?>
              
                <!--<a class="navbar-brand" href="<?php //echo url( Request::segment(1).'/dashboard') ?>"><img src="{{ asset('/admin/images/logo.png')}}" alt="Logo"></a>-->
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo url(Request::segment(1).'/dashboard') ?>"> <i class="menu-icon fa fa-dashboard"></i>{{ __('message.Dashboard') }} </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="menu-icon fa fa-product-hunt"></i>{{ __('message.Products') }} </a>
                        <ul class="sub-menu children dropdown-menu">
                            <!-- <li><i class="fa fa-list-ul"></i><a href="<?php //echo url('/administration/product') ?>">All Products</a></li> -->
                       @can('products.create', Auth::user())
                       <li><i class="fa fa-plus-square"></i><a href='{{ url(Request::segment(1)."/createproduct/") }}'>{{ __('message.Add New') }}</a></li>   
                       <li><i class="fa  fa-file-excel-o"></i><a href='{{ url(Request::segment(1)."/importproduct/") }}'>Excel Sheet Import</a></li>   
                       <li><i class="fa fa-plus-square"></i><a href='{{ url(Request::segment(1)."/giftboxprice/") }}'>{{ __('message.Add Gift Box Charges') }}</a></li>
                       <li><i class="fa fa-plus-square"></i><a href='{{ url(Request::segment(1)."/freedelivery/") }}'>{{ __('message.Add Free Delivery Charges') }}</a></li>
                         @endcan
                            <li><i class="fa fa-product-hunt"></i><a  href='{{ url(Request::segment(1)."/allproduct/") }}'>{{ __('message.All Products') }}</a></li>
                        @can('products.create', Auth::user())
                       <li><i class="fa fa-comments"></i><a href='{{ url(Request::segment(1)."/productreviews/") }}'>{{ __('message.Product Reviews') }}</a></li>
                         @endcan
                     
                        </ul>
                    </li>
                      
                     <?php  
//                    $role_title = Auth::user()->job_title;
//                    if($role_title=='admin')
//                     {
                    ?>
                     @can('products.category',Auth::user())
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="menu-icon fa fa-bars"></i>{{ __('message.Category') }}  </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list-ul"></i><a href="<?php echo url(Request::segment(1).'/allmenu') ?>">{{ __('message.All Category') }}</a></li>
                            <?php     
                            $usertype = (Auth::user()->job_title);
                            if($usertype=="superadmin"){
                            ?>
                            <li><i class="fa fa-plus-square"></i><a href="<?php echo url(Request::segment(1).'/menu') ?>">{{ __('message.Add Category') }}</a></li>
                            <?php }?>
                        </ul>
                    </li>
<!--                        <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="menu-icon fa fa-cubes"></i>{{ __('message.Add Pages') }}</a>
                        <ul class="sub-menu children dropdown-menu">
                             <li><i class="fa fa-list-ul"></i><a href="<?php //echo url(Request::segment(1).'/allpages') ?>">{{ __('message.All Pages') }}</a></li> 
                            <li><i class="fa fa-plus-square"></i><a href="<?php //echo url(Request::segment(1).'/createpage') ?>">{{ __('message.Add New Pages') }}</a></li>
                        </ul>
                    </li>-->
                     @endcan
                        @can('products.users',Auth::user())
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="menu-icon fa fa-bars"></i>{{ __('message.Add Layout') }}  </a>
                        <ul class="sub-menu children dropdown-menu">
                             <li><i class="fa fa-plus-square"></i><a href="<?php echo url(Request::segment(1).'/addlayout') ?>">{{ __('message.Add Layout') }}</a></li>
                        </ul>
                    </li>
                         @endcan
                     <?php //}?>
                     @can('products.users',Auth::user())
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="menu-icon fa fa-users"></i>{{ __('message.Vendors') }}</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-users"></i><a href="{{ route('user.index') }}">{{ __('message.All Vendors') }} </a></li>
                            <li><i class="fa fa-user"></i><a href="{{ route('user.create') }}">{{ __('message.Add New Vendor') }}</a></li>
                        </ul>
                    </li>
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="menu-icon fa fa-users"></i>{{ __('message.Customers') }}</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-users"></i><a href="{{ route('customer.index') }}">{{ __('message.All Customers') }}</a></li>
                         </ul> 
                    </li>
                   @endcan
                   @can('products.roles',Auth::user())
                      <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <!--<i class="menu-icon fa fa-list"></i>-->
                            <i class="menu-icon fa fa-tasks"></i>
                            {{ __('message.Roles') }}</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa fa-tasks"></i><a href="{{ route('role.index') }}">{{ __('message.All Roles') }}</a></li>
                            <li><i class="fa fa-plus-square"></i><a href="{{ route('role.create') }}">{{ __('message.Add New Roles') }}</a></li>
                        </ul>
                    </li>
                     @endcan
                     @can('products.permission',Auth::user())
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="menu-icon fa fa-lock"></i>{{ __('message.Permissions') }}</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-lock"></i><a href="{{ route('permission.index') }}">{{ __('message.All Permission') }}</a></li>
                            <li><i class="fa fa-plus-square"></i><a href="{{ route('permission.create') }}">{{ __('message.Add New Permission') }}</a></li>
                        </ul>
                    </li>
                     @endcan
                      @can('products.users',Auth::user())
                        <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon fa fa-image"></i>
                            <!--<i class="menu-icon fa fa-cubes"></i>-->
                            {{ __('message.Banner Slider Products') }}</a>
                        <ul class="sub-menu children dropdown-menu">
                             <li><i class="fa fa-image"></i><a href="<?php echo url('/admin/bannerproduct') ?>">{{ __('message.Banner Slider Products') }}</a></li> 
                            <li><i class="fa fa-plus-square"></i><a href="<?php echo url('/admin/createbannerproduct') ?>">{{ __('message.Add New Banner Slider') }}</a></li>
                        </ul>
                    </li>
                    @endcan
                    
                      <li class="menu-item-has-children dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-shopping-cart"></i>{{ __('message.Orders') }} </a>
                      <ul class="sub-menu children dropdown-menu">
                             <li><i class="fa fa-shopping-cart"></i><a href="<?php echo url(Request::segment(1).'/orders') ?>">{{ __('message.All Orders') }}</a></li> 
                             <li><i class="fa fa-files-o"></i><a href="<?php echo url(Request::segment(1).'/invoice') ?>">{{ __('message.Invoice') }}</a></li> 
                             <li><i class="menu-icon fa fa-line-chart"></i><a href="<?php echo url(Request::segment(1).'/sales') ?>">{{ __('message.Sales') }}</a></li>
                             <li><i class="menu-icon fa fa-check-square-o"></i><a href="<?php echo url(Request::segment(1).'/holdorders') ?>">{{ __('message.Hold Orders') }} </a></li>
                             <li><i class="menu-icon fa fa-check-square-o"></i><a href="<?php echo url(Request::segment(1).'/cancelorders') ?>">{{ __('message.Cancel Orders') }} </a></li>
                             <li><i class="menu-icon fa fa-check-square-o"></i><a href="<?php echo url(Request::segment(1).'/monthilyorders') ?>">{{ __('message.Monthly Reports') }}</a></li>
                             <li><i class="menu-icon fa fa-shopping-cart"></i><a href="<?php echo url(Request::segment(1).'/status') ?>">{{ __('message.Order Tracking') }}</a></li>
                        </ul>
                      </li>
                    <li><a href="<?php echo url(Request::segment(1).'/all-stock') ?>"><i class="menu-icon fa fa-archive"></i> {{ __('message.Stocks') }}</a></li>
                    <!--<li><a href="#"><i class="menu-icon fa fa-users"></i> Users</a></li>-->
                    
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="menu-icon fa fa-percent"></i>{{ __('message.Commission') }}</a>
                        <ul class="sub-menu children dropdown-menu">
                            @can('products.users',Auth::user())
                            <li><i class="menu-icon fa fa-plus-square"></i><a href="<?php echo url(Request::segment(1).'/addvencommission') ?>" >{{ __('message.Add Commission') }}</a></li>
                               @endcan
                            <li><i class="menu-icon fa fa-money"></i><a href="<?php echo url(Request::segment(1).'/vendorcommission') ?>" >{{ __('message.Vendors Commission') }}</a></li>
                            <li><i class="menu-icon fa fa-money"></i><a href="<?php echo url(Request::segment(1).'/productcommission') ?>" >{{ __('message.Product Commission') }}</a></li>
                            <li><i class="menu-icon fa fa-money"></i><a href="<?php echo url(Request::segment(1).'/pendingcommission') ?>" >{{ __('message.Pending Commission') }}</a></li>
                            
<!--                                 <li style="color: white">Currently, This Feature Deactivated </li>-->
                             
                        </ul>
                    </li>
                  
                      
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="menu-icon fa fa-credit-card"></i>{{ __('message.Payment Transaction') }}</a>
                        <ul class="sub-menu children dropdown-menu">
                            @can('products.users',Auth::user())
                            <li><i class="menu-icon fa fa-money"></i><a href="<?php echo url(Request::segment(1).'/venpaymentcommission') ?>" >{{ __('message.Payment Transaction') }}</a></li>
                            @endcan
                            <?php  if($usertype !="superadmin"){ ?>
                            <li><i class="menu-icon fa fa-money"></i><a href="<?php echo url(Request::segment(1).'/amountpayrequest') ?>" >Submit A Request For Pay</a></li>
                            <?php }?>
                        </ul>
                    </li>
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="menu-icon fa fa-usd"></i>Discount Voucher</a>
                        <ul class="sub-menu children dropdown-menu">
                             <li>
                                 <!--<i class="fa fa-list-ul"></i>-->
                                 <i class="fa fa-inr"></i>
                                 <a href="<?php echo url(Request::segment(1).'/discountvoucher') ?>">All Discount</a></li>  
                             <li>
                             <!--<i class="fa fa-list-ul"></i>-->
                             <i class="fa fa-inr"></i>
                             <a href="<?php echo url(Request::segment(1).'/discountvoucheradd') ?>">Add Discount Voucher</a></li>  
                        </ul>
                    </li>
                     @can('products.users',Auth::user())
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="menu-icon fa fa-users"></i>{{ __('message.Subscribers') }}</a>
                        <ul class="sub-menu children dropdown-menu">
                             <li>
                                 <!--<i class="fa fa-list-ul"></i>-->
                                 <i class="fa fa-envelope"></i>
                                 <a href="<?php echo url(Request::segment(1).'/allsubscriber') ?>">{{ __('message.All Subscriber') }}</a></li>  
                        </ul>
                    </li>
                      
                       @endcan
                       <li><a href="<?php echo url(Request::segment(1).'/loginsettings') ?>"><i class="menu-icon fa fa-cogs"></i> Settings</a></li>
                       <?php  
//                    $role_title = Auth::user()->job_title;
//                    if($role_title=='admin')
//                     {
                    ?>
<!--                        <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="menu-icon fa fa-cubes"></i>Add Pages</a>
                        <ul class="sub-menu children dropdown-menu">
                             <li><i class="fa fa-list-ul"></i><a href="<?php //echo url(Request::segment(1).'/allpages') ?>">All Pages</a></li> 
                            <li><i class="fa fa-plus-square"></i><a href="<?php //echo url(Request::segment(1).'/createpage') ?>">Add New Pages</a></li>
                        </ul>
                    </li>-->
                     <?php //}?>
<!--                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="menu-icon fa fa-cubes"></i>Add Blogs</a>
                        <ul class="sub-menu children dropdown-menu">
                            
                      <li><i class="fa fa-list-ul"></i><a  href='{{ url(Request::segment(1)."/allblog/") }}'>All Blogs</a></li>
                       
                         <li><i class="fa fa-plus-square"></i><a href='{{ url(Request::segment(1)."/createblog/") }}'>Add New</a></li>
                        </ul>
                    </li>-->
 
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <select class="language" style="border: none;padding: 0.5rem 0rem;color: #878787;" id="Locale" name="Locale">
                                            <option value="en" >Language</option>
                                            <option value="en" <?php if($language == 'en'){ echo "selected"; } ?> >English</option>
                                            <option value="ar" <?php if($language == 'ar'){ echo "selected"; } ?> >Arabic</option>
                                        </select>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('/admin/images/admin.jpg')}}" alt="User Avatar">
                        </a>

                        <!-- <div class="user-menu dropdown-menu">

                            <a class="nav-link" href="my-profile.html"><i class="fa fa- user"></i>My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="settings.html"><i class="fa fa -cog"></i>Settings</a>

                            <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                        </div> -->
                         <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin/login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('admin/register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}   <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    <!--  <div class="col-sm-5">
                        @component('components.who')

                        @endcomponent
                    </div> -->
                    </div>



                </div>
            </div>
<!-- <ul >
                                        <li>
                                        <select class="language" id="Locale" name="Locale">
                                            <option value="en" >Language</option>
                                            <option value="en" <?php //if($language == 'en'){ echo "selected"; } ?> >English</option>
                                            <option value="ar" <?php //if($language == 'ar'){ echo "selected"; } ?> >Arabic</option>
                                        </select>
                                    </li>
                                        
                                    </ul>-->
        </header><!-- /header -->
        <!-- Header-->
  