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
                                <div class="productBlockInfo">
                                    <h3 class="protitle"><?php echo  $catproduct->product_name[$language]; ?></h3>

                                    <ul class="proRating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                        <?php if (!empty($catproduct->discount)) { ?>
                                        <span class="discountoffer">
                                        <?php echo $catproduct->discount; ?> % {{ __('message.Off') }}
                                        </span>
                                <?php } else { ?>
                                        <span class="discountoffer">
                                            <a href="<?php echo url('/add-to-wishlist'); ?>/<?php echo $catproduct->id; ?>" class="wishlist-btn" title="<?php echo __('message.Add to Wishlist'); ?>"><i class="fa fa-heart"></i><?php echo __('message.Add to Wishlist'); ?></a>
                                        </span>
                                <?php } ?>
                                    <h2 class="propricing">$ <?php echo $catproduct->product_price; ?>  $<?php echo $catproduct->original_price ?></h2>
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