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
                        <li><a href="index.php">Dashboard</a></li>
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
    <a href="../exportExcel/{{$orderrole_id}}" class="btn btn-success">Export to Excel</a>
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
<!--                                        <th>Product name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>-->
                                        <th>Total</th>
                                        <th>Product reference No.</th>
                                          <th>Payment Status</th>
                                        <th>Customer Name</th>
                                        <th>Download Invoice</th>
                                        
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
<!--                                  <td style="display: block;
                                        position: relative;
                                        top: 0;
                                        left: 0;
                                        width: 100px;
                                        margin-right: 15px;
                                        float: left;">
                                     <?php //echo $item['item']['product_name'][$language];
                                     ?>
                                     <img src="https://localhost/qubiee-admin/public/images/{{ $item['item']['product_image'] }}" alt="">
                                      </td>-->

<!--                                  <td> 
                                     <?php //echo $item['item']['product_price'];  ?>
                                  </td>-->
<!--                                  <td> 
                                     <?php //echo $item['qty'];  ?>
                                  </td>-->
                                  <td>  
                                     <p>$ {{ $item['qty'] * $item['item']['product_price'] }}</p>
                                  </td>
                                   <td> 
                                     <?php echo $item['item']['product_ref_number'];  ?>
                                  </td>
                                     <td> 
                                     <?php echo $orders->payment_status;  ?>
                                  </td>
                                    <td> 
                                     <?php echo $orders['user']['name'];  ?>
                                  </td>
                                    <td> 
                                <center> <a href="../generate-pdf/{{$id}}"><i class="fa fa-download"></i></a></center>
                                  </td>
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