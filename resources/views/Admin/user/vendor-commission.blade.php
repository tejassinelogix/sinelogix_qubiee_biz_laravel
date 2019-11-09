@extends('Admin.layouts.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('main-content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{ __('message.Vendors Commission') }}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="index.php">{{ __('message.Dashboard') }}</a></li>
                    <!-- <li><a href="add-new-product.php">Add Products</a></li> -->
                    <li class="active">{{ __('message.Vendors Commission') }}</li>
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
                        <strong class="card-title">{{ __('message.Vendors Commission') }}</strong>
                    </div>
                            <div align="center">    <?php 
                         if( $usertype == 'superadmin') { ?>
                         <!--<a href="../admin/exportAllSalesExcel/" class="btn btn-success">{{ __('message.Export To Excel') }}</a>-->
                            <?php } else{ ?>
                         
                           <!--<a href="../admin/exportAllSalesExcel/" class="btn btn-success">{{ __('message.Export To Excel') }}</a>-->
                            <?php }?>
                         <a href="../admin/exportcommissvenPdf/" class="btn btn-primary">{{ __('message.Export To Pdf') }}</a>
                         <a href="../admin/vendorcommissionprint/" class="btn btn-info btnprint">Print Preview</a>
                          
                            <script type="text/javascript">
                $(document).ready(function(){
                $('.btnprint').printPage();
                });
                </script>
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
                                        <th><center>{{ __('message.Selling Price') }}</center></th>
                                        <th><center>{{ __('message.Quantity') }}</center></th>
                                        <th><center>{{ __('message.Total') }}</center></th>
                                       
                                        <th><center>{{ __('message.Order Status') }}</center></th>
                                        <th><center>{{ __('message.Rate') }} %</center></th>
                                        <th><center>{{ __('message.Moving Fees') }} ($)</center></th>
                                       <th><center>{{ __('message.Commission') }}</center></th>
                                        <th><center>{{ __('message.Order Date') }}</center></th>
                                        <th>{{ __('message.Invoice') }}</th>
<!--                                        <th>Orignal Price</th>
                                    <th>Offer ID</th>
                                    <th>Product Reference No.</th>
                                     <th>Date</th>--> 
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                $productpricesum = 0;
                                $movingfesstotal=0;
                                foreach ($research as $researchdata) {
                                   
                                                            ?> 
                                   <tr>
                                        <td class="srNo">
                                            <?php echo $index++; ?>
                                        </td>
                                        <td> <center>
                                            <?php echo $researchdata->order_id; ?> 
                                        </center></td>
                                         <td> <center>
                                            <?php echo $researchdata->product->product_name[$language]; ?> 
                                        </center></td>
                                         <!--for SKU id-->
                                        <td> 
                                        <center>
                                             <?php echo $researchdata->product->sku?>
                                        </center>
                                        </td>
                                        <td> <center><a href="/admin/showsalecommisson/{{ $researchdata->admins->id }}" target="_blank">
                                            <?php echo $researchdata->admins->name; ?> </a>
                                        </center></td>
                                        <td> <center>
                                            <?php echo '$'.$researchdata->productpriceitem; ?> 
                                        </center></td>
                                        <td><center> 
                                    <?php echo $researchdata->total; ?> 
                                        </center></td>
                                           <td> <center>
                                    <?php echo '$'.$researchdata->productprice; ?> 
                                       </center> </td>
                                       
                                         <td> 
                                         <center>
                                    <?php 
                                    if($researchdata->admin_status==1){ ?>
                                      <span class="badge badge-success">Approved</span> 
                                    <?php }else if($researchdata->admin_status==2){ ?>
                                         <span class="badge badge-danger">Hold</span>  
                                    <?php }else{ ?>
                                        <span class="badge badge-warning">Approval Pending</span>
                                   <?php  } ?> 
                                       </center> </td>
                                        <!--for rate-->
                                       <td> 
                                           <?php 
                                            foreach ($user as $userrate){
                                           if($userrate->admin_id == $researchdata->role_id){ 
                                                if($researchdata->productpriceitem <= 100){?>
                                                    <center>
                                              <?php echo $userrate->lesshundred; ?>   
                                           </center>
                                                <?php }else{ ?>
                                                    <center>
                                              <?php echo $userrate->greterhundred; ?>   
                                           </center>
                                               <?php } ?>
                                                
                                           <?php } else{ ?>
                                               
                                           <?php }} ?>
                                        
                                        </td>
                                           <!--for moving fess-->
                                       <td> 
                                           <?php 
                                            foreach ($user as $userrate){
                                           if($userrate->admin_id == $researchdata->role_id){ 
                                               //echo $researchdata->movingfees.'thisis ';
                                                if($researchdata->movingfees > 0){?>
                                                    <center>
                                              <?php echo $movingfess=$userrate->rate; ?>   
                                           </center>
                                                <?php }else{ ?>
                                                    <center>
                                              <?php echo $movingfess= 0; ?>   
                                           </center>
                                               <?php } ?>
                                                
                                           <?php } else{ ?>
                                               
                                           <?php }} ?>
                                        
                                        </td>
                                        <!--for commison-->
                                         <td> 
                                         <?php 
                                          foreach ($user as $userrate){
                                           if($userrate->admin_id == $researchdata->role_id){ ?>
                                             <center>
                                              <?php 
                                                    if($researchdata->movingfees > 0){ 
                                                      $movingfess=$userrate->rate;
                                                            }else{ 
                                                     $movingfess=0;

                                                         } 
//                                                         echo $movingfess.'moving fess';
                                              if($researchdata->productpriceitem <= 100){
                                              $sellingprice = $researchdata->productpriceitem - ($researchdata->productpriceitem * ($userrate->lesshundred / 100));       
                                            $sellingprice=   $researchdata->productpriceitem - $sellingprice;
                                              }else{
                                                  $sellingprice = $researchdata->productpriceitem - ($researchdata->productpriceitem * ($userrate->greterhundred / 100)); 
                                             $sellingprice=   $researchdata->productpriceitem - $sellingprice;
                                                  }
                                               echo '$'. $sellingprice=$researchdata->total*$sellingprice;
                                               $productpricesum+=$sellingprice;
                                                  $movingfesstotal+=$movingfess;
                                              ?>   
                                           </center>   
                                           <?php } else{ ?>
                                               
                                            <?php } } ?>
                                        </td>
                                          <!--for order date-->
                                         <td> 
                                         <center>
                                             <?php echo $researchdata->created_at; ?>
                                         </center>
                                        </td>
                                       
                                    <td> 
<!--                                        <center>
                                     <a href="salesreport/{{$researchdata->product_id}}"><i class="fa fa-download"></i></a>
                                    </center>-->
                                    <center>
                        <br><br>
                        <a href="{{ url('../admin/vencommprnpriview') }}/<?php echo $researchdata->order_id; ?>" class="btn btn-info btnprint">Print Preview</a></center>
                                        </td>
                                 
                                    </tr>
                                <?php  } ?>
                                      <tfoot>
                                <tr>
                                    <th colspan="11" style="text-align: right">{{ __('message.Selling Price') }} {{ __('message.Commission') }}</th>
                                    <th><center><?php echo '$'.$productpricesum; ?></center></th>
                                    <th colspan="2"></th>
                                     
                                 </tr>
                                 <tr>
                                    <th colspan="11" style="text-align: right">Moving Fees</th>
                                    <th><center><?php echo '$'.$movingfesstotal; ?></center></th>
                                    <th colspan="2"></th>
                                     
                                 </tr>
                                  <tr>
                                    <th colspan="11" style="text-align: right">Total Commission</th>
                                    <th><center><?php echo '$'; echo $productpricesum + $movingfesstotal; ?></center></th>
                                    <th colspan="2"></th>
                                     
                                 </tr>
                            </tfoot>

                            </tbody>
                        </table>
<!--                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="srNo">
                                        1.
                                    </td>
                                    <td>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    </td>
                                    <td>2018-09-03 </td>
                                    <td>
                                        <div class="operationsblok">
                                            <a href="edit-product.html" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="edit-product.html" data-toggle="tooltip" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="edit-product.html" data-toggle="tooltip" title="Delete">
                                                <i class="fa  fa-trash-o"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                      
                            </tbody>
                        </table>-->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>
</div><!-- /#right-panel -->


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