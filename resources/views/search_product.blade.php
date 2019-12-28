<?php
$abc;
//echo "<pre>";
// print_r($getParentSubCategorycate);
?>

<div class="innerPageSection">
    <div class="containerWrapper">
        <div class="breadcrumbs">
            <ul>
                <li><a href="<?php echo url('/'); ?>"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> </li>
                <li><b><?php 
//                $cat_Name = json_decode($catName, true);
//                $catNameurlde = json_decode($catNameurl, true);
//                echo $cat_Name[$language];
                //echo ucwords($categoryname); ?> </b></li>

            </ul>
        </div>
        <div class="space10"></div>
        <div class="row">
             <div class="col-md-9 col-sm-9" id="loading">
                <div class="item-list-tophead">
                    <!--<h4><?php //echo $cat_Name[$language]; ?> <span>(60 Items)</span></h4>-->
                  
                </div>
                <div class="clear row innerproductCol">
                     
                    <?php
                    if(isset($details)){
                    foreach ( $details as $catproduct) {
//                        echo '<pre>';
//                        print_r($catproduct);
//                        die;
                        //$pro_name = json_decode($catproduct->product_name, true);
                        
                         
                        ?>
                        <div class="col-sm-3 product-box-class">
                            <div class="productBlock">
                                 
                                <a href="<?php  echo url('/productdetails'); ?>/{{<?php echo $catproduct->url; ?> }}" class="productBlockImg">
                                    <div style="background: url('/public/images/<?php echo $catproduct->product_image; ?>') no-repeat;"></div>
                                </a>
                                <?php if (!empty($catproduct->discount) || $catproduct->discount !=0 ) { ?>
                                        <span class="discountoffer">
                                        <?php echo $catproduct->discount; ?> % {{ __('message.Off') }}
                                        </span>
                                    <?php } else { ?>                   

                                    <?php } ?>
                                   
                                <div class="productBlockInfo">
                                    <h3 class="protitle"><?php echo  $catproduct->product_name[$language]; ?></h3>

                                            <?php $countofdate = number_format($catproduct->reviews()->avg('rating'), 2);
                                            ?>  
                                            <ul class="proRating">
                                                @if ($catproduct->reviews()->count())
                                                <?php
                                                $i = 0;
                                                $k = 0;
                                                $var = (int) $countofdate;
                                                $remiangstar = 5 - $var;
                                                for ($i = 1; $i <= $countofdate; $i++) {
                                                    ?>
                                                    <li><i class="fa fa-star"></i></li>
                                                <?php } for ($k = 1; $k <= $remiangstar; $k++) { ?>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                <?php } ?>
                                                @else
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                @endif
                                            </ul>
                                    <!--                                    <ul class="proRating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>-->
                                     <div class="loaderWrapperAjax loader-wrapper<?php echo $catproduct->id;?>" style="display: none;"><img src="{{ URL::to('public/assets/images/ajax-loader.gif') }}"></div>
                                    <div class="productInfoMsgAlert addtowishmessage<?php echo $catproduct->id;?>" ></div>
                    <button  data-id="<?php echo $catproduct->id;?>" class="wishlist-btn addtowishlist"> {{ __('message.Add to Wishlist') }}  </button>
                                    <h2 class="propricing">$ <?php echo $catproduct->product_price; ?>  
                                         <?php
                                        if (!empty($catproduct->discount || $catproduct->discount != 0 || $catproduct->product_price != $catproduct->original_price)) { ?>
                                        <small style="text-decoration: line-through;">${{ $catproduct->original_price }}</small> 
                                      <?php
                                        } else {
                                            
                                        }
                                        ?>
                                    </h2>
<!--                                    <p class="proinfo">{{ __('message.Earliest Delivery: Today') }}</p>-->
                                </div>
                                <div class="productBlockViewDtl">
                                    <a href="<?php echo url('/productdetails'); ?>/<?php echo $catproduct->url; ?>" class="btn1"><?php echo __('message.view details'); ?><i class="fa fa-arrow-circle-right"></i></a>
                                    <a href="<?php echo url('/add-to-cart'); ?>/<?php echo $catproduct->id; ?>" class="btn2"><?php echo __('message.Buy Now'); ?><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    
                        <?php
                        $abc = $catproduct->id;
                    }
                    } else { ?>
                             <h3>No Details found. Try to search again !</h3>
                         
                        
                    
<?php }
                    if (!empty($abc)) {
                        $abc;
                    } else {
                        $abc = 0;
                    }
                    ?>
                    <div class="filter_data"> 


                    </div>
                    <!--ajax load -->
<!--                    <div id="remove-row">
                        <button id="btn-more" data-id="<?php //echo $abc; ?>" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent pricesidebarbtn" >{{ __('message.Load More') }}  </button>
                    </div>-->
                    <!--ajax load -->
                </div>
            </div>
        </div>
    </div>
</div>











<div class="container margin">
					<div class="row">	
					
					<div class="pagination">{{ $details->links() }}</div>
					</div>
					</div>
				










