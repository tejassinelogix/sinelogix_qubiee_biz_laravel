<html>
    <head>

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw=" crossorigin="anonymous"></script>
        <style>
            .invoice-title h2, .invoice-title h3 {
                display: inline-block;
            }

            .table > tbody > tr > .no-line {
                border-top: none;
            }

            .table > thead > tr > .no-line {
                border-bottom: none;
            }

            .table > tbody > tr > .thick-line {
                border-top: 2px solid;
            }
        </style>
        <!------ Include the above in your HEAD tag ---------->
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php foreach($order as $orders) { ?>
                    <div class="invoice-title">
                        <img src="https://qbe.demosoftwares.biz/public/assets/images/logo.png"  height="50px" width="90px" alt="">
                        <p>Qubee.com</br>
                        21, Jafiliya
                        1034 Dubai,United Arab Emirates.</br>
                        Email:info@qubee.com
                        </p> 
                        <hr>
                        <h3 class="panel-title"><strong>Invoice </strong>Order #<?php echo $orders['id'];?></h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Billed To:</strong><br>
                            <?php 
                                echo Auth::user()->name.'<br>';
                                echo $orders['address'].',<br>';
                                echo $orders['city'].'.<br>';
                                echo $orders['postal_code'].'<br>';
                                echo $orders['contact'].'<br>';
                            ?>
                        </div>
                        <div class="col-md-6 text-right">
                            <strong>Shipped To:</strong><br>
                            <?php if($add_id == 0){
                                              echo Auth::user()->name.'<br>';
                                              echo $orders['address'].',<br>';
                                              echo $orders['city'].'.<br>';
                                              echo $orders['postal_code'].'<br>';
                                              echo $orders['contact'].'<br>';
                                          }else{
                                              foreach($order_add as $add) {
                                                  echo $add->name.'<br>';
                                                  echo $add->landmark.',<br>';
                                                  echo $add->address.',<br>';
                                                  echo $add->city.',<br>';
                                                  echo $add->state.',<br>';
                                                  echo $add->country.'.<br>';
                                                  echo $add->pin_code.'<br>';
                                                  echo $add->phone.'<br>';
                                              }
                                          }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Payment Method:</strong><br>
                            <?php echo $orders['payment_status'].'<br>'; ?>
                            <?php //echo $orders['user']['name'].'<br>'; ?>
                            <?php //echo $orders['email']; ?>
                            <?php //echo $orders['address'].'<br>'; ?>
                            
                        </div>
                        <div class="col-md-6 text-right">
                            <strong>Order Date:</strong><br>
                            <?php echo $orders['created_at']; ?><br>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Order summary</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <td><strong>Item</strong></td>
                                            <td class="text-center"><strong>Price</strong></td>
                                            <td class="text-center"><strong>Quantity</strong></td>
                                            <td class="text-right"><strong>Totals</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $index =1;
                                     $productpricesum = 0;
                                     foreach($order as $orders) {
                                         foreach($orders->cart->items as $item) {
                                             $productpricesum+= $item['qty'] * $item['item']['product_price'];
                                       ?>
                                        <tr>
                                            <td><?php echo $item['item']['product_name'][$language];?></td>
                                            <td class="text-center"><?php echo $item['item']['product_price'];  ?></td>
                                            <td class="text-center"><?php echo $item['qty']; ?></td>
                                            <td class="text-right">$<?php echo $item['item']['product_price'] * $item['qty'];  ?></td>
                                        </tr>
                                     <?php }
                                     }?>    
                                        
                                        <tr>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                            <td class="thick-line text-right">$<?php echo $productpricesum; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center"><strong>Shipping</strong></td>
                                            <td class="no-line text-right">Free</td>
                                        </tr>
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center"><strong>Total</strong></td>
                                            <td class="no-line text-right">$<?php echo $productpricesum; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>