@extends('Admin.layouts.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('main-content')
        <!-- All Product -->
       <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>{{ __('message.All Orders') }}</h1>
                </div>
            </div>
        </div>
         @if (\Session::has('errormeesag'))
                                    <div class="alert alert-danger">
                                        <ul>
                                            <li>{!! \Session::get('errormeesag') !!}</li>
                                        </ul>
                                    </div>
                                    @endif
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">{{ __('message.Dashboard') }}</a></li>
                        <li class="active">{{ __('message.All Orders') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
        <form name="all_orders" id="all_orders" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">{{ __('message.All Orders') }}</strong>
                        </div>
                                          <div align="center">
                         <?php 
                        // if( $usertype == 'superadmin') { ?>
                         <!--<a href="../admin/exportAllOrderExcel/" class="btn btn-success">Export to Excel</a>-->
                            <?php //} else{ ?>
                         
                           <!--<a href="../admin/exportOrderExcel/{{$vendorId}}" class="btn btn-success">Export to Excel</a>-->
                                            <?php //?>
   
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    <th><input type="checkbox" name="all_order_chk" class="all_order_chk" value="" unchecked="unchecked"></th>
                                        <th>{{ __('message.Sr. No') }}</th>
                                        <?php //if($usertype == 'superadmin') {?>
                                       
                                         <?php //}?>
                                        <th>{{ __('message.Order ID') }}</th>
                                        <th>{{ __('message.Product Name') }}</th>
                                        <th><center>{{ __('message.SKU') }}</center></th>
                                         <th>{{ __('message.Vendor Name') }}</th>
                                        <th>{{ __('message.Selling Price') }}</th>
                                        <th><center>{{ __('message.Quantity') }}</center></th>
                                        <th><center>{{ __('message.Total') }}</center></th>
                                        <th>{{ __('message.City') }}</th>
                                        <th>{{ __('message.Offer ID') }}</th>
                                        <th>{{ __('message.Product Reference No') }}</th>
                                        <th>{{ __('message.Date') }}</th>
                                        <th>Order Status</th>
                                        <th>{{ __('message.View Order') }}</th>
                                                                           
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									
									//if($admin_status==1){
                                    $index =1;
                                    foreach ($research as $researchdata ) {
									if($researchdata->admin_status ==1){
                                         foreach($order as $orders) {
                                           foreach($orders->cart->items as $item) {
                                      if( $item['item']['role_id']==$orderrole_id && $item['item']['id'] == $product_id){
                                       ?>
                                       <tr>
                                       <td class="chkbox">
                                            <input type="checkbox" class="order_chk" name="order_chk" value="{{ $researchdata->order_id  }}">
                                        </td>
                                        <td class="srNo">
                                            <?php echo $index++; ?>
                                        </td>
                                        
                         
                                                 <td>
                                          <?php 
                                          echo $researchdata->order_id; 
                                          ?>

                                      </td>
                                      <td> 
                                        <?php 
                                        echo $researchdata->product->product_name[$language]; 
                                        //echo $researchdata->product_id; ?> 
                                      </td>
                                        <!--for sku id-->
                                        <td> 
                                        <center></center>
                                        </td>
                                       <?php //if($usertype == 'superadmin') {?>
                                        <td>
                                          <?php 
                                           echo $researchdata->admins->name;
                                          //echo $researchdata->role_id; 
                                          ?>

                                      </td>
                                  <?php //}?>
                                        <td> 
                                            <?php echo $researchdata->product_price; ?> 
                                        </td>
                                         <!--for Quantity id-->
                                        <td> 
                                        <center><?php echo $item['qty'];  ?></center>
                                        </td>
                                        <!--for Total id-->
                                        <td> 
                                        <center>
                                            <p>$ {{ $item['qty'] * $researchdata['product_price'] }}</p>
                                        </center>
                                        </td>
                                        <td> 
                                                <a href="#">

                                                    <?php
                                                    if ($add_id == 0) {
                                                        //echo $orders['address'] . '<br>';
                                                        echo $orders['city'] . '<br>';
                                                        //echo 'Potal Code :- ' . $orders['postal_code'] . '<br>';
                                                        //echo 'Contact No. ' . $orders['contact'] . '<br>';
                                                    } else {
                                                        foreach ($order_add as $add) {
                                                            //echo 'Name :-' . $add->name . '<br>';
                                                            //  echo 'Landmark :-' . $add->landmark . '<br>';
                                                            //  echo 'Address :-' . $add->address . '<br>';
                                                            echo $add->city . '<br>';
                                                            // echo 'State :-' . $add->state . '<br>';
                                                            // echo 'Country :-' . $add->country . '<br>';
                                                            // echo 'Potal Code :-' . $add->pin_code . '<br>';
                                                            // echo 'Contact No. ' . $add->phone . '<br>';
                                                        }
                                                    }
                                                    ?> 
                                                </a>
                                            </td>
                                           
                                                <td> 
                                                    <?php echo $researchdata->offer_id; ?> 
                                                </td>
                                                <td> 
                                                    <?php echo $researchdata->product_ref_number; 
                                                    ?> 
                                                </td>
                                         
                                                  <td> 
                                                    <?php echo $researchdata->created_at; 
                                                    ?> 
                                                </td>
                                                <td>
                                                <?php                                                 
                                                        if($researchdata->admin_status==1){ ?>
                                                        <span class="badge badge-success">Approved</span> 
                                                        <?php }else if($researchdata->admin_status==2){ ?>
                                                            <span class="badge badge-danger">Hold</span>  
                                                        <?php }else{ ?>
                                                            <span class="badge badge-warning">Approval Pending</span>
                                                    <?php  } ?> 
                                                </center> </td>
                                                            <!--for order date-->
                                                
                                                <td>
                                                    <div class="operationsblok">
                                                       <!--  <a href="edit-product.html" data-toggle="tooltip" title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a> -->
                                                        <a href="showreport/{{$researchdata->id}}" data-toggle="tooltip" title="View">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                       <!--  <a href="edit-product.html" data-toggle="tooltip" title="Delete">
                                                            <i class="fa  fa-trash-o"></i>
                                                        </a> -->
                                                        <?php                                                 
                                                        if($researchdata->admin_status!=1){ ?>
                                                        <a href="#" id="orderapprove_check" data-toggle="tooltip" title="Approve Order">
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                        <?php } else{ ?>
                                                            <a href="#" id="orderdisapprove_check" data-toggle="tooltip" title="Disapprove Order">
                                                                <i class="fa fa-close"></i>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                   
                                                </td>
                                            </tr>
									<?php }}}} }?>
                           
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div><!-- .animated -->
    </div>
</div><!-- /#right-panel -->
    <!-- Right Panel -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('/js/view_order_service.js') }}"></script>
@endsection

@section('footerSection')
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
@endsection
