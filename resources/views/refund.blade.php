@extends('dashboard-header')
<!-- MyAccount -->
<div class="MyAccountWrapper"></div>
<div class="MyAccount">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p><b>Welcome, {{ Auth::user()->name }}</b></p>
                <h4 class="Account-heading">Returns & Refund</h4>
            </div>
            <div class="col-sm-3">
                <div class="">
                    <ul class="MyAccountList nav nav-tabs">
                        <!--                                <li class="">
                                                            <a href="{{ url('/myAccount') }}">My Account</a>
                                                            <i class="fa fa-chevron-right"></i>
                                                        </li>-->
                        <li>
                            <a href="{{ url('/profile') }}">Profile</a>
                            <i class="fa fa-chevron-right"></i>
                        </li>
                        <li>
                            <a href="{{ url('/order') }}">Order History</a>
                            <i class="fa fa-chevron-right"></i>
                        </li>
<!--                        <li>
                            <a href="{{ url('/refund') }}">Returns & Refund</a>
                            <i class="fa fa-chevron-right"></i>
                        </li>-->
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
                        <div class="col-sm-12">
                            <p>We dont share your personal details woth anyone. Find out more in our
                                <a href="#">Privacy Policy</a>.
                            </p>
                            <p>orem ipsum dolor sit amet, consectetur adipiscing elit. Quisque fermentum
                                turpis eu vulputate blandit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End MyAccount -->

@extends('dashboard-footer')