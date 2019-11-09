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
                <h1>Vendor Details</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo url('/admin/dashboard') ?>">Dashboard</a></li>
                    <li><a href="<?php echo url('/admin/venpaymentcommission')  ?>">All Vendor</a></li>
                    <!--<li class="active">All Vendor</li>-->
                </ol>
            </div>
        </div>
        <!--<a class='col-lg-offset-5 btn btn-success' href="{{ route('user.create') }}">Add New</a>-->
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <!--                            <div class="card-header">
                                                    <strong class="card-title">Data Table</strong>
                                                </div>-->
                      <div align="center">    
                        <a href="<?php echo url(Request::segment(1).'/showvenpaytranpdf') ?>/<?php echo $id; ?>" class="btn btn-primary">{{ __('message.Export To Pdf') }}</a>
                          <a href="<?php echo url(Request::segment(1).'/showvenpaytranprint') ?>/<?php echo $id; ?>" class="btn btn-info btnprint">Print Preview</a>
                            <script type="text/javascript">
                $(document).ready(function(){
                $('.btnprint').printPage();
                });
                </script>
                            </div>
                         @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                        @endif
                        @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                    <form role="form" action="<?php echo url('/admin/requestforpay') ?>" method="post">
            {{ csrf_field() }}
           <div class="box-body">
              <div class="col-lg-offset-3 col-lg-6">
                 
                 
                  <div class="form-group">
                  <label for="Rate">Request For Pay Amount</label>
                  <input type="number" class="form-control quantity" id="payedamount" name="payedamount" placeholder="Request For Pay Amount" value="{{ old('payedamount') }}">
                  <input type="hidden" name="vendorid" id="vendorid" value="<?php echo $id; ?>">
                  </div>
                

                <div class="form-group">
               

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href='<?php echo url(Request::segment(1).'/venpaymentcommission') ?>' class="btn btn-warning">Back</a>
                <a href="/admin/venpaytranrequest/{{ $id }}" target="_blank" class="btn btn-info">View Transaction Details</a> 
              </div>
                
              </div>
          
        </div>
    </div>
            </form>
                    <div class="card-body">
                        <table  id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th><center>{{ __('message.Sr. No') }}</center></th>
                                   <th><center>Order Id</center></th>
                                   <th><center>Product Id</center></th>
                                      <th><center>Moving Fess</center></th>
                                   <th><center>Total Selling</center></th>
                                </tr>
                            </thead>
                            <tbody>
                          <?php 
                          $index = 1;
                              $productpricesum = 0;
                                $movingfesstotal=0;
                                $commissionpricetotal=0;
                          foreach($research as $researchdata){
                              
                          ?>
                                <tr>
                                     <?php if ($researchdata != null) { ?>
                                          <td class="srNo">
                                            <?php echo $index++; ?>
                                        </td>
                                    <td>
                                       
                                       <center> {{ $researchdata->order_id }}</center>
                                    </td>
                                     <td>
                                       
                                       <center> {{ $researchdata->product_id }}</center>
                                    </td>
                                 
                                       <td> 
                                           <?php 
                                            foreach ($user as $userrate){
                                                
                                                
                                          // if($userrate->admin_id == $researchdata->role_id){ 
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
                                                
                                           <?php //} else{ ?>
                                               
                                           <?php //}
                                           
                                           } ?>
                                        
                                        </td>

                                    <td>
                                        <center>$ {{ $researchdata->product_price }}</center>
                                        <?php 
                                     
                                        $pricetotal=$researchdata->product_price;
                                        $productpricesum+=$pricetotal;
                                        $movingfesstotal+=$movingfess;
                                            if($researchdata->product_price <= 100){
                                              $commissionprice = $researchdata->product_price - ($researchdata->product_price * ($userrate->lesshundred / 100));       
                                            $commissionprice=   $researchdata->product_price - $commissionprice;
                                              }else{
                                                  $commissionprice = $researchdata->product_price - ($researchdata->product_price * ($userrate->greterhundred / 100)); 
                                             $commissionprice=   $researchdata->product_price - $commissionprice;
                                                  }
                                                   $commissionpricetotal+=$commissionprice;
                                        ?>
                                    </td>
                                    </tr>
                          <?php } } ?>
                                   <tfoot>
                                <tr>
                                    <th colspan="4" style="text-align: right">Total Orders</th>
                                    <th><center><?php echo '$'.$productpricesum; ?></center></th>
                                 </tr>
                                 <tr>
                                    <th colspan="4" style="text-align: right">Own Commission</th>
                                    <th><center><?php echo '$'.$commissionpricetotal; ?></center></th>
                                 </tr>
                                 <tr>
                                    <th colspan="4" style="text-align: right">Moving Fees</th>
                                    <th><center><?php echo '$'.$movingfesstotal; ?></center></th>
                                 </tr>
                                 <tr>
                                    <th colspan="4" style="text-align: right">Total Commission</th>
                                    <th><center><?php echo '$'; echo $totalcommiss=$commissionpricetotal + $movingfesstotal; ?></center></th>
                                
                                     
                                 </tr>
                                   <tr>
                                    <th colspan="4" style="text-align: right">Total Payable</th>
                                    <th><center><?php 
                                    
                                    echo '$'; echo $productpricesum - $movingfesstotal-$commissionpricetotal; ?>
                                   </center></th>
                                  </tr>
                                    <tr>
                                    <th colspan="4" style="text-align: right">Paid</th>
                                    <th><center><?php 
                                       echo '$'. $totalpayamount; 
                                      
                                     ?>
                                   </center>
                                   </th>
                                   
                                  </tr>
                                  <tr>
                                    <th colspan="4" style="text-align: right">Remaining Balance</th>
                                     <th>
                                  <center><?php 
                                    echo '$'; echo $productpricesum - $movingfesstotal-$commissionpricetotal-$totalpayamount; ?>
                                   </center>
                                     </th>
                                   </tr>
                            </tfoot>
                                
                               </tbody>
                        </table>
                       
                    </div>
               
                   
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<!-- All Product -->



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