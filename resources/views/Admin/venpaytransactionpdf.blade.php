<!DOCTYPE html>
<html>
<head>
    <title>Qubiee.com</title>
</head>
<body>
    <h1>Welcome to - Qubiee.com</h1>

   <table border="2" width="100%" class="table table-striped table-bordered">
       
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
                                              <center>
                                            <?php echo $index++; ?>
                                               </center>
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