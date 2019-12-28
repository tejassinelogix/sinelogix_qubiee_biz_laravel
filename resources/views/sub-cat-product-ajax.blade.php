  <style>
#loaderss{
 border: 16px solid #f3f3f3;
   border-radius: 50%;
   border-top: 16px solid blue;
  
   border-bottom: 16px solid blue;
   
   width: 90px;
   height: 90px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  position: absolute;
  z-index: 99;
  display: none;
  margin-left: 40%;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.pagination {
    margin-top: 31%;
}
.container.margin {
    margin-top: 42%;
}
</style>
<div id="loaderss"></div>         
  <!--?php foreach ($poductdata as $catproduct) { ?>
                            <div class="col-sm-3 product-box-class">
                                <div class="productBlock productBlockCat">
                                    <--?php
                                    $urlname = $catproduct->product_name;
                                    $productfullname = str_replace(' ', '-', $urlname);
//                                    $prod_name = json_decode($catproduct->product_name, true);
                                    ?>
                                    <a href="<--?php echo url('/productdetails'); ?>/{{$catproduct->url }}" class="productBlockImg">
                                        <--?php if (!empty($catproduct->discount)|| $catproduct->discount !=0) { ?>
                                        <span class="discountoffer">
                                        <--?php echo $catproduct->discount; ?> % {{ __('message.Off') }}
                                        </span>
                                            <--?php
                                        } else {
                                            
                                        }
                                        ?>
                                        <div style="background: url('/public/images/{{ $catproduct->product_image }}') top no-repeat;"></div>
                                    </a>
                                    <div class="productBlockInfo">
                                        <a href="<--?php echo url('/productdetails'); ?>/{{$catproduct->url }}" class="titlelink"><?php echo ucwords($catproduct->product_name[$language]); ?></a>
                                    <--?php  $countofdate = number_format($catproduct->reviews()->avg('rating'), 2);
                                       ?>  
                                    <ul class="ratings">
                                        @if ($catproduct->reviews()->count())
                                        <--?php
                                        $i = 0;
                                        $k= 0;
                                        $var = (int)$countofdate;
                                        $remiangstar = 5-$var;
                                        for ($i = 1; $i <= $countofdate; $i++) {
                                             
                                            ?>
                                         <li><i class="fa fa-star"></i></li>
                                        <--?php }   for ($k = 1; $k <= $remiangstar; $k++) {?>
                                            <li><i class="fa fa-star-o"></i></li>
                                        <--?php }?>
                                        <!--<li><i class="fa fa-star-o"></i></li>-->
                                        @else
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        @endif
                                    </ul>
                                        <!--                                         <ul class="proRating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                       </ul>-->
                                         <div class="loaderWrapperAjax loader-wrapper<!--?php echo $catproduct->id;?>" style="display: none;"><img src="{{ URL::to('public/assets/images/ajax-loader.gif') }}"></div>
                                        <div class="productInfoMsgAlert addtowishmessage<--?php echo $catproduct->id;?>" ></div>
                                        <button  data-id="<--?php echo $catproduct->id;?>" class="wishlist-btn addtowishlist"> {{ __('message.Add to Wishlist') }}  </button>
                                        
                                        <h2 class="propricing">
                                            ${{ $catproduct->product_price }}
                                           <--?php
                                        
                                        if (!empty($catproduct->discount || $catproduct->discount != 0 || $catproduct->product_price != $catproduct->original_price)) { ?>
                                        <small style="text-decoration: line-through;">${{ $catproduct->original_price }}</small> 
                                      <---?php
                                        } else {
                                            
                                        }
                                        ?>
                                        
                                        </h2>                                        
                                    </div>
                                    <div class="productBlockViewDtl">
                                        <a href="<--?php echo url('/productdetails'); ?>/{{$catproduct->url }}" class="btn1">{{ __('message.view details') }} <i class="fa fa-arrow-circle-right"></i></a>
                                        <a href="{{ url("/add-to-cart/{$catproduct->id}") }}" class="btn2" onClick="cart()">{{ __('message.Add To Cart') }} <i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        <--?php } ?-->
						
						<script>
						
						
						function cart(){
							document.getElementById('loaderss').style.display="block";
						}
						</script>
						
					<div class="container margin">
					<div class="row">						
					<div class="pagination">{{ $poductdata->links() }}</div>
					</div>
					</div>
