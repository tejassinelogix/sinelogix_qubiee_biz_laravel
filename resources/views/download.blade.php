
<!-- MyAccount -->
<!--<div class="MyAccountWrapper"></div>
<div class="MyAccount">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p><b>Welcome, {{ Auth::user()->name }}</b></p>
                <h4 class="Account-heading">Downloads</h4>
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
                        <div class="col-sm-12">
                            <table class="OrderTable table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Purchase Product</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php
                                    $cntr = 0;
                                    foreach ($productdownload as $productd) {
                                        $cntr++;
                                        ?>
                                        <tr>
                                            <td class="srNo"><?php echo $cntr; ?></td>
                                            <td>
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        {{ $productd->product_name }} 
                                                    </li>
                                                </ul>
                                            </td>
                                            <td> <a href="public/images/product_zip/{{ $productd->products_link }}" download="{{ $productd->products_link }}"><button type="button" class=" btn btn-primary"> <i class="glyphicon glyphicon-download"> Download</i></button></a></td>

                                        </tr>

                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>

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
                <li><a href="#"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> </li>
                <li>My Account</li>
            </ul>
        </div>
        <div class="space10"></div>
        <div class="row">
            @include('user-sidebar')
            <div class="col-md-10 col-sm-10">
                <h3 class="headingFull"><span>Dashboard</span></h3>
                <div class="addressShippingSelect">
                    <table class="OrderTable table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Purchase Product</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php
                            $cntr = 0;
                            foreach ($productdownload as $productd) {
                                $cntr++;
                                ?>
                                <tr>
                                    <td class="srNo"><?php echo $cntr; ?></td>
                                    <td>
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                {{ $productd->product_name }} 
                                            </li>
                                        </ul>
                                    </td>
                                    <td> <a href="public/images/product_zip/{{ $productd->products_link }}" download="{{ $productd->products_link }}"><button type="button" class=" btn btn-primary"> <i class="glyphicon glyphicon-download"> Download</i></button></a></td>

                                </tr>
<?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>