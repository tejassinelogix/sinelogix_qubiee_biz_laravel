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
                <h1>Vendor Payment Transaction Status</h1>
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
                        <a href="<?php echo url(Request::segment(1).'/payabletranreqpdf') ?>/<?php echo $id; ?>" class="btn btn-primary">{{ __('message.Export To Pdf') }}</a>
                          <a href="<?php echo url(Request::segment(1).'/payabletranreqprint') ?>/<?php echo $id; ?>" class="btn btn-info btnprint">Print Preview</a>
                            <script type="text/javascript">
                $(document).ready(function(){
                $('.btnprint').printPage();
                });
                </script>
                            </div>
                    <div class="card-body">
                        
                        <div class="text-center">
                            <h3>Payment Request Status</h3>
                        </div>
                            </div>
                         @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                        @endif
                         
                            <div class="space15"></div>
                        <table    class="table table-striped table-bordered bootstrap-data-table vendorTable">
                            <thead>
                                <tr>
                                    <th><center>Request ID</center></th>
                                   <th><center>Requested Amount</center></th>
                                   <!--<th><center>Amount Paid ($) and Date</center></th>-->
                                  <th><center>{{ __('message.Date On') }}</center></th>
                                 <th><center>Pay Amount</center></th>
                               
                                    
                                </tr>
                            </thead>
                            <tbody>
                          <?php 
                          $index = 1;
                            foreach($userpayreq as $researchdata){
                              
                          ?>
                                <tr>
                                     <?php if ($researchdata != null) { ?>
                                          <td class="srNo">
                                               <?php if($researchdata->status == 0){ ?>
                                                {{ $researchdata->requestnumber}}
                                                <?php }else{    }?>
                                        </td>
                                        
                                    <td>
                                       
                                       <center> 
                                           <?php if($researchdata->status == 0){ ?>
                                           <span style="color:red" >
                                           {{ $researchdata->amountreq }}   
                                           </span>
                                           
                                           <?php }else{    }?>
                                           
                                       </center>
                            
                                    </td>
                                    
                                      <td> 
                                          <?php if($researchdata->status == 0){ ?>
                                         <center> 
                                            
                                           {{ $researchdata->created_at }}
                                         
                                       </center>
                                         <?php }else{    }?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php if($researchdata->status == 0){ ?>
                                            <?php if($researchdata->readmark==0){ ?>
                                                <a href="<?php echo url(Request::segment(1).'/addtransaction') ?>/<?php echo $researchdata->requestnumber; ?>"><button class="btn btn-primary btn-sm">Pay</button></a>
                                              <?php }else{ ?> 
                                                <span style="display: block;text-align: center;">Amount Paid</span>
                                                
                                            <?php }?>
                                                  <?php if($researchdata->readmark==0){ ?>
                                            <a data-toggle="modal" data-target="#mycart-modal1" onclick="addmenumodel(<?php echo $researchdata->admin_id ?>, '<?php echo  $researchdata->requestnumber ?>');" class="btn btn-warning btn-sm">
                                                Deduct & Pay                
                                            </a>    <?php }else{ ?> 
                                                  <span style="display: block;text-align: center;"></span>
                                                      <?php }?>
                                            <?php }else{    }?>
                                        </td>
                                      </tr>
                          <?php } } ?>
                                 
                                
                               </tbody>
                        </table>
                        <div class="space15"></div>
                        <div>
                             <div class="text-center">
                            <h3>Payment Credit Status</h3>
                        </div>
                                <div class="space15"></div>
                             <table    class="table table-striped table-bordered bootstrap-data-table vendorTable2">
                            <thead>
                                <tr>
                                    <th><center>Credit ID</center></th>
                                  <th><center>Request ID</center></th>
                                    
                                   <!--<th><center>Received request ($) and Date</center></th>-->
                                   <th><center>Paid Amount</center></th>
                                  <th><center>{{ __('message.Date On') }}</center></th>
                             
                                  
                                    
                                </tr>
                            </thead>
                            <tbody>
                          <?php 
                          $index = 1;
                              
                          foreach($admipaid as $researchdata){
//                              echo '<pre>';
//                              print_r($researchdata);
//                              die;
                              
                          ?>
                                <tr>
                                     <?php if ($researchdata != null) { ?>
                                          <td class="srNo">
                                             
                                           <span>
                                               {{ $researchdata->creditrequestnumber }}
                                           </span>
                                          
                                        </td>
                                           <td> 
                                                 
                                          <center> 
                                               {{ $researchdata->requestnumber}}
                                          </center>
                                             
                                          </td>
                                  
                                     <td>
                                       
                                       <center> 
                                           
                                           
                                            
                                           <span style="color:green">
                                               {{ $researchdata->paidamount }}
                                           </span>
                                           
                                       </center>
                                    </td>
                                    <td> 
                                             
                                         <center> 
                                            
                                           {{ $researchdata->created_at }}
                                         
                                       </center>
                                                      
                                        </td>
                                       

                                   
                                    </tr>
                          <?php } } ?>
                                 
                                
                               </tbody>
                        </table>
                            
                        </div>
                        <div class="space15"></div>
                        <div>
                             <div class="text-center">
                            <h3>Payment Credit Status(After deduction)</h3>
                        </div>
                                <div class="space15"></div>
                             <table    class="table table-striped table-bordered bootstrap-data-table vendorTable2">
                            <thead>
                                <tr>
                                    <th><center>Credit ID</center></th>
                                  <th><center>Request ID</center></th>
                                    
                                   <!--<th><center>Received request ($) and Date</center></th>-->
                                   <th><center>Paid Amount</center></th>
                                  <th><center>Deducted Amount</center></th>
                                  <th><center>{{ __('message.Date On') }}</center></th>
                             
                                  
                                    
                                </tr>
                            </thead>
                            <tbody>
                          <?php 
                          $index = 1;
                              
                          foreach($admindededpay as $researchdata){
                              
                          ?>
                                <tr>
                                     <?php if ($researchdata != null) { ?>
                                          <td class="srNo">
                                            <?php if($researchdata->status == 2){  ?>
                                           <span>
                                               {{ $researchdata->creditrequestnumber }}
                                           </span>
                                           <?php }else{ } ?>
                                        </td>
                                           <td> 
                                               <?php if($researchdata->status == 2){  ?>
                                          <center> 
                                               {{ $researchdata->requestnumber}}
                                          </center>
                                        <?php }else{ } ?>
                                          </td>
                                  
                                     <td>
                                       
                                       <center> 
                                           
                                           
                                            <?php if($researchdata->status == 2){    ?>
                                           <span style="color:green">
                                               {{ $researchdata->paidamount }}
                                           </span>
                                           <?php }else{ } ?>
                                       </center>
                                    </td>
                                    <td> 
                                      <?php if($researchdata->status == 2){?>
                                         <center> 
                                             <span style="color:red">
                                           {{ $researchdata->debitamount }}
                                         </span>
                                       </center>
                                                     <?php }else{ } ?>
                                        </td>
                                    <td> 
                                            <?php if($researchdata->status == 2){?>
                                         <center> 
                                            
                                           {{ $researchdata->created_at }}
                                         
                                       </center>
                                                     <?php }else{ } ?>
                                        </td>
                                       

                                   
                                    </tr>
                          <?php } } ?>
                                 
                                
                               </tbody>
                        </table>
                            
                        </div>
                       
                    </div>
            
                   
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<!-- All Product -->



</div><!-- /#right-panel -->

<!-- Right Panel -->
<div class="modal fade" id="mycart-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">

                        <div class="modal-header">

                            <div class="col-sm-6 enquiry-Form">
                                <h4 class="modal-title" id="myModalLabel">
                                    Deduct Amount
                                </h4>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                             <form class="" action="{{ url('/admin/deuctamountpaid') }}" method="post">
                            <div class="row">
                               
                                    {{csrf_field()}}
                      <div class="modalEnqFormNew" style="display: block;width: 100%;">
                            <div class="col-md-4 text-right">
                                <label for="title">Amount </label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="deducationamount" id="deducationamount" class="form-control quantity">
                                <input type="hidden" class="form-control" id="adminid" name="adminid" placeholder="" value="">
                                <input type="hidden" class="form-control" id="requestnumber" name="requestnumber" placeholder="" value="">
                                <div class="text-right space15">
                                    <button type="submit" class="btn btn-warning btn-lg">Deduct</button>
                                </div>
                            </div>
                        </div>
                    </div>         </form>
                        </div>
                    </div>
                </div>
            </div>

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