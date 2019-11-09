         <?php 
//         foreach (array_slice($getNewproduct, 0, 50)  as $newproduct) {
         foreach ($getNewproduct  as $newproduct) {
                  $urlnewname= $newproduct->product_name; 
                  $newproductfullname=str_replace(' ', '-',$urlnewname);

                  $pro_name = $newproduct->product_name;
                  $shortdescription = $newproduct->short_description;
                ?>
            <div class="col-sm-3 product-box-class">
              <div class="productBlock">
                <a href="<?php echo url('/productdetails'); ?>/{{$newproduct->url }}" class="productBlockImg">
                  <div style="background: url('public/images/{{ $newproduct->product_image }}') no-repeat;"></div>
                </a>
                  <?php if(!empty($newproduct->discount) || $newproduct->discount !=0){ ?>
                    <span class="discountoffer">
                    <?php echo $newproduct->discount ;?> % Off
                    </span>
                <?php } else { } ?>
                <div class="productBlockInfo">
                  <h3 class="protitle"><?php echo $newproduct->product_name[$language];
                 // echo ucwords( $newproduct->product_name); ?>
                  </h3>
                    <?php  $countofdate = number_format($newproduct->reviews()->avg('rating'), 2);
                               ?>  
                    <ul class="proRating">
                            @if ($newproduct->reviews()->count())
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
                        <!--<li><i class="fa fa-star-o"></i></li>-->
                            @else
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            @endif
                        </ul>
                    
<!--                  <ul class="proRating">
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star-half-o"></i></li>
                  </ul>-->
                  <h2 class="propricing">
                      $<?php echo $newproduct->product_price; ?>
                                        <?php
                                        
                                        if (!empty($newproduct->discount || $newproduct->discount != 0 || $newproduct->product_price != $newproduct->original_price)) { ?>
                      <small><strike>$<?php echo $newproduct->original_price; ?></strike></small>
                                            <?php
                                        } else {
                                            
                                        }
                                        ?>
                      <!--${{ $newproduct->product_price }}-->
                  </h2>
                    <div class="loaderWrapperAjax loader-wrapper<?php echo $newproduct->id;?>" style="display: none;"><img src="{{ URL::to('public/assets/images/ajax-loader.gif') }}"></div>
                    <div class="productInfoMsgAlert addtowishmessage<?php echo $newproduct->id;?>" ></div>
                    <button  data-id="<?php echo $newproduct->id;?>" class="wishlist-btn addtowishlist"> {{ __('message.Add to Wishlist') }}  </button>
                    <!--<a href="{{ url("/add-to-wishlist/{$newproduct->id}") }}" class="wishlist-btn" title="{{ __('message.Add to Wishlist') }}"><i class="fa fa-heart"></i>{{ __('message.Add to Wishlist') }} </a>-->
                 
                 <!--<p class="proinfo"><?php //echo $shortdescription[$language]; ?></p>-->
                </div>
                <div class="productBlockViewDtl">
                  <a href="<?php echo url('/productdetails'); ?>/{{$newproduct->url }}" class="btn1"> {{ __('message.view details') }} <i class="fa fa-arrow-circle-right"></i></a>
                  <a href="{{ url("/add-to-cart/{$newproduct->id}") }}" class="btn2"> {{ __('message.Add To Cart') }} <i class="fa fa-shopping-cart"></i></a>
                </div>
              </div>
            </div>
                   <?php } ?>