       <?php
//                    foreach (array_slice($getParentCategoryproduct, 0, 8) as $catproduct) {
                        foreach ($poductdata as $catproduct) {
                       // $pro_name = json_decode($catproduct->product_name, true);
                       
                        $urlname = $catproduct['name'];
                        $productfullname = str_replace(' ', '-', $urlname);
                        ?>
                        <div class="col-sm-3 product-box-class filter">
                            <div class="productBlock">
                                <a href="<?php echo url('/productdetails'); ?>/{{$catproduct['url'] }}" class="productBlockImg">
                                    <div style="background: url('http://qbe.demosoftwares.biz/public/images/{{ $catproduct['product_image'] }}') no-repeat;"></div>
                                </a>
                                 <?php if (!empty($catproduct['discount']) || $catproduct['discount'] !=0 ) { ?>
                                        <span class="discountoffer">
                                        <?php echo $catproduct['discount']; ?> % Offer
                                        </span>
                                    <?php } else { ?>                   

                                    <?php } ?>
                                <div class="productBlockInfo">
                                    <h3 class="protitle"><?php echo ucwords($catproduct['name']); ?></h3>

                                    <ul class="proRating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                       <div class="loaderWrapperAjax loader-wrapper<?php echo $catproduct['id'];?>" style="display: none;"><img src="{{ URL::to('public/assets/images/ajax-loader.gif') }}"></div>
                                    <div class="productInfoMsgAlert addtowishmessage<?php echo $catproduct['id'];?>" ></div>
                    <button  data-id="<?php echo $catproduct['id'];?>" class="wishlist-btn addtowishlist">Add to Wishlist</button>
                                    <h2 class="propricing">
                                        $ {{ $catproduct['price'] }} 
                                         <?php
                                        
                                        if (!empty($catproduct['discount'] || $catproduct['discount'] != 0 || $catproduct['price'] != $catproduct['original_price'])) { ?>
                                        <small style="text-decoration: line-through;">${{ $catproduct['original_price'] }}</small> 
                                      <?php
                                        } else {
                                            
                                        }
                                        ?>
                                    </h2>
 
                                </div>
                                <div class="productBlockViewDtl">
                                    <a href="<?php echo url('/productdetails'); ?>/{{$catproduct['url'] }}" class="btn1">View Details<i class="fa fa-arrow-circle-right"></i></a>
                                    <a href="{{ url("/add-to-cart/{$catproduct['id']}") }}" class="btn2">Add To Cart<i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php
                        //$abc = $catproduct->id;
                    }
//                    if (!empty($abc)) {
//                        $abc;
//                    } else {
//                        $abc = 0;
//                    }
                    ?>
                    <!-- <div class="filter_data"> 


                    </div> -->
<!--                    ajax load 
                    <div id="remove-row">
                        <button id="btn-more" data-id="<?php //echo $abc; ?>" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent pricesidebarbtn" >Load More  </button>
                    </div>-->
                    <!--ajax load -->
