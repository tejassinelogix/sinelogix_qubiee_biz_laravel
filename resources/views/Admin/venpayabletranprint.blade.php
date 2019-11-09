@extends('Admin.layouts.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('main-content')
   <table border="2" width="100%" class="table table-striped table-bordered">
<!--      <table    class="table table-striped table-bordered bootstrap-data-table vendorTable">-->
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
                             <table    class="table table-striped table-bordered  vendorTable2">
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
                             <table    class="table table-striped table-bordered  vendorTable2">
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