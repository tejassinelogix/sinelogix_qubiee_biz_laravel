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
                                    <th><center>Sr. No.</center></th>
                                    <th><center>Product ID</center></th>
                                     <th><center>Product Name</center></th>
                                    <th><center>Product Price</center></th>
                                    <th><center>Vendor Name</center></th>
                                    <th><center>Number Of Product</center></th>
                                    <th><center>Total</center></th>
                                    
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
                                foreach ($research as $researchdata) {
                                 $productpricesum+= $researchdata->productprice;
                                    ?> 
                                   <tr>
                                        <td class="srNo">
                                            <?php echo $index++; ?>
                                        </td>
                                        <td> <center>
                                            <?php echo $researchdata->product_id; ?> 
                                        </center></td>
                                         <td> <center>
                                            <?php echo $researchdata->product->product_name[$language]; ?> 
                                        </center></td>
                                          <td> <center>
                                            <?php echo $researchdata->productpriceitem; ?> 
                                        </center></td>
                                          <td> <center>
                                            <?php echo $researchdata->admins->name; ?> 
                                        </center></td>
                                        <td><center> 
                                    <?php echo $researchdata->total; ?> 
                                        </center></td>
                                           <td> <center>
                                    <?php echo $researchdata->productprice; ?> 
                                       </center> </td>
                                        
                                    </tr>
                                <?php } ?>
                                 <tr>
                                        <td colspan="6"><center>Total Sale</center></td>
                                    <td><center><?php echo $productpricesum ?></center></td>
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
        <img src="https://qbe.demosoftwares.biz/public/assets/images/logo.png" alt="">
        
    </div>
</body>
</html>