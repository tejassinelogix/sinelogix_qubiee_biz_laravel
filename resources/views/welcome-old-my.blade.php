
    <!-- bannerSection -->
    <div class="bannerSection">
        <div class="owl-carousel" id="bannerSlider">
         <?php foreach ($getBannerslider  as $sn) 
         {
           // $destinationPath = public_path('images');
           // echo $destinationPath ;
          
               ?>             
            <div class="item">
                <div class="bannerSliderImg" style="background: url('public/images/{{ $sn->product_image }}') no-repeat center;">
                    <a href="<?php echo url('product/productdetails'); ?>/{{ $sn->url }}" class="banner-info">
                        <div class="bannerWrapper">
                            <h2 class="bannerInfoHeading" data-animation="animated zoomInRight"> {{ $sn->short_description }}
                            </h2>
                            <button href="<?php echo url('product/productdetails'); ?>/{{ $sn->url }}" class="btn btn-lg">Shop Now!
                            </button>
                        </div>
                    </a>
                </div>
            </div>
          <?php } ?>
     
        </div>
    </div>
   
    <!-- end of tab section -->
    
    
    <!-- New Product Section -->
    <div class="newProductSection">
        <div class="container">
            <div class="row">
                <div>
                    <h2 class="heading-center">New</h2>
                </div>
                <div class="owl-carousel" id="newproductslider">
                      <?php foreach ($getNewproduct  as $newproduct) {?>
                    <div class="item">
                        <?php
                                                $urlnewname=trim($newproduct->product_name); 
                                                $newproductfullname=str_replace(' ', '-',$urlnewname);
                                                ?>
                        <div class="product-box">
                            <a href="<?php echo url('index/productdetails'); ?>/{{$newproductfullname }}" class="productImgBlock imglink">
                                <span>
                                    <i class="fa fa-search"></i>

                                </span>

                                <div class="productImg" style="background: url('public/images/{{ $newproduct->product_image }}') top no-repeat;"></div>
                            </a>
                            <div class="productDisc">
                                <a href="<?php echo url('index/productdetails'); ?>/{{$newproductfullname }}" class="titlelink"><?php echo ucwords( $newproduct->product_name); ?></a>
                                <div class="producBlockInfoIntro">
                                    <p><?php echo ucwords($newproduct->short_description);?></p>

                                </div>
<!--                                <ul class="ratings">
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
                                <strong class="ServiceCost">{{ $newproduct->product_price }}</strong>
                                  <br>
                                <strong class="ServiceCost"><strike>{{ $newproduct->original_price }}</strike></strong>
                                <span class="services-btns">
                                    <a href="<?php echo url('index/productdetails'); ?>/{{$newproductfullname }}" class="addtocart-btn">
                                        View Details</a>
<!--                                    <a href="#" class="addtocart-btn">Live Demo&nbsp;
                                    </a>-->
                                </span>
                            </div>
                        </div>
                    </div>
                          <?php }?>
                </div>
            </div>
<div class="viewAll text-center">
                    <a href="<?php echo url('/'); ?>/new" class="btn btn-transparent btn-lg">View All &nbsp;<i class="fa fa-th-list"></i></a>
                </div>
        </div>
    </div>
     <!-- tab section -->
     
     
         <!-- New Product Section -->
    <div class="newProductSection">
        <div class="container">
            <div class="row">
                <div>
                    <h2 class="heading-center">Offers</h2>
                </div>
                <div class="owl-carousel" id="offerslider">
                      <?php foreach ($getProductoffers  as $offerproduct) {?>
                    <div class="item">
                        <?php
                                                $urloffname=trim($offerproduct->product_name); 
                                                $offproductfullname=str_replace(' ', '-',$urloffname);
                                                ?>
                        <div class="product-box">
                            <a href="<?php echo url('index/productdetails'); ?>/{{$offproductfullname }}" class="productImgBlock imglink">
                                <span>
                                    <i class="fa fa-search"></i>

                                </span>

                                <div class="productImg" style="background: url('public/images/{{ $offerproduct->product_image }}') top no-repeat;"></div>
                            </a>
                            <div class="productDisc">
                                <a href="<?php echo url('index/productdetails'); ?>/{{$offproductfullname }}" class="titlelink"><?php echo ucwords( $offerproduct->product_name); ?></a>
                                <div class="producBlockInfoIntro">
                                    <p><?php echo ucwords($offerproduct->short_description);?></p>

                                </div>

                                <strong class="ServiceCost">{{ $offerproduct->product_price }}</strong>
                                  <br>
                                <strong class="ServiceCost"><strike>{{ $offerproduct->original_price }}</strike></strong>
                                <span class="services-btns">
                                    <a href="<?php echo url('index/productdetails'); ?>/{{$offproductfullname }}" class="addtocart-btn">
                                        View Details</a>
<!--                                    <a href="#" class="addtocart-btn">Live Demo&nbsp;
                                    </a>-->
                                </span>
                            </div>
                        </div>
                    </div>
                          <?php }?>
                </div>
            </div>
<div class="viewAll text-center">
                    <a href="<?php echo url('/'); ?>" class="btn btn-transparent btn-lg">View All &nbsp;<i class="fa fa-th-list"></i></a>
                </div>
        </div>
    </div>
     <!-- tab section -->
     
     <!-- tab section -->
    <div class="tabSection">
        <div class="container">
            <div class="row">
                <div>
                    <h2 class="heading-center">Featured</h2>
                </div>
                <?php foreach ($getFetureproduct  as $featureproduct) {?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                    <div class="product-box">
                          <?php
                                                $urlname=trim($featureproduct->product_name); 
                                                $productfullname=str_replace(' ', '-',$urlname);
                                                ?>
                        <a href="<?php echo url('index/productdetails'); ?>/{{$productfullname }}" class="productImgBlock imglink">
                            <span>
                                <i class="fa fa-search"></i>
                            </span>

                            <div class="productImg" style="background: url('public/images/{{ $featureproduct->product_image }}') top no-repeat;"></div>
                        </a>
                        <div class="productDisc">
                            <a href="<?php echo url('index/productdetails'); ?>/{{$productfullname }}" class="titlelink"><?php echo ucwords( $featureproduct->product_name);?></a>
                            <div class="producBlockInfoIntro">
                                <p><?php echo ucwords( $featureproduct->short_description );?></p>

                            </div>
<!--                            <ul class="ratings">
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
                            <strong class="ServiceCost">{{ $featureproduct->product_price }}</strong>
                            <br>
                            <strong class="ServiceCost"><strike>{{ $newproduct->original_price }}</strike></strong>
                            <span class="services-btns">
                                <a href="<?php echo url('index/productdetails'); ?>/{{$productfullname }}" class="addtocart-btn">
                                    View Details</a>
<!--                                <a href="#" class="addtocart-btn">Live Demo&nbsp;
                                </a>-->
                            </span>
                        </div>
                    </div>
                </div>
                <?php }?>

            </div>
            <div class="viewAll text-center">
                    <a href="<?php echo url('/'); ?>/feature" class="btn btn-transparent btn-lg">View All &nbsp;<i class="fa fa-th-list"></i></a>
                </div>
        </div>
    </div>
    <!-- searchboxSection -->
    <div class="searchboxSection">
        <div class="container">
            <div class="row">
                <div class="searchboxText">
                    <h2>Premium Website Templates That Perfectly Fit Your Business</h2>
                    <h5>For the last 8 years, we helped to create usable and attractive websites based on our templates
                        for more than hundreds of businesses.
                    </h5>
                </div>
                <!-- <div class="searchboxBlock">
                    <form class="searchbox" action="#">
                        <input type="text" placeholder="Search Your Theme" name="search">
                        <button type="submit"><i class="fa fa-search"></i>&nbsp; <span>Search</span></button>
                    </form>
                </div> -->
                <div class="cateory-icon-list-Block">
                    <div class="col-md-3 col-sm-6">
                        <a class="icon-box">
                            <span class="businessIcon"></span>
                            <h3>Business & Services</h3>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a class="icon-box">
                            <span class="designIcon"></span>
                            <h3>Design & Photography</h3>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a class="icon-box">
                            <span class="fationIcon"></span>
                            <h3>Fashion & Beauty</h3>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a class="icon-box">
                            <span class="travelIcon"></span>
                            <h3>Sports, Outdoors & Travel</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <?php //echo View::make('dashboard-footer'); ?>