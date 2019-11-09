<!DOCTYPE html>
<html>
<head>
    <title>Qubiee.com </title>
</head>
<body>
    <h1>Welcome to - Qubiee.com</h1>

    <!--<img src="https://qbe.demosoftwares.biz/public/assets/images/logo.png" alt="">-->
                     <table  border="1" id="bootstrap-data-table" class="table table-striped table-bordered">  
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
                                        <th><center>{{ __('message.Rate') }}</center></th>
                                        <th><center>{{ __('message.Moving Fees') }} ($)</center></th>
                                       <th><center>{{ __('message.Commission') }}</center></th>
                                        <th><center>{{ __('message.Order Date') }}</center></th>
                                       
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
                                        <td> <center>
                                            <?php echo $researchdata->admins->name; ?> 
                                        </center></td>
                                        <td> <center>
                                            <?php echo '$'.$researchdata->productpriceitem; ?> 
                                        </center></td>
                                        <td><center> 
                                    <?php echo $researchdata->total; ?> 
                                        </center></td>
                                           <td> <center>
                                    <?php echo $researchdata->productprice; ?> 
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
                                              if($researchdata->productpriceitem <= 100){
                                              $sellingprice = $researchdata->productpriceitem - ($researchdata->productpriceitem * ($userrate->lesshundred / 100));       
                                            $sellingprice=   $researchdata->productpriceitem - $sellingprice;
                                              }else{
                                                  $sellingprice = $researchdata->productpriceitem - ($researchdata->productpriceitem * ($userrate->greterhundred / 100)); 
                                             $sellingprice=   $researchdata->productpriceitem - $sellingprice;
                                                  }
                                               echo '$'. $sellingprice;
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
    <div class="space15"></div>
    <div>
        <p>Qubee.com</p>
        <p>21, Jafiliya<p>
        <p> 1034 Dubai</p>
        <p>Email:info@qubee.com</p>
        <p>United Arab Emirates</p>
        <img src="https://qbe.demosoftwares.biz/public/assets/images/logo.png" alt="">
        
    </div>
</body>
</html>