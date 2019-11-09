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
             @if(session('info'))
                    <div class="alert alert-success">
                        {{ session('info') }}
                    </div>
                    @endif
                    @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                    @endforeach
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
                        <li><a href="index.php">Dashboard</a></li>
                        <li class="active">All Orders</li>
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
                                        <th><center>{{ __('message.Sr. No') }}</center></th>
                                        <th><center>{{ __('message.Order Id') }}</center></th>
                                        <th><center>{{ __('message.Product Name') }}</center></th>
                                        <th><center>{{ __('message.SKU') }}</center></th>
                                         <th><center>{{ __('message.Vendor Name') }}</center></th>
                                        <th>{{ __('message.Selling Price') }}</th>
                                         <th><center>{{ __('message.Quantity') }}</center></th>
                                        <th><center>{{ __('message.Total') }}</center></th>
                                        <th>{{ __('message.City') }}</th>
                                         <th><center>{{ __('message.Offer ID') }}</center></th>
                                        <th>Product Reference No.</th>
                                        <th><center>{{ __('message.Order Status') }}</center></th>
                                         <th><center>{{ __('message.Order Date') }}</center></th>
                                         <th><center>{{ __('message.Order Tracking') }}</center></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $index =1;
                                    foreach ($research as $researchdata ) {
                                         foreach($order as $orders) {
                                           foreach($orders->cart->items as $item) {
                                      if( $item['item']['role_id']==$orderrole_id && $item['item']['id'] == $product_id){
                                       ?>
                                       <tr>
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
                                        <!--for SKU id-->
                                        <td> 
                                        <center></center>
                                        </td>
                                      <td>
                                          <?php 
                                           echo $researchdata->admins->name;
                                           
                                          ?>
                                     </td>
                                    
                                        <td> 
                                            <?php echo $researchdata->product_price; ?> 
                                        </td>
                                          <!--for Quantity id-->
                                        <td> 
                                        <center>
                                            <?php echo $item['qty'];  ?>
                                        </center>
                                        </td>
                                        <!--for toltal id-->
                                        <td> 
                                        <center>
                                            <p>$ {{ $item['qty'] * $researchdata['product_price'] }}</p>
                                        </center>
                                        </td>
                                         <!--for city id-->
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
                                                 
                                                <?php 
                                                if($researchdata->order_status !=NULL){ ?>
                                                    <td> 
                                                    <?php echo $researchdata->order_status; 
                                                    ?> 
                                                </td>
                                                <?php }else{ ?>
                                                <td><?php echo 'Under Process'; ?></td>
                                                <?php } ?>
                                                 <td> 
                                                    <?php echo $researchdata->created_at; 
                                                    ?> 
                                                </td>
                                                <td>
                                                    <div class="operationsblok">
                                                        <form action="{{ url('/admin/updateoreder') }}" id="update" method="post">
                                                            {{csrf_field()}}
<!--                                                          <label for="select" class=" form-control-label">Select
                                            Order Status</label>-->
                                                    <div class="form-group col-sm-12">
                                                        <select name="orderstatus" id="orderstatus">
                                                                <!--<option value="">Select Order Status</option>-->
                                                                <?php if($researchdata->order_status=="collected from vendor") { ?>
                                                                <option value="Under Process">Under Process</option>
                                                                <option value="collected from vendor" selected="">Collected From Vendor</option>
                                                                 <option value="collected by courier">Collected By Courier</option>
                                                                 <option value="displatched to customer">Dispatched To Customer</option>
                                                                  <option value="Delivered">Delivered</option>
                                                                  
                                                                <?php }elseif ($researchdata->order_status=="collected by courier") { ?>
                                                                  <option value="Under Process">Under Process</option>
                                                                <option value="collected by courier" selected="">Collected By Courier</option>
                                                                  <option value="collected from vendor">Collected From Vendor</option>
                                                                 <option value="dispatched to customer">Dispatched To Customer</option>
                                                                  <option value="Delivered">Delivered</option>
                                                                <?php }elseif ($researchdata->order_status=="dispatched to customer") { ?>
                                                                  <option value="Under Process">Under Process</option>
                                                                <option value="dispatched to customer" selected="">Dispatched To Customer </option>
                                                                 <option value="collected by courier">Collected By Courier</option>
                                                                 <option value="collected from vendor">Collected From Vendor</option>
                                                                  <option value="Delivered">Delivered</option>
                                                                 <?php }elseif ($researchdata->order_status=="Delivered") { ?>
                                                                  <option value="Under Process">Under Process</option>
                                                                  <option value="Delivered" selected="">Delivered</option>
                                                                  <option value="collected by courier">Collected By Courier</option>
                                                                  <option value="dispatched to customer">Dispatched To Customer</option>
                                                               <?php  }else{?>
                                                                  <option value="Under Process" selected="">Under Process</option>
                                                                 <option value="collected from vendor">Collected From Vendor</option>
                                                                 <option value="collected by courier">Collected By Courier</option>
                                                                 <option value="dispatched to customer">Dispatched To Customer</option>
                                                                  <option value="Delivered">Delivered</option>
                                                                <?php } ?> 
                                                            </select>
                                                         </div>
                                                           <input type="hidden" name="orderid" value="{{$researchdata->order_id}}">
                                                           <input type="hidden" name="orderproductsid" value="{{$researchdata->id}}">
                                                            <?php   
                                                        $usertype = (Auth::user()->job_title);
                                                   if($usertype=="superadmin"){ ?>
                                                        <div class="form-group col-sm-12">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                             <?php } ?>
                                                        </form>
<!--                                                        <a href="showreport/{{$researchdata->id}}" data-toggle="tooltip" title="View">
                                                            <i class="fa fa-eye"></i>
                                                        </a>-->
                                                     
                                                    </div>
                                                </td>
                                            </tr>
                                         <?php }}}}?>
                           
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