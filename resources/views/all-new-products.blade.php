 
    <!-- category page section -->
    <div class="categoryInner">
        <div class="innerBannerSection productSubPageBanner">
            <div class="innerBannerImg" style="background: url('http://xtacky.com/assets/images/inner-banner.jpg') no-repeat center;">
<!--                <div class="container">
                    <h1><?php //echo ucwords( $categoryname)?> Products</h1>
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
                            <li><b><?php echo ucwords($categoryname);?> </b></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="categoryMainSection">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="left-menu">
                            <div class="leftBlockHeading"><?php echo ucwords($categoryname);?> Products</div>
                           
                            <div class="leftmenuList">
                                <ul>
                                 <?php foreach ($getNewproduct as $maincat){									
                                      
                                                $urlnewname=trim($maincat->product_name); 
                                                $newproductfullname=str_replace(' ', '-',$urlnewname);
                                                
                                    ?>
                                    <li>
                                        <a href="<?php echo url('/productdetails'); ?>/{{$maincat->url }}"><?php echo ucwords( $maincat->product_name);?></a>
                                    </li>
                                  <?php } ?>
                                   <!--  <li>
                                        <a href="#">Featured Items</a>
                                    </li>
                                    <li>
                                        <a href="#">Business & Services</a>
                                    </li>
                                    <li>
                                        <a href="#">Real Estate</a>
                                    </li>
                                    <li>
                                        <a href="#">Design & Photography</a>
                                    </li>
                                    <li>
                                        <a href="#">Cars & Motorcycles</a>
                                    </li>
                                    <li>
                                        <a href="#">Medical</a>
                                    </li>
                                    <li>
                                        <a href="#">Food & Restaurant</a>
                                    </li>
                                    <li>
                                        <a href="#">Magazine & News</a>
                                    </li>
                                    <li>
                                        <a href="#">IT & Software</a>
                                    </li>
                                    <li>
                                        <a href="#">Construction</a>
                                    </li>
                                    <li>
                                        <a href="#">Fashion</a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="space10"></div>
<!--                        <div class="left-menu">
                            <div class="leftBlockHeading">Price</div>
                            <div class="leftmenuList">
                                <div class="space10"></div>
                                <div class="price-ranger">
                                    <input type="text" id="pricerange1" name="example_name" value="" />
                                </div>
                                <div class="space10"></div>
                            </div>
                        </div>-->
                        <div class="space10"></div>
                        <div class="left-menu">
                            <div class="leftBlockHeading">Features</div>
                            <div class="leftmenuList">
                                <div class="AdditionalListWrapper">
                                    <label class="AdditionalList">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="AdditionalItem">Responsive </span>
                                </div>
                                <div class="AdditionalListWrapper">
                                    <label class="AdditionalList">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="AdditionalItem">Portfolio </span>
                                </div>
                                <div class="AdditionalListWrapper">
                                    <label class="AdditionalList">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="AdditionalItem">Parallax </span>
                                </div>
                                <div class="AdditionalListWrapper">
                                    <label class="AdditionalList">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="AdditionalItem">Bootstrap </span>
                                </div>
                            </div>
                        </div>
                        <div class="space10"></div>
<!--                        <div class="left-menu">
                            <div class="leftBlockHeading">Types</div>
                            <div class="leftmenuList">
                                <ul>
                                    <li>
                                        <a href="main-category-page.html">WordPress Themes</a>
                                    </li>
                                    <li>
                                        <a href="main-category-page.html">Joomla Templates </a>
                                    </li>
                                    <li>
                                        <a href="main-category-page.html">PrestaShop Theme</a>
                                    </li>
                                    <li>
                                        <a href="main-category-page.html">Magento Themes </a>
                                    </li>
                                    <li>
                                        <a href="main-category-page.html">Website Templates</a>
                                    </li>
                          
                                </ul>
                            </div>
                        </div>-->
                    </div>
                    <div class="col-md-9">

                        <div class="row rightBlock">
                            <div class="leftBlockHeading">Recently Added <?php echo ucwords( $categoryname);?> Products</div>
                            <div class="space10"></div>
                            <div class="space10"></div>
                   <?php foreach ($getNewproduct as $maincat){ 
                        $urlnewname=trim($maincat->product_name); 
                                                $newproductfullname=str_replace(' ', '-',$urlnewname);
                       ?>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="product-box">
                                    <a href="<?php echo url('/productdetails'); ?>/{{$maincat->url }}" class="productImgBlock imglink">
                                        <span>
                                            <i class="fa fa-search"></i>
                                        </span>

                                        <div class="productImg" style="background: url('https://xtacky.com/public/images/{{ $maincat->product_image }}') top no-repeat;"></div>
                                    </a>
                                    <div class="productDisc">
                                        <a href="<?php echo url('/productdetails'); ?>/{{$maincat->url }}" class="titlelink"><?php echo ucwords($maincat->product_name); ?></a>
                                       <!--  <div class="producBlockInfoIntro">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>

                                        </div> -->
<!--                                        <ul class="ratings">
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star-half"></i>
                                            </li>
                                        </ul>-->
                                        <!-- <strong class="ServiceCost">$500</strong> -->
                                        <span class="services-btns maincatpage">
                                            <a href="<?php echo url('/productdetails'); ?>/{{$maincat->url }}" class="addtocart-btn">
                                                <ion-icon name="eye"></ion-icon>View Details</a>
<!--                                            <a href="#" class="addtocart-btn">Live Demo&nbsp;
                                            </a>-->
                                        </span>
                                    </div>
                                </div>
                            </div>
                   <?php } ?>
                   
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

   
