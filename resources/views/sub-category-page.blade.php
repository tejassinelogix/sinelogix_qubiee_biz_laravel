<style>
/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.container.margin {
    margin-top: 90%;
}
</style>
<!-- End of navigationBar -->
<!-- category page section -->
<?php //dd($countProduct);?>
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


                            <div class="sidebar-filter-box">
                                <h4 class="sidebar-heading"><i class="fa fa-plus"></i>{{ __('message.Brand') }}</h4>
                                <div>
                                    <!--<form action="#" class="checkbox-radio-style1 active-sidebar-box">-->
                                        <?php

                                    //foreach (array_slice($getParentSubCategorycate,0,1) as $parentmaincat) {

                                    // $mcat_Name = json_decode($maincat->category_name, true);

                                    ?>
                                        <p>
                                            <input type="radio" checked value="<?php echo $id; ?>" name="chechkbrandfilter" class="common_subseleing_selector brandseling" />&nbsp;&nbsp;<?php echo ucwords($name) ?> - <?php echo ucwords($pro_name[$language]) ?>
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


                    <div class="item-list-tophead"><h4><?php echo ucwords($name) ?> - <?php echo ucwords($pro_name[$language]) ?> <span>(<?php echo $default_page; ?> - <?php echo $product_count_right; ?> of <?php echo $poductdata1->count();?> {{ __('message.Items') }})</span></h4></div>
                    <div class="row rightBlock" id="post-data">
                      <?php foreach ($poductdata as $catproduct) { ?>
                            <div class="col-sm-3 product-box-class">
                                <div class="productBlock productBlockCat">
                                    <?php
                                    $urlname = $catproduct->product_name;
                                    $productfullname = str_replace(' ', '-', $urlname);
//                                    $prod_name = json_decode($catproduct->product_name, true);
                                    ?>
                                    <a href="<?php echo url('/productdetails'); ?>/{{$catproduct->url }}" class="productBlockImg">
                                        <?php if (!empty($catproduct->discount)|| $catproduct->discount !=0) { ?>
                                        <span class="discountoffer">
                                        <?php echo $catproduct->discount; ?> % {{ __('message.Off') }}
                                        </span>
                                            <?php
                                        } else {

                                        }
                                        ?>
                                        <div style="background: url('/public/images/{{ $catproduct->product_image }}') top no-repeat;"></div>
                                    </a>
                                    <div class="productBlockInfo">
                                        <a href="<?php echo url('/productdetails'); ?>/{{$catproduct->url }}" class="titlelink"><?php echo ucwords($catproduct->product_name[$language]); ?></a>
                                    <?php  $countofdate = number_format($catproduct->reviews()->avg('rating'), 2);
                                       ?>
                                    <ul class="ratings">
                                        @if ($catproduct->reviews()->count())
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
                                        <!--                                         <ul class="proRating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                       </ul>-->
                                         <div class="loaderWrapperAjax loader-wrapper<?php echo $catproduct->id;?>" style="display: none;"><img src="{{ URL::to('public/assets/images/ajax-loader.gif') }}"></div>
                                        <div class="productInfoMsgAlert addtowishmessage<?php echo $catproduct->id;?>" ></div>
                                        <button  data-id="<?php echo $catproduct->id;?>" class="wishlist-btn addtowishlist"> {{ __('message.Add to Wishlist') }}  </button>

                                        <h2 class="propricing">
                                            ${{ $catproduct->product_price }}
                                           <?php

                                        if (!empty($catproduct->discount || $catproduct->discount != 0 || $catproduct->product_price != $catproduct->original_price)) { ?>
                                        <small style="text-decoration: line-through;">${{ $catproduct->original_price }}</small>
                                      <?php
                                        } else {

                                        }
                                        ?>

                                        </h2>
                                    </div>
                                    <div class="productBlockViewDtl">
                                        <a href="<?php echo url('/productdetails'); ?>/{{$catproduct->url }}" class="btn1">{{ __('message.view details') }} <i class="fa fa-arrow-circle-right"></i></a>
                                        <a href="{{ url("/add-to-cart/{$catproduct->id}") }}" class="btn2" onClick="AddToCarts()">{{ __('message.Add To Cart') }} <i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    <div class="clear row innerproductCol" id="postfilterdata">
                    </div>
					<div class="container margin">
					<div class="row">
					<div class="pagination">{{ $poductdata->links() }}</div>
					</div>
					</div>

                    </div>
                    

                </div>
            </div>
              <!--<div class="ajax-load text-center" style="display:none">
            <p><img src="{{ URL::to('public/assets/images/ajax-loaderproduct.gif') }}"></p>
             </div>-->
        </div>
    </div>
</div>


