
<!-- MyAccount -->
<!--<div class="MyAccountWrapper"></div>
<div class="MyAccount">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p><b>Welcome, {{ Auth::user()->name }}</b></p>
                <h4 class="Account-heading">My Account</h4>
            </div>
            <div class="col-sm-3">
                <div class="">
                    <ul class="MyAccountList nav nav-tabs">
                        <li>
                            <a href="{{ url('/profile') }}">Profile</a>
                            <i class="fa fa-chevron-right"></i>
                        </li>
                        <li>
                            <a href="{{ url('/order') }}">Order History</a>
                            <i class="fa fa-chevron-right"></i>
                        </li>
                           <li>
                            <a href="{{ url('/wallet') }}">Wallet</a>
                            <i class="fa fa-chevron-right"></i>
                            </li>
                        <li>
                            <a href="{{ url('/download') }}">Downloads</a>
                            <i class="fa fa-chevron-right"></i>
                        </li>

                        <li>
                            <a href="{{ url('/setting') }}">Settings</a>
                            <i class="fa fa-chevron-right"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="AccountBoxWrapper">
                    <div class="row">
                        <div class="col-sm-6">
                            <a class="AccountBox" href="{{ url('/profile') }}">
                                <span>
                                    <img src="assets/images/resume.png" />
                                </span>
                                <p>Profile</p>
                                <span class="text-desc">Edit Details</span>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="AccountBox" href="{{ url('/order') }}">
                                <span>
                                    <img src="assets/images/order.png" />
                                </span>
                                <p>My Order</p>
                                <span class="text-desc">Check Your Order here</span>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="AccountBox" href="{{ url('/download') }}">
                                <span>
                                    <img src="assets/images/purse.png   " />
                                </span>
                                <p>Downloads</p>
                                <span class="text-desc"> Downloads</span>

                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="AccountBox" href="{{ url('/setting') }}">
                                <span>
                                    <img src="assets/images/api.png" />
                                </span>
                                <p>Settings</p>
                                <span class="text-desc"> Settings</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!-- End MyAccount -->


<div class="innerPageSection">
    <div class="containerWrapper">
        <div class="breadcrumbs">
            <ul>
                <li><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> </li>
                <li>{{ __('message.My Account') }}</li>
            </ul>
        </div>
        <div class="space10"></div>
        <div class="row">
            @include('user-sidebar')
            <div class="col-md-10 col-sm-10">
                <h3 class="headingFull"><span>{{ __('message.Dashboard') }}</span></h3>
                <div class="addressShippingSelect">
                   <div class="AccountBoxWrapper">
                    <div class="row">
                        <div class="col-sm-6">
                            <a class="AccountBox" href="{{ url('/profile') }}">
                                <span>
                                    <img src="assets/images/resume.png" />
                                </span>
                                <p>{{ __('message.Profile') }}</p>
                                <span class="text-desc">Edit Details</span>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="AccountBox" href="{{ url('/order') }}">
                                <span>
                                    <img src="assets/images/order.png" />
                                </span>
                                <p>{{ __('message.My Orders') }}</p>
                                <span class="text-desc">Check Your Order here</span>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="AccountBox" href="{{ url('/user-address') }}">
                                <span>
                                    <img src="assets/images/purse.png   " />
                                </span>
                                <p>{{ __('message.Address') }}</p>
                                <span class="text-desc"> {{ __('message.Address') }}</span>

                            </a>
                        </div>
<!--                        <div class="col-sm-6">
                            <a class="AccountBox" href="{{ url('/download') }}">
                                <span>
                                    <img src="assets/images/purse.png   " />
                                </span>
                                <p>Downloads</p>
                                <span class="text-desc"> Downloads</span>

                            </a>
                        </div>-->
                        <div class="col-sm-6">
                            <a class="AccountBox" href="{{ url('/setting') }}">
                                <span>
                                    <img src="assets/images/api.png" />
                                </span>
                                <p>{{ __('message.Settings') }}</p>
                                <span class="text-desc"> {{ __('message.Settings') }}</span>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="AccountBox" href="{{ url('/user-wishlist') }}">
                                <span>
                                    <img src="assets/images/api.png" />
                                </span>
                                <p>{{ __('message.My Wishlist') }}</p>
                                <span class="text-desc"> {{ __('message.My Wishlist') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
           
                </div>
            </div>
        </div>
    </div>
</div>
