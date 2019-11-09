
<!-- End of navigationBar -->
<!-- category page section -->
<div class="categoryInner">
    <div class="innerBannerSection productSubPageBanner">

        <div class="innerBannerImg" style="background: url('http://xtacky.com/assets/images/inner-banner.jpg') no-repeat center;">
            <!--            <div class="container">
                            <h1><?php //echo ucwords($product_name)       ?> </h1>
                        </div>-->
        </div>
    </div>
    <!-- breadcrumbs -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">

                    <ul>
                        <li><a href="<?php echo url('/'); ?>"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> </li>
                        <?php
                        $pro_name = json_decode($product_name, true);
                        ?>
                        <li><a href="<?php echo url('/'); ?>/<?php echo strtolower($product_url); ?>"><?php echo ucwords($pro_name[$language]) ?></a> <i class="fa fa-angle-right"></i> </li>
                        <li><b><?php echo strtoupper($name) ?></b></li>
                    </ul>
                </div>
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
    <div class="categoryMainSection">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
<!--                    <div class="inner-sidebar-list sidebarNew">
                        <div class="leftBlockHeading"><?php //echo ucwords($pro_name[$language]) ?> </div>
                        <div class="leftmenuList">
                            <ul>
                                <?php
                               // foreach ($getCategoryproduct as $catproduct) {
                                   // $cat_pro_name = json_decode($catproduct->product_name, true);
                                    ?>
                                    <li>
                                        <a href="<?php //echo url('/productdetails'); ?>/<?php //$catproduct->url ?>"><?php //echo ucwords($cat_pro_name[$language]); ?></a>
                                    </li>
                                <?php //} ?>
                            </ul>
                        </div>
                    </div>-->
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
                                        <input type="hidden" id="cateoryname" value="<?php echo $id; ?>" />
                                        <input type="hidden" id="pagename" value="<?php echo 'subcat'; ?>" />
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
                                                <input type="checkbox" value="<?php echo $id; ?>" name="chechkmostselling" class="common_subseleing_selector brandseling" />
                                                <label>
                                                    <span class="checkmark"></span>
                                                         </label> 
                                            </p>
                                        <?php //} ?>

                                    </div>
                                </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="item-list-tophead"><h4><?php echo ucwords($name) ?> - <?php echo ucwords($pro_name[$language]) ?></h4></div>
                    <div class="row rightBlock" id="post-data">                        
                       @include('sub-cat-product-ajax')

                    </div>
                    <div class="clear row innerproductCol" id="postfilterdata">
              
                </div>

                </div>
            </div>
              <div class="ajax-load text-center" style="display:none">
            <p><img src="{{ URL::to('public/assets/images/ajax-loaderproduct.gif') }}"></p>
             </div>
        </div>
    </div>
</div>

