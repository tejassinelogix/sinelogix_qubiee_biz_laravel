<!DOCTYPE html>
<html>
<head>
    <title>Qubiee.com</title>
</head>
<body>
    <h1>Welcome to - Qubiee.com</h1>

    <!--<img src="https://qbe.demosoftwares.biz/public/assets/images/logo.png" alt="">-->
    <table  border="1" id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <!--<th>Sr. No.</th>-->
                                        <th>Vendor ID</th>
                                        <th>Vendor Name</th>

                                        <th>Order ID</th>
                                        <th>Product name</th>
                                        <th>Orignal Price</th>
                                        <th>Quantity</th>
                                        <th>Product reference No.</th>
                                        <th>Customer Name</th>
                                        <th>Shippping Address</th>
                                        <th>Total</th>
                                        <th>Payment Status</th>
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
<!--                                        <td class="srNo">
                                            <?php //echo $index++; ?>
                                        </td>-->
                                         
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
                                 <td>
                                     <?php echo $item['item']['product_ref_number'];
                                     ?>
                                      </td>
                                  <td >
                                     <?php echo $item['item']['product_name'][$language];
                                     ?>
                                     <!-- <img src="https://qbe.demosoftwares.biz/public/images/{{ $item['item']['product_image'] }}" alt=""> -->
                                      </td>
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
                                     <?php echo $orders['address'].'.'; echo '<br>';  ?>
                                       <?php echo 'City :-'.$orders['city'];  ?>
                                        <?php echo 'Potal Code :- '.$orders['postal_code']; echo '<br>';  ?>
                                       <?php echo 'Contact No. '.$orders['contact'];  ?>
                                  </td>
                                  <td> 
                                     <p>$ {{ $item['qty'] * $item['item']['product_price'] }}</p>
                                  </td>
                                  <td> 
                                     <?php echo $orders->payment_status;  ?>
                                  </td>
                                 </tr>
                                        <?php } }}?>
                           
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