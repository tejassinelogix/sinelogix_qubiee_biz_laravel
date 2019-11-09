

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
                                              <th>Wallets Details</th>
                                               <th>Transaction Type</th>
                                              <th>Date of Transaction</th>
                             
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php 
                                      
                                          $cntr = 0;
                                           foreach( $getuserwallets as $wallets){  $cntr++;?>
                                        <tr>
                                            <td class="srNo"><center><?php echo $cntr; ?></center></td>
                                         <td>
                                               <?php 
                                                   ?>
                                                    <center>
                                                        {{ $wallets->wallets_amount }}
                                                        
                                                      </center>  
                                             
                                            </td>
                                        <td><center><?php  echo $wallets->tr_type; ?></center></td>
                                            <td><center><?php $datetime=$wallets->created_at ; echo date("d-m-Y",strtotime($datetime)); ?></center></td>
                                        </tr>
                                         
                                            <?php  
                                                 }   
                                                ?>
                                            <tr>
                                                 <th>Total</th>
                                                   <td><center><?php echo $total_wallet; ?><center></td>
                                                    </tr>

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
                <p><b>Welcome, {{ Auth::user()->name }}</b></p>
                <li><a href="#"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> </li>
                <li>Wallet</li>
            </ul>
        </div>
        <div class="space10"></div>
        <div class="row">
            @include('user-sidebar')
            <div class="col-md-10 col-sm-10">
                <h3 class="headingFull"><span>My Profile</span></h3>
                <div class="addressShippingSelect">
                    <table class="OrderTable table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                              <th>Wallets Details</th>
                                               <th>Transaction Type</th>
                                              <th>Date of Transaction</th>
                             
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php 
                                      
                                          $cntr = 0;
                                           foreach( $getuserwallets as $wallets){  $cntr++;?>
                                        <tr>
                                            <td class="srNo"><center><?php echo $cntr; ?></center></td>
                                         <td>
                                               <?php 
                                                   ?>
                                                    <center>
                                                        {{ $wallets->wallets_amount }}
                                                        
                                                      </center>  
                                             
                                            </td>
                                        <td><center><?php  echo $wallets->tr_type; ?></center></td>
                                            <td><center><?php $datetime=$wallets->created_at ; echo date("d-m-Y",strtotime($datetime)); ?></center></td>
                                        </tr>
                                         
                                            <?php  
                                                 }   
                                                ?>
                                            <tr>
                                                 <th>Total</th>
                                                   <td><center><?php echo $total_wallet; ?><center></td>
                                                    </tr>

                                    </tbody>
                                </table>
                </div>
            </div>
        </div>
    </div>
</div>