@extends('Admin.layouts.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('main-content')
 
 
                        <table id="bootstrap-data-table-print" class="table table-striped table-bordered">
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
                                        <th>{{ __('message.City') }}</th>
                                        <th><center>{{ __('message.Offer ID') }}</center></th>
                                        <th><center>{{ __('message.Order Status') }}</center></th>
                                        <th><center>{{ __('message.Order Date') }}</center></th>
                                    
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
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
                                        <center></center>
                                        </td>
                                        <td> <center>
                                            <?php echo $researchdata->admins->name; ?> 
                                        </center></td>
                                        <td> <center>
                                            <?php echo $researchdata->productpriceitem; ?> 
                                        </center></td>
                                        <td><center> 
                                    <?php echo $researchdata->total; ?> 
                                        </center></td>
                                           <td> <center>
                                    <?php echo $researchdata->productprice; ?> 
                                       </center> </td>
                                        
                                        <!--for city id-->
                                        <td> 
                                        <center></center>
                                        </td>
                                            <!--for offer id-->
                                         <td> 
                                         <center>
                                             <?php echo $researchdata->offer_id; ?>
                                         </center>
                                        </td>
                                         <td> <center>
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
                                         <center>
                                             <?php echo $researchdata->created_at; ?>
                                         </center>
                                        </td>
                                       
                                     
                                 
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
  
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