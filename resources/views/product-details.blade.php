<?php
//echo View::make('dashboard-header');       
// echo Auth::user()->id;
// $uid = Auth::user()->id ;
//    echo "<pre>";
//    print_r($getProductdetails);
?>
<?php
$p_id;
?>

<div class="innerPageSection">
    <div class="container">
        <div class="breadcrumbs">
            <ul>
                <li><a href="<?php echo url('/'); ?>"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i></li>
                <?php
                foreach ($getProductdetails as $sn) {
//                    echo $sn->custmization;
                    $pro_name = json_decode($sn->product_name, true);
                    foreach ($getSubCategory as $row) {
                        $lang_typea = explode(',', $row->category_id);
                        $lang_invitee = explode(',', $sn->sub_category);

                        $cat_name = json_decode($sn->sub_category_name, true);
                        if (in_array("$lang_typea[0]", $lang_invitee)) {
                            ?>
                            <li>
                                <a href="<?php echo url('/categoryproduct'); ?>/{{ $row->url }}/{{ $sn->sub_category }}"><?php echo ucwords($cat_name[$language]); ?></a> <i class="fa fa-angle-right"></i> </li>
                            <?php
                        }
                    }
                }
                ?>
                <li><b><?php echo ucwords($pro_name[$language]) ?></b></li>
            </ul>


            <!--            <ul>
                            <li><a href="index.php"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> </li>
                            <li><a href="product-categories.php"> Cups / Mugs</a><i class="fa fa-angle-right"></i></li>
                            <li>Set amet lorem ipsum bouquet</li>
                        </ul>-->
        </div>
        <div class="space10"></div>
        <div class="productDetailsRow">
            <div class="row">
                <div class="col-md-4 zoomImageSlider">
                    <div class="show" href="{{ asset('/') }}public/images/{{ $sn->product_image }}">
                        <img src="{{ asset('/') }}public/images/{{ $sn->product_image }}" id="show-img">
                    </div>
                    <div class="small-img">
                        <img src="{{ asset('/') }}public/assets/images/online_icon_left.png" class="icon-left" alt="" id="prev-img">
                        <div class="small-container">
                            <div id="small-img-roll">
                                <?php
                                foreach ($getProductimagedetails as $image) {
									 $lang_invitee = explode('|', $image->images_name);
                                    foreach ($lang_invitee as $key => $value) {
                                        ?>  
                                        <img src="{{ asset('/') }}public/images/{{ $value}}" class="show-small-img" alt="">
                                        <?php
                                    }
                                }
                                ?>

                            </div>
                        </div>
                        <img src="{{ asset('/') }}public/assets/images/online_icon_right@2x.png" class="icon-right" alt="" id="next-img">
                    </div>
                </div>
                <div class="col-md-offset-1 col-md-7">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="designCustomBtn">
                                @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{!! \Session::get('success') !!}</li>
                                    </ul>
                                </div>
                                @endif
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif


<!--                                <a href="#" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-upload"></i>

                                                                    {{ __('message.Upload your complete new design') }} 
                                                                    <span>{{ __('message.Click here to Customize Design') }}</span>
                                </a>-->
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="productDescriptionBlock">
                                <input type="hidden" id="o_pro_id" value="<?php echo $sn->product_id; ?>">
                                <input type="hidden" id="role_id" value="<?php echo $sn->role_id; ?>">
                                <div class="product-title">
                                    <h3><?php echo ucwords($pro_name[$language]); ?></h3>
                                    <button  data-id="<?php echo $sn->product_id;?>" class="wishlist-btn addtowishlist"> {{ __('message.Add to Wishlist') }}  </button>
                                    <!--<a href="#" data-id="<?php //echo $sn->product_id;?>" class="wishlist-btn addtowishlist" title="{{ __('message.Add to Wishlist') }}"><i class="fa fa-heart"></i> {{ __('message.Add to Wishlist') }} </a>-->
                                </div><span class="addtowishmessage<?php echo $sn->product_id;?>" ></span>
                                <div class="inStockStatus">
                                    {!! $stocklevel !!}
                                </div>

                                <div class="ratings-review-details">
                                    <?php
									//dd($getproductsellerDataBy);
									
                                    if($getProductSoldBy){	?>										
										
                                        <a href="{{ url("/sellerproductdetails/{$getProductSoldBy[0]['id']}") }}"><?php echo 'Sold By : '. $getProductSoldBy[0]['name'];?></a>
										
                                   <?php }
                                    $countofdate = number_format($productdetailreview->reviews()->avg('rating'), 2);
                                    ?>
                                    <ul class="ratings">
                                        @if ($productdetailreview->reviews()->count())
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
                                        @endif
                                    </ul>

                                    <!--{!! $stocklevel !!}-->
                                    <span>|</span>
                                    @if ($productdetailreview->reviews()->count())
                                    <a href="#"> 
                                        {{ number_format($productdetailreview->reviews()->avg('rating'), 2) }} / 5.00
                                        <br />
                                        {{ $productdetailreview->reviews()->count()}} votes
                                        @else
                                        <i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
                                        <!--{{ __('message.No ratings yet') }}-->
                                        @endif
                                        {{ __('message.Ratings') }} </a>
                                    <span>|</span>
                                    <a href="#"><?php $datacountreviewe = count($productdetailreview->reviews); ?>(<?php echo $datacountreviewe; ?> {{ __('message.Reviews') }})</a>
                                <!--<div><sapn><b>SKU :</b> <?php //echo $sn->sku; ?></sapn></div>-->
                                </div>
                                
                                <div class="productQuickInfo">
                                    <h4>{{ __('message.Quick Info') }}:</h4>
                                    
                                </div>
<!--                                <select>
                                    <option>Select Color</option>
                                    <option>Small</option>
                                <option>Medium</option>
                                <option>Large</option>
                                </select>-->
                                <!--                                <div class="proquantity">
                                                                    <span>{{ __('message.Quantity') }}:</span>
                                                                     <input type="number" name="quantity" value="1"> 
                                                                    <div id="myform2" class="qty-spinner">
                                                                        <input type="button" value="-" class="qtyminus" field="quantity2">
                                                                        <input type="text" name="quantity2" value="1" class="qty">
                                                                        <input type="button" value="+" class="qtyplus" field="quantity2">
                                                                    </div>
                                                                </div>-->
                                <div class="productPageHeadRate">
                                    <h3>$<?php echo $sn->product_price; ?>
                                        <?php
                                        
                                        if (!empty($sn->discount || $sn->discount != 0 || $sn->product_price != $sn->original_price)) { ?>
                                        <small>$<?php echo $sn->original_price; ?></small>
                                            <span>
                                                <?php echo $sn->discount; ?>
                                                    <?php
                                                    if (is_null($sn->discount)) {
                                                        
                                                    } else {
                                                        ?>
                                                        % {{ __('message.Off') }}
                                                    <?php } ?>
                                               
                                            </span>
                                            <?php
                                        } else {
                                            
                                        }
                                        ?>
                                    </h3>
                                </div>
                                <?php if ($pro_quantity > 0 && $sn->status ==1 ) { ?>
                                    <div class="buyBtns">
                                        <?php if ($sn->custmization == 1) { ?>
                                            <form action="<?php echo url('/img-upload') ?>" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <label for="logo_file" class="uploadFileLabel">
                                                    <i class="fa fa-upload"></i>
                                                    <span>Upload Image And Buy</span>
                                                    <!--<img id="blah-old" >-->
                                                    
                                                    <input type="file" id="logo_file" name="logo_file" class="form-control-file" required="" onchange="readURL(this);">
                                                    <input type="hidden" id="o_pro_id" name="o_pro_id" value="<?php echo $sn->product_id; ?>">
                                                    <input type="hidden" id="role_id" name="role_id" value="<?php echo $sn->role_id; ?>">
                                                    <!--<button type="submit" name="logo_submit" class="btn btn-primary btn-lg"><i class="fa fa-shopping-cart"></i> Upload Image And Buy </button>-->
<!--                                                    <label>{{ __('message.SendAsGift') }}</label>
                                                <input type="radio"  class="rdCheck" name="send_gift" id="1" value="1" onclick='f2(this.id)'> -->
                                                    <p id="blah"></p>
                                                    <input type="submit" name="logo_submit" class="btn btn-primary btn-lg" value="Upload Image" class="form-control">
                                                </label>
                                                
                                            </form>
                                        <?php }  ?>
                                        <a href="{{ url("/add-to-cart/{$sn->product_id}") }}" class="btn btn-primary btn-lg"><i class="fa fa-shopping-cart"></i> {{ __('message.Add To Cart') }} </a>
                                        <a href="{{ url("/buy-now-cart/{$sn->product_id}") }}" class="btn btn-success btn-lg"><i class="fa fa-shopping-cart"></i> {{ __('message.Buy Now') }} </a>
                                        <div class="space5"></div>
                                        <!--<a href="{{ url("/add-to-cart-gift/{$sn->product_id}") }}" class="btn btn-primary btn-lg"><i class="fa fa-gift"></i> {{ __('message.SendAsGift') }} </a>-->
                                         
                                     </div>
                                <?php } ?>
                                <div class="space5"></div>
                                <div class="socialMediaSharing">
                                    <p>Share:</p>
                                    <ul>
                                        <li><a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo url('/productdetails'); ?>/{{$sn->url }}&amp;title=<?php echo ucwords($pro_name[$language]); ?>"><i class="fa fa-facebook"></i></a></li>
                                        <li><a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo ucwords($pro_name[$language]); ?>&amp;url=<?php echo url('/productdetails'); ?>/{{$sn->url }}&amp;media={{ asset('/') }}public/images/{{ $sn->product_image }}"><i class="fa fa-twitter"></i></a></li>
                                        <li><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo url('/productdetails'); ?>/{{$sn->url }}&amp;title=<?php echo ucwords($pro_name[$language]); ?>&amp;summary=<?php echo ucwords($pro_name[$language]); ?>"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="http://pinterest.com/pin/create/button/?url=<?php echo url('/productdetails'); ?>/{{$sn->url }}&media={{ asset('/') }}public/images/{{ $sn->product_image }}&description=<?php echo ucwords($pro_name[$language]); ?>"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#"><i class="fa fa-thumbs-up"></i></a></li>
                                    </ul>
                                </div>
                                <p class="productDilveryTime"><strong>Delivery Time:</strong> <?php echo $sn->deliverytime; ?>  </p>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Custom Design</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">





<!--                        <form class="uploadImgContainer tshirtuploadingImg">
                            <div class="uploadLabelDiv">
                                <label for="uploadImgLabel" class="uploadImgLabel">
                                    <i class="fa fa-image"></i>
                                    <strong>{{ __('message.Click Image') }}</strong>
                                    <input type="file" name="uploadImg" id="uploadImgLabel">
                                </label>
                            </div>
                            <div class="uploadImgPreview">
                                <h4 class="headingFull"><span><i class="fa fa-eye"></i>{{ __('message.Preview') }} </span></h4>
                                 <div class="dragimage" id="dragimage"> 
                                <img src="" id="uploadImgPreviewDesign" style="border:1px solid red">
                                <img src="{{ asset('/') }}public/images/{{ $sn->product_image }}" class="uploadImgPreviewFull" id="target" alt="">
                            </div>
                            <div id="tui-image-editor-container"></div>
                        </form>-->


                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>




        <?php
// echo '<script language="javascript">';
// echo 'alert("'.$sn->product_id.'")';
// echo '</script>'; 
// echo '<script type="text/javascript">alert("'.$uid.'")</script>';
        ?>


        <!-- alert ('{{ $sn->product_id }}'); -->
        <div class="space15"></div>

        <!-- productDescriptionFull -->
        <div class="productDescriptionFull">
            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs tablayout1 big-tab" role="tablist">

                    <li role="presentation" class="active"><a href="#product-details" aria-controls="tab1" role="tab" data-toggle="tab">{{ __('message.Product Details') }}</a></li>
                    <li role="presentation"><a href="#seller-details" aria-controls="tab2" role="tab" data-toggle="tab">{{ __('message.Product Specifications') }}</a></li>
                    <li role="presentation"><a href="#product-reviews" aria-controls="tab3" role="tab" data-toggle="tab">{{ __('message.Reviews') }} <?php $datacountreviewe = count($productdetailreview->reviews); ?>(<?php echo $datacountreviewe; ?>)</a></li>


                </ul>

                <!-- Tab panes -->
                <div class="tab-content tablayout-content">
                    <div role="tabpanel" class="tab-pane active" id="product-details">
                        <!--<p>{{ __('message.dummy_txt') }}</p>-->
                        <p><?php
                            $prodcutdesinfo = json_decode($sn->product_description, true);
                            echo $prodcutdesinfo[$language];
                            ?></p>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="seller-details">
                         <?php 
                         $productspecification = $sn->product_specification;
                            
                         ?>
                        <p><?php echo $productspecification;?></p>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="product-reviews">
                        <div class="customerReviewRow">
                            <?php foreach ($productdetaildata as $productreviews) {
                                ?>
                                <div class="customerReviewBlock">


                        <!--  <img src="assets/images/clientimg1.jpg" alt="">
                        <h4>{{ __('message.Good & quality product') }}<span>On Dec, 18, 2018</span></h4> -->
                                    {{ __('message.Posted By') }}-
                                    <h4> {{$productreviews->user->name}}</h4>
                                    <p><?php echo $productreviews->hedline; ?>
                                        <span>On <?php echo $productreviews->created_at->format('d/m/Y'); ?></span></p>
                                    <!--                                    <ul class="ratings">
                                    <?php
                                    $i = 0;


                                    $reviewcount = $productreviews->rating;

                                    for ($i = 1; $i <= $reviewcount; $i++) {
                                        ?>
                                                
                                                                                            <li><i class="fa fa-star"></i></li>
                                                
                                    <?php }
                                    ?>
                                                                        </ul>-->
                                    <?php echo $reviewcount . " Rating"; ?>
                                    <ul class="ratings">
                                        @if ($reviewcount)
                                        <?php
                                        $i = 0;
                                        for ($i = 1; $i <= $reviewcount; $i++) {
                                            ?>

                                            <li><i class="fa fa-star"></i></li>
                                        <?php } ?>
                                        <!--<li><i class="fa fa-star-half"></i></li>-->
                                        @else
                                        @endif
                                    </ul>

                                    <p><?php echo $productreviews->comment; ?></p>
                                     <!--    <p>{{ __('message.dummy_txt') }}</p> -->

                                <?php } ?>
                                <div class="orderpagination"><center>    {!! $productdetaildata->links() !!}</center></div>
                               
                                @if (!$productdetailreview->reviews()->where('user_id', auth()->id())->count() )
                                 <?php 
                                 if(Auth::user()){
                                 if($reviewaccess == $sn->product_id) {
                                     ?>
                                <h3>{{ __('message.Leave a review') }}</h3>
                                <form action="{{ route('reviews.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $sn->product_id }}" />
                                    <input type="hidden" name="role_id" value="{{ $sn->role_id }}" />
                                    <p>{{ __('message.Your rating') }}:</p>
                                    <input type="text" name="hedline" placeholder="{{ __('message.Review title') }}...">
                                    <input id="star-rating-demo" type="number" class="rating" min=0 max=5 step=0.1 data-size="lg">
                                    <!--<fieldset class="rating">-->
<!--                                    <ul class="rating">
                                        <legend>Please rate:</legend>
                                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
                                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
                                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
                                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                                    </ul>-->
                                    <!--</fieldset>-->

                                    <!--       <ul class="ratings">
                                               <input type="radio" value="1" name="rating"> <li><i class="fa fa-star"></i></li>
                                               <input type="radio" value="2" name="rating"> <li><i class="fa fa-star"></i></li>
                                               <input type="radio" value="3" name="rating"> <li><i class="fa fa-star"></i></li>
                                               <input type="radio" value="4" name="rating"> <li><i class="fa fa-star"></i></li>
                                               <input type="radio" value="5" name="rating"> <li><i class="fa fa-star"></i></li>
                                            </ul>-->
                                           <!--  <select name="rating">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option selected>4</option>
                                                <option>5</option>
                                            </select> -->
                                    <p>{{ __('message.Comment(optional)') }}:</p>
                                    <textarea name="comment"></textarea>
                                    <input type="submit" class="btn btn-primary" value="{{ __('message.Save rating') }}" />
                                </form>
                                     <?php } else { ?>
                                  <h3>{{ __('message.Leave a review') }}</h3>
                                 <!--<img src="{{ asset('/') }}public/images/error-not-purches.png" id="show-img">-->
                                    <p>Haven't purchased this product?</p>
                                    <p>Sorry! You are not allowed to review this product since you haven't bought it on Qubiee.</p>
                                
                                         <?php } } else { ?>
                                      <h3>{{ __('message.Leave a review') }}</h3>
                                   <a href="#" data-toggle="modal" data-target="#userLoginModal" class="btn btn-primary btn-rounded btn-lg guestCheckOutBtns">{{ __('message.Login') }} <i class="fa fa-arrow-circle-right"></i></a> 
                                <?php } ?>
                                @else
                                {{ __('message.you have got review') }}
                               
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="space15"><hr /></div>

	<?php 

	
	
	?>
	
	<div class="container">
        <!-- relatedProductsSection -->
        <div class="relatedProductsSection">
            <h3 class="heading-center"><span> Seller Products </span></h3>
            <div class="row relatedProducts">
                <div class="owl-carousel" id="relatedProductsSlider_seller">
					    <?php
						
                    foreach ($getproductsellerDataBy as $newproduct) {					
                        $urlnewname = $newproduct['product_name'];	
						
                        $newproductfullname = str_replace(' ', '-', $urlnewname);
                       $rel_pro_name = json_decode($newproduct['product_name'], true);
                        $rel_pro_name = $newproduct['product_name'];
						
					
                        ?>
                        <div class="item">
                            <div class="productBlock">
                                <a href="<?php echo url('/productdetails'); ?>/{{$newproduct['url'] }}" class="productBlockImg">
                                    <div style="background: url('{{ asset('/') }}/public/images/{{ $newproduct['product_image'] }}') no-repeat;"></div>
                                </a>
                                <div class="productBlockInfo">
                               
                                    <!--                                    <ul class="proRating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>-->
                                    
                                    <h2 class="propricing">$ {{ $newproduct['product_price'] }} 
                                         <?php if (!empty($newproduct['discount'] || $newproduct['discount'] != 0 || $newproduct['product_price'] != $newproduct['original_price'])) { ?>
                                        <small><strike>$<?php echo $newproduct['original_price']; ?></strike></small>
                                           
                                            <?php
                                        } else {
                                            
                                        }
                                        ?>
                                         
<!--                                    <p class="proinfo">{{ __('message.Earliest Delivery: Today') }}</p>-->
                                    <?php if (!empty($newproduct['discount'])) { ?>
                                        <span class="discountoffer">
                                            <?php echo $newproduct['discount']; ?> % {{ __('message.Off') }}
                                        </span>
                                        <?php
                                    } else {
                                        
                                    }
                                    ?>
                                    <a href="{{ url("/add-to-wishlist/{$newproduct['product_id']}") }}" class="wishlist-btn" title="{{ __('message.Add to Wishlist') }}"><i class="fa fa-heart"></i>{{ __('message.Add to Wishlist') }} </a>
                                </div>
                                <div class="productBlockViewDtl">
                                    <a href="<?php echo url('/productdetails'); ?>/{{$newproduct['url'] }}" class="btn1">{{ __('message.view details') }} <i class="fa fa-arrow-circle-right"></i></a>
                                    <a href="{{ url("/add-to-cart/{$newproduct['product_id']}") }}" class="btn2">{{ __('message.Buy Now') }}<i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?> 
                </div>
            </div>
        </div>
    </div>
</div>

    
<div class="container">
        <!-- relatedProductsSection -->
        <div class="relatedProductsSection">
            <h3 class="heading-center"><span>{{ __('message.Related products') }}</span></h3>
            <div class="row relatedProducts">
                <div class="owl-carousel" id="relatedProductsSlider">
                    <?php
                    foreach ($getAllRelatedproduct as $newproduct) {
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
                                 <?php  $countofdate = number_format($newproduct->reviews()->avg('rating'), 2);
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
                                    <a href="{{ url("/add-to-wishlist/{$newproduct->id}") }}" class="wishlist-btn" title="{{ __('message.Add to Wishlist') }}"><i class="fa fa-heart"></i>{{ __('message.Add to Wishlist') }} </a>
                                </div>
                                <div class="productBlockViewDtl">
                                    <a href="<?php echo url('/productdetails'); ?>/{{$newproduct->url }}" class="btn1">{{ __('message.view details') }} <i class="fa fa-arrow-circle-right"></i></a>
                                    <a href="{{ url("/add-to-cart/{$newproduct->id}") }}" class="btn2">{{ __('message.Buy Now') }}<i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?> 
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ __('message.Upload Custom Design') }}</h4>
            </div>
            <div class="modal-body">
                <!-- <div>
                       <ul>
                           <li><button class="btn btn-primary">Add Text</button>
                               <button class="btn btn-primary">Add logo</button>
                               <button class="btn btn-primary" id="show">Show Data</button>
                           </li>
                               
                       </ul>
       
                   </div> -->
                <!-- <form class="uploadImgContainer tshirtuploadingImg">
                    <div class="uploadLabelDiv">
                        <label for="uploadImgLabel" class="uploadImgLabel">
                            <i class="fa fa-image"></i>
                            <strong>{{ __('message.Click Image') }}</strong>
                            <input type="file" name="uploadImg" id="uploadImgLabel">
                        </label>
                    </div>
                    
                   
         
           
                    <div class="uploadImgPreview">
                       
                        <h4 class="headingFull"><span><i class="fa fa-eye"></i>{{ __('message.Preview') }} </span></h4>
        
                <!-- <div class="dragimage" id="dragimage"> -->
                <!-- <img src="" id="uploadImgPreviewDesign" style="border:1px solid red"> -->
                <?php
// foreach ($getProductimagedetails as $image) {
//     $lang_invitee = explode('|', $image->images_name);
//     foreach ($lang_invitee as $key => $value) {
                ?> 
                <!-- </div>  -->
               <!-- <img src="{{ asset('/') }}/public/images/" class="uploadImgPreviewFull" id="target" alt=""> -->
                <?php // } }    ?>
                <!-- <div id="data" class="well"></div> -->
<!--     <img src="assets/images/tshirt-men-full.png" alt="" class="uploadImgPreviewFull"> -->

                <!-- 
                </div>
                 <div id="tui-image-editor-container"></div> -->
                <!--</form> -->-->
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('message.Close') }}</button>
                <!-- <button type="button" class="btn btn-primary btn-lg"><i class="fa fa-shopping-cart"></i> Add to Cart</button> -->
                <a href="{{ url("/add-to-cart/{$sn->product_id}") }}" class="btn btn-primary btn-lg"><i class="fa fa-shopping-cart"></i>{{ __('message.Add To Cart') }} </a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}
</script>







































<!--

<div class="categoryInner">
    <div class="innerBannerSection productSubPageBanner">
    
       <div class="innerBannerImg" style="background: url('http://xtacky.com/assets/images/inner-banner.jpg') no-repeat center;">
            <div class="container">
                <h1><?php //echo ucwords($product_name)       ?> </h1>
            </div>
        </div>
    </div>
    
 ProductDescription 
<section class="ProductDescription">
    <div class="container">
        <div class="row">
<?php
foreach ($getProductdetails as $sn) {
//                     echo '<pre>';
//                      print_r($sn);
    ?>
                                        
                                        <div class="col-md-5">
                                            
                                            <div class="ProdDesc-Text">

                                                <h3><?php echo ucwords($sn->product_name); ?></h3>
                                                <div class="FrameworkWrapper">
    <?php
    foreach ($getMainCategory as $row) {
        $lang_typea = explode(',', $row->category_id);
        $lang_invitee = explode(',', $sn->main_category);
        if (in_array("$lang_typea[0]", $lang_invitee)) {
            $namecategory = ucwords($row->category_name);
            ?>
                                                                                                            <p class="Framework">
                                                                                                                <img src="/public/images/<?php echo $row->category_image; ?>" height="31px" width="31px" >
            <?php echo ucwords($row->category_name); ?>-
            <?php echo strtoupper($sn->sub_category_name); ?>


                                                                                                            </p>
            <?php
        }
    }
    ?>

                                                </div>
                                                                            <div class="reviews">
                                                                                <p class="rating">
                                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                
                                                                                </p>
                                                                                <div class="Div1">
                                                                                    <p>394</p>
                                                                                    <p>reviews</p>
                                                                                </div>
                                                                                <div class="Div2">
                                                                                    <p>7491</p>
                                                                                    <p>sales</p>
                                                                                </div>
                                                                                <div class="Div3">
                                                                                    <p>2548</p>
                                                                                    <p>collections</p>
                                                                                </div>
                                                                            </div>

                                                <div class="LiveDemo">
                                                    <div class="pricesection">
                                                        $<?php echo $sn->product_price; ?>

                                                        <span class="discountsection"><strike>$<?php echo $sn->original_price; ?></strike></span>

    <?php if (!empty($sn->discount)) { ?>
                                                                                    <span class="discountsectionprod">
        <?php echo $sn->discount; ?> % Off
                                                                                    </span>
        <?php
    } else {
        
    }
    ?>



                                                                                        
                                                                                        <span class="discountsectionprod">
    <?php //echo $sn->discount;    ?>% Off
                                                                                        </span>
                                                    </div>
                                                    <span class="productdiscription more">
    <?php echo $sn->product_description; ?>
                                                    </span>
                                                    <div class="space5"></div>
                                                                                        <button class="addtocart-btn" data-toggle="modal" data-target="#mycart-modal">
                                                                                        <i class="fa fa-shopping-cart"></i> Order Now</button>

                                                    <span class="LiveDemo">
                                                        <a class="addtocart-btn" href='{{ url("/add-to-cart/{$sn->product_id }") }}'><i class="fa fa-shopping-cart"></i> Order Now</a>
                                                                                            <a href="#" class="addtocart-btn">Live Demo&nbsp;
                                                                                            </a>
                                                    </span>
                                                    <input type="hidden" value="<?php echo $sn->product_id; ?>" id="pro_id">
                                                    <hr>
                                                </div>
    <?php
    //$p_id = $sn->product_id;
    $p_id = "";
    ?>
    <?php
//print_r($getaddonesproduct);
    if ($getaddonesproduct) {
        ?>
                                                                            <div class="AdditionalInfo" id="checkboxes">
                                                                                <p class="AdditionalText">
                                                                                    <b>Additional things to choose:</b>
                                                                                </p>
        <?php
//                                               foreach ($productdetailsaddones as $productaddones) { 
//                                               foreach ($getaddonesproduct as $getaddone) { 
////                                                    echo '<pre>';
////                                                    print_r($getaddone);
//                                                    $lang_typea = explode(',', $getaddone->product_id);
//                                            $lang_invitee= explode(',', $productaddones->id);
//                                              if (in_array("$lang_typea[0]", $lang_invitee))
//                                                         {
//                                                   $namecategory=ucwords($productaddones->product_name);
        ?>
                                                                                                                                <div class="AdditionalListWrapper">
                                                                                                                                    
                                                                                                                                    <label class="AdditionalList">
                                                                                                                                        <input type="checkbox" value="<?php //echo $getaddone->product_id;             ?>" class="check" name="addones<?php //echo $getaddone->product_id;             ?>">
                                                                                                                                        <span class="checkmark"></span>
                                                                                                                                    </label>
                                                                                                                                    <span class="AdditionalItem">+ <?php //echo $namecategory;           ?></span>
                                                                                                                                    <span class="price"><?php //echo $productaddones->product_price;           ?>$ <a class="addtocart-btn" href='{{ url("/add-to-cart/{ }") }}'><i class="fa fa-shopping-cart"></i> Add</a></span>
                                                                                                                                   
                                                                                                                                </div>
        <?php
//                                                 $p_id = $p_id.','.$getaddone->product_id;
//                                                 
//                                                 }}}
        ?>


        <?php
        foreach ($productdetailsaddones as $productaddones) {
            foreach ($getaddonesproduct as $getaddone) {
//                                                    echo '<pre>';
//                                                    print_r($getaddone);
                $lang_typea = explode(',', $getaddone->product_id);
                $lang_invitee = explode(',', $productaddones->id);
                if (in_array("$lang_typea[0]", $lang_invitee)) {
                    $namecategory = ucwords($productaddones->product_name);
                    ?>
                                                                                                                                                                    <div class="AdditionalListWrapper">
                                                                                                                                                                        <label class="AdditionalList">
                                                                                                                                                                            <input type="checkbox" name="a<?php echo $getaddone->product_id; ?>" class="check" value="<?php echo $getaddone->product_id; ?>">
                                                                                                                                                                            <span class="checkmark"></span>
                                                                                                                                                                        </label>
                                                                                                                                                                        <a target="blank" href="<?php echo url('/productdetails'); ?>/{{$productaddones->url }}"><span class="AdditionalItem">+ <?php echo $namecategory; ?></span></a>
                                                                                                                                                                        <span class="price">$<?php echo $productaddones->product_price; ?> </span>
                                                                                                                                                                            <span class="price"><?php //echo $productaddones->product_price;           ?>$ <a class="addtocart-btn" href='{{ url("/add-to-cart/{$getaddone->product_id }") }}'><i class="fa fa-shopping-cart"></i> Add</a></span>
                                                                                                                                                                                            <b>B<input type="checkbox" name="b" class="check" value="b"></b>
                                                                                                                                                                        <b>C<input type="checkbox" name="c" class="check" value="c"></b>
                                                                                                                                                                        <b>D<input type="checkbox" name="d" class="check" value="d"></b>
                                                                                                                                                                    </div>
                    <?php
                }
            }
        }
        ?>


                                                                                <input type="hidden" name="text" id="text">
        <?php //echo "Product ID - ".$p_id ;      ?>
                                                                                                                                <div class="AdditionalListWrapper">
                                                                                                                                    <label class="AdditionalList">
                                                                                                                                        <input type="checkbox">
                                                                                                                                        <span class="checkmark"></span>
                                                                                                                                    </label>
                                                                                                                                    <span class="AdditionalItem">+ Hosting</span>
                                                                                                                                    <span class="price">50$</span>
                                                                                                                                </div>
                                                                                                                                <div class="AdditionalListWrapper">
                                                                                                                                    <label class="AdditionalList">
                                                                                                                                        <input type="checkbox">
                                                                                                                                        <span class="checkmark"></span>
                                                                                                                                    </label>
                                                                                                                                    <span class="AdditionalItem">+ Prime SEO Pack</span>
                                                                                                                                    <span class="price">1000$</span>
                                                                                                                                </div>

                                                                            </div>

    <?php } ?>
                                                <div class="LiveDemo">
                                                    <a class="addtocart-btn" id='link' href='{{ url("/product-add-to-cart/{$sn->product_id }") }}'><i class="fa fa-shopping-cart"></i> Order Now</a>
                                                                                    <a href="product-description.html" class="addtocart-btn">
                                                                                        <i class="fa fa-heart-o"></i> Add to Collection</a>
                                                </div>
    <?php if (Auth::check()) { ?>
                                                                        <div class="LiveDemo">
                                                                            <a  class="addtocart-btn">
                                                                                <i class="fa fa-eye"></i> Live Demo</a>
                                                                        </div>
                                                                        
        <?php
    } else {
        
    }
    ?>
                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                                @if (\Session::has('ordersuccess'))
                                                <div class="alert alert-success">
                                                    <ul>
                                                        <li>{!! \Session::get('ordersuccess') !!}</li>
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </section>

                             ProducttabSection 
                             ProducttabSection 
                            <section class="ProducttabSection">
                                <div class="tabSection">

                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a data-toggle="tab" href="#Features">
                                                <i class="fa  fa-tachometer"></i>Template</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#Details">
                                                <i class="fa fa-cog"></i>Details</a>
                                        </li>
                                                            <li>
                                                                <a data-toggle="tab" href="#Reviews">
                                                                    <i class="fa fa-star"></i>Reviews</a>
                                                            </li>
                                                            <li>
                                                                <a data-toggle="tab" href="#Comments">
                                                                    <i class="fa fa-comment"></i>Comments</a>
                                                            </li>
    <?php if (Auth::check()) { ?>
                                                                    <li>
                                                                        <a data-toggle="tab" href="#Supports">
                                                                            <i class="fa fa-life-ring"></i>Support</a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-toggle="tab" href="#HireExpert">
                                                                            <i class="fa fa-user-circle-o"></i>Hire Expert</a>
                                                                    </li>
        <?php
    } else {
        
    }
    ?>


                                    </ul>

                                    <div class="container">
                                        <div class="tab-content">
                                            <div id="Features" class="tab-pane fade in active">
                                                <diV class="row">
                                                    <div class="col-sm-12">
                                                      
                                                        <div class="TabcontentWrapper TabLightBox">
                                                            <ul>
                                                                  <li>
                                                                    <a href="https://xtacky.com/public/images/{{ $sn->product_image}}" data-lightbox="roadtrip"> <img  src="https://xtacky.com/public/images/{{ $sn->product_image}}" /></a>
                                                                </li>
    <?php
//                                foreach ($getProductimagedetails as $image) {
//                                    $lang_invitee = explode('|', $image->images_name);
//
//                                    foreach ($lang_invitee as $key => $value) {
    ?>    
                                                                <li>
                                                                    <a href="https://xtacky.com/public/images/<?php //$value    ?>" data-lightbox="roadtrip"> <img  src="https://xtacky.com/public/images/<?php //$value    ?>" /></a>
                                                                </li> 
    <?php
//                                    }
//                                }
    ?>

                                                            </ul>
                                                        </div>

                                                    </div>
                                                </diV>
                                            </div>
                                            <div id="Details" class="tab-pane fade in ">
                                                <diV class="row">
                                                    <div class="col-sm-12">
                                                        <div class="TabcontentWrapper ThemeDetails">
                                                            <h3><?php echo $sn->details; ?></h3>
                                                            <div class="row">
                                                                                                            <div class="details-list ">
                                                                                                                <div class="col-sm-3">
                                                                                                                    <div class="Properties-left">
                                                                                                                        <p></p>
                                                                                                                        <p>WooCommerce Compatibility :</p>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-sm-9">
                                                                                                                    <span class="Properties-right">
                                                                                                                        <a href="#">3.0x</a>
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                                <div class="clear"></div>
                                                                                                            </div>
                                                                                                            <div class="details-list ">
                                                                                                                <div class="col-sm-3">
                                                                                                                    <div class="Properties-left">
                                                                                                                        <p>WordPress Compatibility :</p>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-sm-9">
                                                                                                                    <span class="Properties-right">
                                                                                                                        <a href="#">4.2.x-4.9.x</a>
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                                <div class="clear"></div>
                                                                                                            </div>
                                                                                                            <div class="details-list ">
                                                                                                                <div class="col-sm-3">
                                                                                                                    <div class="Properties-left">
                                                                                                                        <p>WordPress Engine :</p>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-sm-9">
                                                                                                                    <span class="Properties-right">
                                                                                                                        <a href="#">4.9.x</a>
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                                <div class="clear"></div>
                                                                                                            </div>
                                                                                                            <div class="details-list ">
                                                                                                                <div class="col-sm-3">
                                                                                                                    <div class="Properties-left">
                                                                                                                        <p>Additional Features :</p>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-sm-9">
                                                                                                                    <span class="Properties-right">
                                                                                                                        <a href="#">Calendar</a>
                                                                                                                        <a href="#">Commenting System</a>
                                                                                                                        <a href="#">Crossbrowser Compatibility</a>
                                                                                                                        <a href="#">Dropdown Menu</a>
                                                                                                                        <a href="#">Favicon</a>
                                                                                                                        <a href="#">Google map</a>
                                                                                                                        <a href="#">Social Options</a>
                                                                                                                        <a href="#">Product Carousel</a>
                                                                                                                        <a href="#">Banner Grid Manager</a>
                                                                                                                        <a href="#">Sidebar Manager</a>
                                                                                                                        <a href="#">Live Customizer</a>
                                                                                                                        <a href="#">SEO Optimization</a>
                                                                                                                        <a href="#">Related Posts</a>
                                                                
                                                                
                                                                
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                                <div class="clear"></div>
                                                                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </diV>
                                            </div>
                                            <div id="Reviews" class="tab-pane fade in ">
                                                <diV class="row">
                                                    <div class="col-sm-12">
                                                        <div class="TabcontentWrapper">

                                                            <h3>1258 REVIEWS & RATINGS</h3>
                                                            <p>
                                                                <b>
                                                                    <i class="fas fa-star"></i> Only buyers of that product can rate it</b>
                                                            </p>

                                                        </div>
                                                        <div class="ReviewWraper">
                                                            <div class="userWrapper">
                                                                <img src="assets/images/usericon.png" />
                                                                <span class="username">
                                                                    <b>username</b>
                                                                </span>
                                                                <span class="reviewDate">Sept 02, 2018</span>
                                                            </div>
                                                            <p>Donec vestibulum sagittis quam, eu mollis est vehicula non. Ut lobortis iaculis risus
                                                                sit amet convallis. Class aptent taciti sociosqu ad litora torquent per conubia nostra,
                                                                per inceptos himenaeos. Nunc a ullamcorper felis. Etiam sollicitudin, ex ac consequat
                                                                mattis, tortor libero iaculis mauris, quis pulvinar quam ante sed metus. Pellentesque
                                                                lacinia pellentesque ornare. Duis egestas turpis vel augue euismod, nec cursus dolor
                                                                faucibus. Vivamus malesuada odio in dignissim luctus.</p>
                                                        </div>
                                                    </div>
                                                </diV>
                                            </div>
                                            <div id="Comments" class="tab-pane fade in ">
                                                <diV class="row">
                                                    <div class="col-sm-12">
                                                        <div class="TabcontentWrapper">
                                                            <h1>Content Goes Here</h1>
                                                        </div>
                                                    </div>
                                                </diV>
                                            </div>
    <?php
    if (Auth::check()) {
        $uset_name = Auth::user()->name;
        $user_emaiid = Auth::user()->email;
        ?>
                                                                        <div id="Supports" class="tab-pane fade in ">
                                                                            <diV class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="TabcontentWrapper">
                                                                                        <h5>For Support </h5>
                                                                                        <form action="{{ url('support') }}" method="post">
                                                                                            {{ csrf_field() }}
                                                                                            <div class="row enquiry-Form">
                                                                                                <div class="col-sm-6 form-group">
                                                                                                    <label for="name">Name:</label>
                                                                                                    <input type="text" class="form-control" id="name" value="{{$uset_name}}" placeholder="Enter name" name="name" readonly="">
                                                                                                    <input type="hidden" value="<?php echo $sn->product_id; ?>" name="product_id" id="productid">
                                                                                                </div>
                                                                                                <div class="col-sm-6  form-group">
                                                                                                    <label for="contact">Contact:</label>
                                                                                                    <input type="tel" class="form-control" id="contact" placeholder="Enter contact no" name="mobile">
                                                                                                </div>
                                                                                                <div class="col-sm-6  form-group">
                                                                                                    <label for="email">Email:</label>
                                                                                                    <input type="email" class="form-control" id="email" value="{{$user_emaiid}}" placeholder="Enter email" name="email" readonly="">
                                                                                                </div>
                                                                                                <div class="col-sm-6  form-group">
                                                                                                    <label for="subject">Subject:</label>
                                                                                                    <input type="text" class="form-control" id="subject" placeholder="Subject"  name="subject">
                                                                                                </div>
                                                                                                <div class="col-sm-6  form-group">
                                                                                                    <label for="email">Product Name:</label>
                                                                                                    <input type="text" class="form-control" id="productname" value="<?php echo ucwords($sn->product_name); ?>" placeholder="Product Name" name="product_name" readonly="">
                                                                                                    <input type="hidden" value="<?php echo $sn->product_price; ?>" name="product_price" id="price">
                                                                                                </div>
                                                                                                <div class="col-sm-12  form-group">
                                                                                                    <label for="comment">Comment:</label>
                                                                                                    <textarea class="form-control"name="comment" rows="5" id="comment"></textarea>
                                                                                                </div>
                                                                                                <div class="col-sm-12 text-center">
                                                                                                    <button type="submit" class="btn addtocart-btn  btn-lg">Send</button>
                                                                                                    <button type="reset" class="btn addtocart-btn  btn-lg">Cancel</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </diV>
                                                                        </div>
                                                                     
                                                                       <div id="HireExpert" class="tab-pane fade in ">
                                                                            <diV class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="TabcontentWrapper">
                                                                                        <h5>Hire Expert</h5>
                                                                                        <form action="{{ url('expert') }}" method="post">
                                                                                            {{ csrf_field() }}
                                                                                            <div class="row enquiry-Form">
                                                                                                <div class="col-sm-6 form-group">
                                                                                                    <label for="name">Name:</label>
                                                                                                    <input type="text" class="form-control" id="name" value="{{$uset_name}}" placeholder="Enter name" name="name" readonly="">
                                                                                                    <input type="hidden" value="<?php echo $sn->product_id; ?>" name="product_id" id="productid">
                                                                                                </div>
                                                                                                <div class="col-sm-6  form-group">
                                                                                                    <label for="contact">Contact:</label>
                                                                                                    <input type="tel" class="form-control" id="contact" placeholder="Enter contact no" name="mobile">
                                                                                                </div>
                                                                                                <div class="col-sm-6  form-group">
                                                                                                    <label for="email">Email:</label>
                                                                                                    <input type="email" class="form-control" value="{{$user_emaiid}}" id="email" placeholder="Enter email" name="email" readonly="">
                                                                                                </div>
                                                                                                <div class="col-sm-6  form-group">
                                                                                                    <label for="subject">Subject:</label>
                                                                                                    <input type="text" class="form-control" id="subject" placeholder="Subject email"  name="subject" >
                                                                                                </div>
                                                                                                <div class="col-sm-6  form-group">
                                                                                                    <label for="email">Product Name:</label>
                                                                                                    <input type="text" class="form-control" id="productname" value="<?php echo ucwords($sn->product_name); ?>" placeholder="Product Name" name="product_name" readonly="">
                                                                                                    <input type="hidden" value="<?php echo $sn->product_price; ?>" name="product_price" id="price">
                                                                                                </div>
                                                                                                <div class="col-sm-12  form-group">
                                                                                                    <label for="comment">Comment:</label>
                                                                                                    <textarea class="form-control"name="comment" rows="5" id="comment"></textarea>
                                                                                                </div>
                                                                                                <div class="col-sm-12 text-center">
                                                                                                    <button type="submit" class="btn addtocart-btn  btn-lg">Send</button>
                                                                                                    <button type="reset" class="btn addtocart-btn  btn-lg">Cancel</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </diV>
                                                                        </div>
    <?php } ?>    

                                        </div>
                                    </div>

                                </div>
                            </section>
<?php } ?>
 Related Items Slider 

</div>-->
<?php
//echo View::make('dashboard-footer'); ?>
