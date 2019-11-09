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
                    <h1>All Orders</h1>
                </div>
            </div>
        </div>
         @if (\Session::has('success'))
                                    <div class="alert alert-success">
                                        <ul>
                                            <li>{!! \Session::get('success') !!}</li>
                                        </ul>
                                    </div>
                                    @endif
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
                        <li><a href="<?php echo url(Request::segment(1).'/dashboard') ?>">Dashboard</a></li>
                        <li><a href="<?php echo url(Request::segment(1).'/orders') ?>">{{ __('message.All Orders') }}</a></li>
                        <li class="active">Orders Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                         <div align="center">
    <!--<a href="../exportExcel/{{$orderrole_id}}" class="btn btn-success">Export to Excel</a>-->
   </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <?php //if($usertype == 'superadmin') {?>
                                        <th>Vendor ID</th>
                                         <th>Vendor Name</th>
                                         <?php //}?>
                                        <!--<th>Order ID</th>-->
                                        <th>{{ __('message.Product Name') }}</th>
                                        <th>Price</th>
                                        <th>Delivery Charges</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Payment Status</th>
                                        <th>Product Reference No.</th>
                                        <th>Customer Name</th>
                                        <th>Login As</th>
                                        <th>Billing Address</th>
                                        <th>Shippping Address</th>
                                        <th>Order Status</th>
                                        <!--<th>Download Invoice</th>-->
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $index =1;
                                     foreach($order as $orders) {
                                         
                                           foreach($orders->cart->items as $item) {
                                           

                                         if( $item['item']['role_id']==$orderrole_id && $item['item']['id'] == $product_id){
                                       ?>
                                       <tr>
                                        <td class="srNo">
                                            <?php echo $index++; ?>
                                        </td>
                                         <?php //if($usertype == 'superadmin') {?>
                                         <td>
                                       <?php 
                                          echo $item['item']['role_id']; 
                                          ?>

                                      </td>
                                       <td>
                                       <?php 
                                          echo $vendorname; 
                                          ?>

                                      </td>
                                  <?php //} ?>

                                 

<!--                                  <td>
                                     <?php //echo $item['item']['product_ref_number'];
                                     ?>
                                      </td>-->
                                  <td style="display: block;
                                        position: relative;
                                        top: 0;
                                        left: 0;
                                        width: 100px;
                                        margin-right: 15px;
                                        float: left;">
                                     <?php echo $item['item']['product_name'][$language];
                                     ?>
                                     <img src="/public/images/{{ $item['item']['product_image'] }}" alt="">
                                   <?php 
                                   if($item['over_img'] != "No") { ?>
                                 <a href="/public/images/order_img/{{ $item['over_img'] }}" download="{{ $item['over_img']  }}"> Download Custome Image <i class="fa fa-download" aria-hidden="true"></i></a> 
                                  <?php } else {  }?> 
                                  </td>

                                  <td> 
                                     <?php echo $item['item']['product_price'];  ?>
                                  </td>
                                   <td> 
                                     <?php echo"No Delivery Charges"; ?>
                                  </td>
                                  <td> 
                                     <?php echo $item['qty'];  ?>
                                  </td>
                                  <td> 
                                     <p>$ {{ $item['qty'] * $item['item']['product_price'] }}</p>
                                  </td>
                                  <td> 
                                     <?php echo $orders->payment_status;  ?>
                                  </td>
                                   <td> 
                                     <?php echo $item['item']['product_ref_number'];  ?>
                                  </td>
                                  <td> 
                                     <?php echo $orders['user']['name'];  ?>
                                  </td>
                                  <td> 
                                     <?php 
                                     if($orders['user']['loginas']==1){
                                         echo "Existing Customer"; 
                                     }else{
                                         echo "Guest Login";
                                     }
                                      ?>
                                  </td>
                                     <td> 
                                         <a href="#">
                                     <?php 
                                              echo $orders['address'].'<br>';
                                              echo 'City :-'.$orders['city'].'<br>';
                                              echo 'Potal Code :- '.$orders['postal_code'].'<br>';
                                              echo 'Contact No. '.$orders['contact'].'<br>';
                                     ?>
                                         </a>
                                  </td>
                                  <td> 
                                      <a href="#">
                                     <?php //echo $orders['address'].'.'; echo '<br>';  ?>
                                       <?php //echo 'City :-'.$orders['city'];  ?>
                                        <?php //echo 'Potal Code :- '.$orders['postal_code']; echo '<br>';  ?>
                                       <?php //echo 'Contact No. '.$orders['contact'];  ?>
                                      <?php //echo 'Name :- '.$shipping->name.'<br>'; ?>
                                      <?php //echo 'Address :- '.$shipping->address.'<br>'; ?>
                                      <?php //echo 'City :- '.$shipping->city.'<br>'; ?>
                                      <?php //echo 'State :- '.$shipping->state.'<br>'; ?>
                                      <?php //echo 'Country :- '.$shipping->country.'<br>'; ?>
                                      <?php //echo 'Potal Code :- '.$shipping->pin_code.'<br>'; ?>
                                      <?php //echo 'Contact No. :- '.$shipping->phone; ?>
                                      <?php if($add_id == 0){
                                              echo $orders['address'].'<br>';
                                              echo 'City :-'.$orders['city'].'<br>';
                                              echo 'Potal Code :- '.$orders['postal_code'].'<br>';
                                              echo 'Contact No. '.$orders['contact'].'<br>';
                                          }else{
                                              foreach($order_add as $add) {
                                                  echo 'Name :-'.$add->name.'<br>';
                                                  echo 'Landmark :-'.$add->landmark.'<br>';
                                                  echo 'Address :-'.$add->address.'<br>';
                                                  echo 'City :-'.$add->city.'<br>';
                                                  echo 'State :-'.$add->state.'<br>';
                                                  echo 'Country :-'.$add->country.'<br>';
                                                  echo 'Potal Code :-'.$add->pin_code.'<br>';
                                                  echo 'Contact No. '.$add->phone.'<br>';
                                              }
                                          }
                                     ?> 
                                      </a>
                                  </td>
                                  <td>
                                       <?php   
                                      $usertype = (Auth::user()->job_title);
                                 if($usertype=="superadmin"){ ?>
                                      <div class="operationsblok">
                                      <form action="{{ url('/admin/updateadminoreder') }}" id="update" method="post">
                                                            {{csrf_field()}}
                                                                  <div class="form-group col-sm-12">
                                      <select name="adminstatus" id="adminstatus">
                                          <?php if($admin_status == 1){ ?>
                                              <option value="0">Approval  Pending </option>
                                              <option value="1" selected="">Approve</option>
                                          <option value="2">Hold</option>
                                          <?php }elseif($admin_status==2){?>
                                              <option value="0">Approval  Pending </option>
                                          <option value="1">Approve</option>
                                          <option value="2" selected="">Hold</option>
                                          <?php }else{?>
                                              <option value="0">Approval  Pending </option>
                                          <option value="1">Approve</option>
                                          <option value="2">Hold</option>
                                         <?php } ?>
                                          
                                      </select>
                                           </div> 
                                             <div class="form-group col-sm-12">
                                                 <label>Moving Fess</label>
                                      <select name="movingfees" id="movingfees">
                                          <?php if($movingfees == 0){ ?>
                                              <option value="0" selected="">No Moving Fees </option>
                                              <option value="1" >Moving Fees</option>
                                         <?php }elseif($movingfees==1){?>
                                              <option value="0">No Moving Fees </option>
                                          <option value="1" selected="">Moving Fees</option>
                                          <?php }else{?>
                                              <option value="0">No Moving Fees</option>
                                          <option value="1">Moving Fees</option>
                                         <?php } ?>
                                      </select>
                                           </div>                
                                      <input type="hidden" name="orderproductsid" value="{{$orders->id}}">
                                     
                                      <div class="form-group col-sm-12">
                                                      <button type="submit" class="btn btn-primary">Update</button>
                                                  </div>
                                        
                                                            </form>
                                          </div>
                                       <?php } else {
                                             if($admin_status==1){ ?>  
                                      <span class="badge badge-success">Approved</span> 
                                    <?php }else if($admin_status==2){ ?>
                                         <span class="badge badge-danger">Hold</span>  
                                    <?php }else{ ?>
                                        <span class="badge badge-warning">Approval Pending</span>
                                   <?php  } } ?>
                                  </td>
<!--                                    <td> 
                                     <a href="../generate-pdf/{{$id}}"><i class="fa fa-download"></i></a>
                                  </td>-->
                                   </tr>
                                        <?php } }}?>
                           
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>
</div><!-- /#right-panel -->
    <!-- Right Panel -->


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