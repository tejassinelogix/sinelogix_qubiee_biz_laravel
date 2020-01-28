 <!-- relatedProductsSection -->
<div class="container">       
        <div class="relatedProductsSection">
            <h3 class="heading-center"><span>Featured</span></h3>
            <div class="row relatedProducts">
                <div class="owl-carousel" id="relatedProductsSlider">
                <?php
                
                  if(isset($getFeatureproduct) && !empty($getFeatureproduct)) {;
                    foreach ($getFeatureproduct as $newproduct) {  
                      $urlnewname = $newproduct->product_name;	
                        
                        $newproductfullname = str_replace(' ', '-', $urlnewname);
                       //$rel_pro_name = json_decode($newproduct->product_name, true);
                        $rel_pro_name = $newproduct->product_name;
                        ?>
                        <div class="item">
                            <div class="productBlock">
                                <a href="<?php echo url('/productdetails'); ?>/{{$newproduct->url }}" class="productBlockImg">
                                    <div style="background: url('{{ asset('/') }}/public/images/{{ $newproduct->product_image }}') no-repeat;"></div>
                                </a>
                                <div class="productBlockInfo">
                                    <h3 class="protitle"><?php echo $rel_pro_name[$language]; ?></h3>

                                 <?php



                                 $countofdate = number_format($newproduct->reviews()->avg('rating'), 2);
                                       ?>  
                                    <ul class="ratings">
                                        @if ($newproduct->reviews()->count())
                                        <?php
                                        $i = 0;
                                        $k= 0;
                                        $var = (int)$countofdate;
                                        $remiangstar = 5-$var;
                                        for ($i = 1; $i <= $countofdate; $i++) {
                                             
                                            ?>
                                         <li><i class="fa fa-star"></i></li>
                                        <?php }   for ($k = 1; $k <= $remiangstar; $k++) {?>
                                            <li><i class="fa fa-star-o"></i></li>
                                        <?php }?>
                                        <!--<li><i class="fa fa-star-o"></i></li>-->
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
                                    
                                    <h2 class="propricing">$ {{ $newproduct->product_price }} 
                                         <?php if (!empty($newproduct->discount || $newproduct->discount != 0 || $newproduct->product_price != $newproduct->original_price)) { ?>
                                        <small><strike>$<?php echo $newproduct->original_price; ?></strike></small>
                                           
                                            <?php
                                        } else {
                                            
                                        }
                                        ?>
                                         
<!--                                    <p class="proinfo">{{ __('message.Earliest Delivery: Today') }}</p>-->
                                    <?php if (!empty($newproduct->discount)) { ?>
                                        <span class="discountoffer">
                                            <?php echo $newproduct->discount; ?> % {{ __('message.Off') }}
                                        </span>
                                        <?php
                                    } else {
                                        
                                    }
                                    ?>
                                    <br>
                                    <a href="{{ url("/add-to-wishlist/{$newproduct->id}") }}" class="wishlist-btn" title="{{ __('message.Add to Wishlist') }}"><i class="fa fa-heart"></i>{{ __('message.Add to Wishlist') }} </a>
                                </div>
                                <div class="productBlockViewDtl">
                                    <a href="<?php echo url('/productdetails'); ?>/{{$newproduct->url }}" class="btn1">{{ __('message.view details') }} <i class="fa fa-arrow-circle-right"></i></a>
                                    <a href="{{ url("/add-to-cart/{$newproduct->id}") }}" class="btn2">{{ __('message.Buy Now') }}<i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                   
                 <?php } } else{ ?>
                    <span>No Featured Products are availabel</span>
                  <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
