<style>
#searchloaders{
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
</style>
<?php
$abc;
//echo "<pre>";
// print_r($getParentSubCategorycate);
?>
<div id="searchloaders"></div>
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
		<div class="container">
        <div class="row">
            <div class="col-md-12">
               
            </div>
        </div>
        <div class="proListView">
			<div class="rightView">
				<p>Change view:</p>
				<ul>
				    <li><a class="proListViewBtns gridColViewBtn" href="#"><i class="fa fa-th-large"></i></a></li>	
                    <li><a class="proListViewBtns rowColViewBtn" href="#"><i class="fa fa-list"></i></a></li>
					
				</ul>
			</div>
		</div>
    </div>
    
        <div class="space10"></div>
        <div class="row">
		<div class="col-md-3 col-sm-3">
		 <div class="inner-sidebar-list sidebarNew">
                        <h3>{{ __('message.Filter By') }}:</h3> 
                        <div class="sidebar-filter-box">
                                    <h4 class="sidebar-heading"><i class="fa fa-plus"></i>{{ __('message.Sort Price By') }}</h4>
                                     <div class="price-ranger">
                                         <div class="extra-controls-max">
                                             <input type="radio" value="#" name="chechkhigherprice" class="common_sub_selector-higher" /> <label>Higher to Lower</label>
                                         </div>
                                         <div class="extra-controls-lower">
                                             <input type="radio" value="#" name="chechkhigherprice" class="common_sub_selector-lawer" /> <label>Lower to  Higher</label>
                                         </div>
                                    </div>
                                </div>
                          <div class="sidebar-filter-box">
                                    <h4 class="sidebar-heading"><i class="fa fa-plus"></i>{{ __('message.Price') }}</h4>
                                    <div class="price-ranger">
                                        <input type="hidden" id="hidden_minimum_price" value="0" />
                                        <input type="hidden" id="cateoryname" value="<?php //echo $id; ?>" />
                                        <input type="hidden" id="pagename" value="<?php //echo 'subcat'; ?>" />
                                        <p id="price_show"></p>
                                        <div class="price-ranger range-slide" id="price_range">
                                            <input type="text" class="js-range-slider" id="pricerange1" name="example_name" value="" />
                                        </div>
                                        <div class="extra-controls">
                                            <button class="js-get-values pricesidebarbtn">{{ __('message.Price Search') }}</button>
                                        </div>
                                        
                                        
<!--                                        <div class="price-ranger">
                                            <p><strong>Price</strong></p>
                                            <input type="text" id="pricerange1" name="example_name" value="" />
                                        </div>-->
                                    </div>
                                </div>
                        <div class="sidebar-filter-box">
                                    <h4 class="sidebar-heading"><i class="fa fa-plus"></i>{{ __('message.Most Selling') }}</h4>
                                    <div>
                                        <!--<form action="#" class="checkbox-radio-style1 active-sidebar-box">-->
                                            <?php 
                                           
                                        //foreach (array_slice($getParentSubCategorycate,0,1) as $parentmaincat) {
                                           
                                       // $mcat_Name = json_decode($maincat->category_name, true);
                                        
                                        ?>
                                            <p>
                                                <input type="checkbox" value="<?php //echo $id; ?>" name="chechkmostselling" class="common_subseleing_selector brandseling" />
                                                <label>
                                                    <span class="checkmark"></span>
                                                         </label> 
                                            </p>
                                        <?php //} ?>

                                    </div>
                                </div>

                            
                            <div class="sidebar-filter-box">
                                <h4 class="sidebar-heading"><i class="fa fa-plus"></i>{{ __('message.Brand') }}</h4>
                                <div>
                                    <!--<form action="#" class="checkbox-radio-style1 active-sidebar-box">-->
                                        <?php 
                                        
                                    //foreach (array_slice($getParentSubCategorycate,0,1) as $parentmaincat) {
                                        
                                    // $mcat_Name = json_decode($maincat->category_name, true);
                                    
                                    ?>
                                        <p>
                                            <input type="radio" checked value="<?php //echo $id; ?>" name="chechkbrandfilter" class="common_subseleing_selector brandseling" />&nbsp;&nbsp;<?php //echo ucwords($name) ?> - <?php //echo ucwords($pro_name[$language]) ?>
                                            <label>
                                                <span class="checkmark"></span>
                                                        </label> 
                                        </p>
                                    <?php //} ?>

                                </div>
                            </div>
                                
                    </div>
		</div>
             <div class="col-md-9 col-sm-9" id="loading">
                <div class="item-list-tophead">
                    <!--<h4><?php //echo $cat_Name[$language]; ?> <span>(60 Items)</span></h4>-->
                  
                </div>
                <div class="clear row innerproductCol">
                     
                    <?php
                    if(isset($details)){
                    $total_pagination = $details->lastPage();
					$total_pagination = $details->lastPage();
					$current_page = app('request')->input('page');					
					$default_page = 1;		
				    $product_count_right = $details->count();
					$product_count_last = $product_count_right + 0;
					$product_count_last_right = $product_count_last;
				
					if($default_page != $current_page){
					$default_page = $product_count_last;
					$temp_tot = $poductdata1->count() - $details->count();
					$default_page = $temp_tot - 4;
					$product_count_right = $poductdata1->count();
					}
					
					if($default_page != $current_page){
						$product_count_right = $product_count_last_right;
					}
					
					if($default_page != $current_page && $current_page == $total_pagination){
						$temp_tot = $poductdata1->count() - $details->count();
						$default_page = $temp_tot + 1;
						$product_count_right = $poductdata1->count();
                    			}
                    
					    if($default_page == 0){
						$default_page = 1;
					    }
                    ?>
                    <div class="item-list-tophead"><h4> <span><?php echo $default_page; ?> - <?php echo $product_count_right; ?> of <?php echo $poductdata1->count();?> {{ __('message.Items') }}</span></h4></div>
                    <?php 
                        
                    foreach ( $details as $catproduct) {                       
                         
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
                                    <a href="<?php echo url('/add-to-cart'); ?>/<?php echo $catproduct->id; ?>" class="btn2" onclick="searchCart()"><?php echo __('message.Buy Now'); ?><i class="fa fa-shopping-cart"></i></a>
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
                    <?php if(isset($details) && !empty( $details)) { ?>
                        <div class="pagination">{{ $details->links() }}</div>
                    <?php } ?>
					</div>
					</div>
					<script>
				function searchCart(){
					document.getElementById('searchloaders').style.display="block";
				}
				</script>
				










