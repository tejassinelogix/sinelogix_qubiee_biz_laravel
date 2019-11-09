
<div class="innerPageSection">
    <div class="containerWrapper">
        <div class="breadcrumbs">
            <ul>
                <p><b>{{ __('message.Welcome') }}, {{ Auth::user()->name }}</b></p>
                <li><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> </li>
                <li>{{ __('message.My Wishlist') }}</li>
            </ul>
        </div>
        <div class="space10"></div>
        <div class="row">
            @include('user-sidebar')
            <?php 
//                echo "<pre>";
//                print_r($user_wishlist);
            ?>
            <div class="col-md-10 col-sm-10">
                <h3 class="headingFull"><span><i class="fa fa-heart"></i>{{ __('message.My Wishlist') }}</span></h3>
                <div class="row">
                    @foreach($user_wishlist as $wishlist)
<!--                    {{ $wishlist->product_id }}-->
                    <?php 
                    $items = $wishlist->product_details;
                  //  print_r($items);
                    $product = json_decode($items, true);
                   // print_r($leads);
                   // echo $product['product_name'];
                    //$pro_name = json_decode($product['product_name'], true);
                    //echo $language;
                    ?>
                    
                    <div class="col-sm-3">
                        <div class="productBlock">
                            <a href="product-details.php" class="productBlockImg">
                                <div style="background: url('public/images/{{ $product['product_image'] }}') no-repeat;"></div>
                            </a>
                            <div class="productBlockInfo">
                                <h3 class="protitle">{{ $product['product_name'][$language] }}</h3>
<!--                                <ul class="proRating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-half-o"></i></li>
                                </ul>-->
                                <!--<h2 class="propricing">$ {{ $product['original_price'] }}</h2>-->
                               <h2 class="propricing">$ {{ $product['product_price'] }} 
                                    <?php if (!empty($product['discount'] || $product['discount'] != 0 || $product['product_price'] != $product['original_price'] )) { ?>
                                        <small style="text-decoration: line-through;">$<?php echo $product['original_price']; ?></small>
                                           
                                            <?php
                                        } else {
                                            
                                        }
                                        ?>
                                   </h2>
                                <!--<p class="proinfo">{{ __('message.Earliest Delivery: Today') }}</p>-->
                            </div>
                            <div class="productBlockViewDtl">
                                <a href="<?php echo url('/productdetails'); ?>/{{$product['url'] }}" class="btn1">{{ __('message.view details') }}<i class="fa fa-arrow-circle-right"></i></a>
                                <a href="{{ url("/add-to-cart/{$wishlist->product_id}") }}" class="btn2">{{ __('message.Buy Now') }}<i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="removeWishlist">
                            <a href="{{ url("/delete-from-wishlist/{$wishlist->id}") }}" class="btn btn-default2 btn-rounded"><i class="fa fa-trash"></i>{{ __('message.Remove from Wishlist') }} </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        
        </div>
    </div>
</div>
<div class="space30"></div>



