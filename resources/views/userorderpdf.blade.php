<?php 
//    echo "<pre>";
//    print_r($order_add);
//    echo $order[0]['shipping_address'];
//    dump($order_add);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Qubiee.com</title>
</head>
<body>
    <h1>Welcome to - Qubiee.com</h1>

<!--    <img src="https://qbe.demosoftwares.biz/public/assets/images/logo.png" height="50px" width="50px" alt="">-->
    <table  border="1" id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
<!--                                        <th>Vendor ID</th>-->
                                        <!--<th>Vendor Name</th>-->

                                        <th>Order ID</th>
                                        <th>Product name</th>
                                        <th>Original Price</th>
                                        <th>Quantity</th>
                                        <th>Product reference No.</th>
                                        <th>Customer Name</th>
                                        <th>Billing Address</th>
                                        <th>Shipping Address</th>
                                        <th>Total</th>
                                        <th>Payment Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $index =1;
                                     $productpricesum = 0;
                                     foreach($order as $orders) {
                                         
                                        foreach($orders->cart->items as $item) {
                                             $productpricesum+= $item['qty'] * $item['item']['product_price'];
                                        // if( $item['item']['role_id']==$orderrole_id && $item['item']['id'] == $product_id){
                                       ?>
                                       <tr>
                                        <td class="srNo">
                                            <?php echo $index++; ?>
                                        </td>
                                         
<!--                                       <td>
                                       <?php 
                                         // echo $item['item']['role_id']; 
                                          ?>

                                      </td>-->
<!--                                       <td>
                                       <?php 
                                         // echo $vendorname; 
                                          ?>

                                      </td>-->
                                 <td>
                                     <?php //echo $item['item']['product_ref_number'];
                                             echo $orders['id'];
                                     ?>
                                      </td>
                                  <td ><center>
                                     <?php echo $item['item']['product_name'][$language];
                                        echo '<br>';
                                     ?>
                                <center><img src="https://qbe.demosoftwares.biz/public/images/{{ $item['item']['product_image'] }}"  height="90px" width="90px" alt=""></center>
                                     <!-- <img src="https://qbe.demosoftwares.biz/public/images/{{ $item['item']['product_image'] }}" alt=""> -->
                                      </center></td>
                                     <td> 
                                     <?php echo $item['item']['product_price'];  ?>
                                  </td>
                                  <td> 
                                     <?php echo $item['qty'];  ?>
                                  </td>
                                    <td> 
                                     <?php echo $item['item']['product_ref_number'];  ?>
                                  </td>
                                  <td> 
                                     <?php echo $orders['user']['name'];  ?>
                                  </td>
                                   <td> 
                                     <?php 
                                              echo $orders['address'].'<br>';
                                              echo 'City :-'.$orders['city'].'<br>';
                                              echo 'Potal Code :- '.$orders['postal_code'].'<br>';
                                              echo 'Contact No. '.$orders['contact'].'<br>';
                                     ?>
                                  </td>
                                  <td>
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
       
                                  </td>
                                  <td> 
                                     <p>$ {{ $item['qty'] * $item['item']['product_price'] }}</p>
                                  </td>
                                  <td> 
                                     <?php echo $orders->payment_status;  ?>
                                  </td>
                                 </tr>
                                
                                        <?php //}
                                        }}?>
                                     <tr>
                                        <td colspan="9"><center>Total Sale is</center></td>
                                    <td colspan="2"><center>$<?php echo $productpricesum; ?></center></td>
                                    </tr>
                           
                                </tbody>
                            </table>
    <div class="space15"></div>
    <div>
        <p>Qubee.com</p>
        <p>21, Jafiliya<p>
        <p> 1034 Dubai</p>
        <p>Email:info@qubee.com</p>
        <p>United Arab Emirates</p> 
        <img src="https://qbe.demosoftwares.biz/public/assets/images/logo.png"  height="90px" width="90px" alt="">
        
    </div>
</body>
</html>