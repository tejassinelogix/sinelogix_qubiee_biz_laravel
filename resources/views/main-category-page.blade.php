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
                $cat_Name = json_decode($catName, true);
                $catNameurlde = json_decode($catNameurl, true);
                echo $cat_Name[$language];
                //echo ucwords($categoryname); ?> </b></li>

            </ul>
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
        <div class="space10"></div>
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <!--sidebar-list-->
                <div class="sidebar-list">
                    <div class="row">
                        <div class="sidebar-list-content">
                            <div class="inner-sidebar-list">
                                <h3>{{ __('message.Filter By') }}:</h3> 
                              
                                                          <!--proice filter higer lower code here-->
                              <div class="sidebar-filter-box">
                                    <h4 class="sidebar-heading"><i class="fa fa-plus"></i>{{ __('message.Sort Price By') }}</h4>
                                     <div class="price-ranger">
                                         <div class="extra-controls-max">
                                             <input type="radio" value="#" name="chechkhigherprice" class="common_seleing_selector-higher" /> <label>Higher to Lower</label>
                                         </div>
                                         <div class="extra-controls-lower">
                                             <input type="radio" value="#" name="chechkhigherprice" class="common_seleing_selector-lawer" /> <label>Lower to  Higher</label>
                                         </div>
                                    </div>
                                </div>
                                                          <!--proice filter higer lower code here-->
                                
                                <div class="sidebar-filter-box">
                                    <h4 class="sidebar-heading"><i class="fa fa-plus"></i>{{ __('message.Price') }}</h4>
                                    <div class="price-ranger">
                                        <input type="hidden" id="hidden_minimum_price" value="0" />
                                        <input type="hidden" id="cateoryname" value="<?php echo $catNameurl; ?>" />
                                         <input type="hidden" id="pagename" value="<?php echo 'maincat'; ?>" />
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
                                           
                                        foreach (array_slice($getParentSubCategorycate,0,1) as $parentmaincat) {
                                           
                                       // $mcat_Name = json_decode($maincat->category_name, true);
                                        
                                        ?>
                                            <p>
                                                <input type="checkbox" value="<?php echo base64_encode($parentmaincat->category_parent_id); ?>" name="chechkmostselling" class="common_seleing_selector brandseling" />
                                                <label>
                                                    <span class="checkmark"></span>
                                                        <?php //echo strtoupper($mcat_Name[$language]); ?></label> 
                                            </p>
                                        <?php } ?>
<!--                                        <p> <input type="checkbox" value="0" name="chechkcategory" class="common_selector brand" />
                                            </p>-->
                                       
                                        <!--</form>-->
                                    </div>
                                </div>

                                  <!--old category filter code here-->
                                  <div class="sidebar-filter-box">
                                    <h4 class="sidebar-heading"><i class="fa fa-plus"></i>{{ __('message.Brand') }}</h4>
                                    <div>
                                        
                                        <?php 
                                        
                                        foreach ($getParentSubCategorycate as $maincat) {
     
                                        $mcat_Name = json_decode($maincat->category_name, true);
                                        
                                        ?>
                                            <p>
                                                <input type="checkbox" value="<?php echo base64_encode($maincat->category_id); ?>" name="chechkcategory" class="common_selector brand" />
                                                <label>
                                                    <span class="checkmark"></span>
                                                        <?php echo strtoupper($mcat_Name[$language]); ?></label> 
                                            </p>
                                        <?php } ?>
                                       
                                    </div>
                                </div>
                                                         <!--end old category filter code here-->
                                
                                
                                
<!--                                 <div class="left-menu">
                            <div class="leftBlockHeading">Price</div>
                            <div class="leftmenuList">
                                <div class="space10"></div>
                                	<h3>Price</h3>
					<input type="hidden" id="hidden_minimum_price" value="0" />
                    
                    <p id="price_show"></p>
                    <div class="price-ranger range-slide" id="price_range">
                        <input type="text" class="js-range-slider" id="pricerange1" name="example_name" value="" />
                                </div>
                                        <div class="extra-controls">
                        <button class="js-get-values pricesidebarbtn">Search</button>
                        
                        
                        <div class="result">
                            Result: <span class="js-result"></span>
                        </div>

</div>
                                <div class="space10"></div>
                            </div>
                        </div>-->
                                
                                
                                
                                
                                

                                <!--			                    <div class="sidebar-filter-box">
                                                                                <h4 class="sidebar-heading"><i class="fa fa-plus"></i>  Brand</h4>
                                                                                <div>
                                                                                    <form action="#" class="checkbox-radio-style1">
                                                                                        <p>
                                                                                            <input type="checkbox" id="brand1" />
                                                                                            <label for="brand1">Brand 1</label>
                                                                                        </p>
                                                                                        
                                                                                    </form>
                                                                                </div>
                                                                            </div>-->

                                <!--			                    <div class="sidebar-filter-box">
                                                                                <h4 class="sidebar-heading"><i class="fa fa-plus"></i>  Size</h4>
                                                                                <div>
                                                                                    <form action="#" class="checkbox-radio-style1">
                                                                                        <p>
                                                                                            <input type="checkbox" id="size1" />
                                                                                            <label for="size1">1</label>
                                                                                        </p>
                                                                                        
                                                                                    </form>
                                                                                </div>
                                                                            </div>-->

                                <!--			                    <div class="sidebar-filter-box">
                                                                                <h4 class="sidebar-heading"><i class="fa fa-plus"></i>  Discount (%)</h4>
                                                                                <div>
                                                                                    <form action="#" class="checkbox-radio-style1">
                                                                                        <p>
                                                                                            <input type="checkbox" id="discount1" />
                                                                                            <label for="discount1">0-10</label>
                                                                                        </p>
                                                                                        
                                                                                    </form>
                                                                                </div>
                                                                            </div>-->
                                <!--			                    <div class="sidebar-filter-box">
                                                                                <h4 class="sidebar-heading"><i class="fa fa-plus"></i>  Sorted by</h4>
                                                                                <div>
                                                                                    <form action="#" class="checkbox-radio-style1">
                                                                                        <p>
                                                                                            <input type="checkbox" id="sort1" />
                                                                                            <label for="sort1">Sorted 1</label>
                                                                                        </p>
                                                                                        
                                                                                    </form>
                                                                                </div>
                                                                            </div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--sidebar-list-->
            </div>
            <div class="col-md-9 col-sm-9" id="loading">
                <div class="item-list-tophead">				
					<?php
				    $total_pagination = $poductdata->lastPage();
					$current_page = app('request')->input('page');
					
					$default_page = 1;
					$product_count_right = $poductdata->count();
					$product_count_last = $product_count_right + 1;
					$product_count_last_right = $product_count_last + $product_count_right;
					
					if($default_page != $current_page){
						$default_page = $product_count_last;
					}
					
					if($default_page != $current_page){
						$product_count_right = $product_count_last_right;
					}
					
					if($default_page != $current_page && $current_page == $total_pagination){
						$temp_tot = $poductdata1->count() - $poductdata->count();
						$default_page = $temp_tot + 1;
						$product_count_right = $poductdata1->count();
					}
									
					?>
                    <h4><?php echo $cat_Name[$language]; ?> <span>(<?php echo $default_page; ?> - <?php echo $product_count_right; ?> of <?php echo $poductdata1->count();?> {{ __('message.Items') }})</span></h4>
                    <!--		            <div class="sorting-order">
                                                    <span>Sort By:</span>
                                                    <ul>
                                                        <li class="active-sortorder"><a href="#">Popularity</a></li>
                                                        <li><a href="#">Price Low to High <i class="fa fa-caret-up"></i></a></li>
                                                        <li><a href="#">Price High to Low <i class="fa fa-caret-down"></i></a></li>
                                                        <li><a href="#">Discount</a></li>
                                                        <li><a href="#">Fresh Arrival</a></li>
                                                    </ul>
                                                </div>-->
                </div>
                <div class="clear row innerproductCol" id="post-data">
               @include('dataproduct')
                </div>
                <div class="clear row innerproductCol" id="postfilterdata">
              
                </div>
            </div>
        </div>
    </div>
  
</div>
  <div class="ajax-load text-center" style="display:none">
            <p><img src="{{ URL::to('public/assets/images/ajax-loaderproduct.gif') }}"></p>
    </div>
 









