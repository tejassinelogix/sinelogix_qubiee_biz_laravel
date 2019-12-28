<div class="innerPageSection cartPageSection">
  <div class="containerWrapper">
      
    <div class="breadcrumbs">
          <ul>
              <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> </li>
<!--              <li><a href="product-categories.php"> Cups / Mugs</a><i class="fa fa-angle-right"></i></li>
              <li><a href="product-details.php"> Set amet lorem ipsum bouquet</a><i class="fa fa-angle-right"></i></li>-->
              <li>{{ __('message.shopping cart') }}</li>
          </ul>
      </div>
         <?php if($cart->items){?>
       @if(Session::has('cart'))
      <!--<a href="{{ url('/removeAll') }}" class="totalCartRemoveBtn pull-right"><i class="fa fa-trash-o"></i> Empty </a>-->
       <button class="wave-effect btn btn-danger btn-bordred wave-light  pull-right remove"><i class="fa fa-trash-o"></i> Empty</button> 

         @endif
         <?php } ?>
      <div class="space10"></div>
     
       @if (\Session::has('subscribe_success_guest'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('subscribe_success_guest') !!}</li>
                                </ul>
                            </div>
                            @endif
      <h3 class="heading-center"><span><i class="fa fa-shopping-cart"></i> {{ __('message.My Cart') }}  | <small> {{ __('message.Item') }}</small></span></h3>
      <div class="cartBlockRowHead">
        <div class="cartBlockDesc" style="width: 30%;">
          <h3>{{ __('message.Item Description') }}</h3>
        </div>
        <div class="cartBlockRate">
          <h3>{{ __('message.Price') }} ($)</h3>
        </div>
        <div class="cartBlockQty">
          <h3>{{ __('message.Quantity') }}</h3>
        </div>
        <div class="cartBlockCoupon">
          <h3>{{ __('message.Coupon') }}</h3>
        </div>
           <div class="cartBlockWrap">
               <h3>Put in a Gift Box <span data-toggle="tooltip" data-placement="left" title="You can add up to maximum 3 items in the box">(?)</span></h3>
        </div>
        <div class="cartBlockTotal">
          <h3>{{ __('message.Total') }}</h3>
        </div>
      </div>
   <?php if($cart->items){?>
      @if(Session::has('cart'))
 <?php $index=0; ?> 
    @foreach($products as $product)
    
    <?php
//    $index+=0;
     $index++;
//    echo "<pre>";
//    print_r($cart);
//    echo $language;
//    echo $product['item']['product_name'][$language];
//    echo $product['item']['product_price'];
//    echo $product['item']['id'];
//    echo $product['qty'];
//    echo "<pre>";
//    print_r($product['item']);
//    print_r($product);
//    die;
    
    ?>
<!--       <form action="" method="post">
            {{ csrf_field() }}-->
       <!--cartBlockRow--> 
      <div class="cartBlockRow" id="cartBlockRow_{{ $product['item']['id'] }}">
        <div class="cartBlockDesc" style="width: 30%;">
          <div class="cartBlockImg">
            <img src="public/images/{{ $product['item']['product_image'] }}" alt="">

          </div>
         
                      <h3>
                  <a href="<?php echo url('/productdetails'); ?>/{{$product['item']['url'] }}"><?php echo $product['item']['product_name'][$language]; ?>
                                  </a>
          
                                </h3>
            
          <!--<small>Color: Light Grey</small>-->
        </div>
          
        <div class="cartBlockRate">
          <p>$ {{ $product['item']['product_price'] }}</p>
        </div>
        <div class="cartBlockQty">
            <?php if($product['item']['as_gift_wrap']== 0){
                if($product['giftwraping']==1){ 
                      
                    if($product['qty'] == 3){
                        $disabled="disabled"; 
                      $tollketvalue="data-toggle='tooltip' data-placement='left' title='Gift wraspping more than 3 item not applicable'";
                    }else{
                      $disabled=""; 
                      $tollketvalue="data-toggle='tooltip' data-placement='left' title='Gift wraspping more than 3 item not applicable'";  
                    }
                }  else {
                        $disabled="";
                        $tollketvalue="";
                           }
                             
                
                ?>
          <div id="myform2" class="qty-spinner">
                    <!--<a href="{{ url('/reduce/'.$product['item']['id'].'') }}">-->
                    <a  class="decermentitem<?php //echo $disabled; ?>" data-id="{{$product['item']['id']}}" id="decermentitem{{$product['item']['id']}}" <?php //echo $tollketvalue; ?> >
                        <button class="minus decermentitembtn"><i class="fa fa-minus"></i></button>
                        <!--<input type="button" value="-" class="qtyminus" field="quantity2">-->
                    </a>
                 
                    <input type="text"  name="quantity2" value="{{ $product['qty'] }}" class="qty cart_quantity_input" id="qtyinc{{$product['item']['id']}}">
                    <!--<a href="javascript:void(0)" data-route="{{url('/increase/'.$product['item']['id'].'')}}" class="cart_quantity_up" >-->
                    <!--<a href="{{ url('/increase/'.$product['item']['id'].'') }}" class="plus">-->
                    <a  class="plus incermentitem<?php echo $disabled; ?>" data-id="{{$product['item']['id']}}" id="incermentitem{{$product['item']['id']}}" <?php echo $tollketvalue; ?>>
                        <button class="plus incermentitembtn"><i class="fa fa-plus"></i></button>
                        <!--<input type="button" value="+" class="qtyplus" field="quantity2">-->
                    </a>
                </div>
            <?php } ?>
            
        </div>

        <!-- TDS : Coupan Starts -->
        <div class="cartBlockCoupon" >
          <p><input type="text" name="coupon_code" id="coupon_code_<?php echo $product['item']['id']; ?>" class="coupon_code" value="" style="width: 60%;"><button type="button" class="btn btn-success btn-sm coupon_apply" product_id="<?php echo $product['item']['id']; ?>" id="coupon_apply_<?php echo $product['item']['id']; ?>"><i class="fa fa-check"></i></button><button type="button" class="btn btn-danger btn-sm coupon_cancel" id="coupon_cancel_<?php echo $product['item']['id']; ?>" product_id="<?php echo $product['item']['id']; ?>"><i class="fa fa-times"></i></button></p>
          <span class="success_green" id="success_green_<?php echo $product['item']['id']; ?>">Coupan code applied successfully..!</span>
          <span class="error_red one_time_error" id="one_time_error_<?php echo $product['item']['id']; ?>"></span>
          <span class="error_red is_validity_error" id="is_validity_error_<?php echo $product['item']['id']; ?>"></span>
          <span class="error_red is_minimum_error" id="is_minimum_error_<?php echo $product['item']['id']; ?>"></span>
          <span class="error_red is_specific_error" id="is_specific_error_<?php echo $product['item']['id']; ?>"></span>
          <span class="additional_product_details_<?php echo $product['item']['id']; ?>" main_category="<?php echo $product['item']['main_category']; ?>" sub_category="<?php echo $product['item']['sub_category']; ?>"
            product_id="<?php echo $product['item']['id']; ?>">
        </div>
        <!-- TDS : Coupan Ends -->
          <div class="cartBlockWrap" id="cartBlockWrap<?php echo $product['item']['id']; ?>" >
               <?php if($product['item']['gift_wrapping']==1){
                    if($product['giftwraping']==1){ 
                      $checked="checked";    
                    }  else {
                        $checked="";    
                           }
                             ?>
              <label for="giftWrap<?php echo $product['item']['id']; ?>" class="giftWrap"><input class="giftwrappingcheck" type="checkbox" name="giftwrapping[{{$index-1}}]" id="giftWrap<?php echo $product['item']['id']; ?>" value="<?php echo $product['item']['wraping_charage']; //echo 'giftwrap'.'-'.$product['item']['id']; ?>" data-toggle="tooltip" data-placement="left" title="Click to add up to 3 items in box" <?php echo $checked; ?> product_id="<?php echo $product['item']['id']; ?>" unchecked='unchecked'><i class="fa fa-gift"></i></label>
          <!--<input type="checkbox" class="giftwrappingcheck"  name="giftwrapping[{{$index-1}}]" id="giftwrapping<?php //echo $product['item']['id']; ?>" value="<?php //echo 'giftwrap'.'-'.$product['item']['id']; ?>" checked>-->
                              <?php  
                              }else{?>
                  <label for="giftWrapHidden" class="giftWrapHidden" style="disply:none"></label>
          <!--<input type="checkbox" class="giftwrappingcheck" name="giftwrapping[{{$index-1}}]" id="giftwrapping<?php //echo $product['item']['id']; ?>" value="<?php //echo 'giftwrap'.'-'.$product['item']['id']; ?>">-->
          <?php } ?>
        </div>
        <div class="cartBlockTotal">
            <p class="loaditemtotal" id="loaditemtotal{{$product['item']['id']}}">$ {{ $product['qty'] * $product['item']['product_price'] }}</p>
            <p class="ajaxitemtotal" id="ajaxitemtotal{{$product['item']['id']}}"></p>
          <a href="{{ url('/remove/'.$product['item']['id'].'') }}" class="totalCartRemoveBtn"><i class="fa fa-close"></i></a>
        </div>
         
      </div>
       @endforeach
      @else
      <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
          <h1>{{ __('message.Empty cart') }} </h1>
          <a href="{{ route('home') }}" class="btn btn-primary btn-rounded btn-lg">{{ __('message.Start Shopping') }} </a>
        </div>
      </div>
      @endif
      <span id="giftwrapmessage" style="color: red"></span>
   <?php }?>
      
        <div class="cartBlockRowFooter">
            <div class="cartBlockRowFooterMargin">                
                <!--<p>Delivery and payment options can be selected later.</p>-->
            </div>
               <?php if($cart->items) { ?>
            @if(Session::has('cart'))
            <div class="cartBlockRowFooterLastCol">
                <div class="cartBlockRowFooterSendgift">
                    <label for="sendasgift" class="sendasgift">
                        <?php 
                        if($giftcart==0)
                            {
                           $checked="";
                            }else{
                              
                            $checked="checked";
                               }
                        ?>
                        <input type="checkbox" name="sendasgift" id="sendasgift" value="1" class="sendasgiftitem" <?php echo $checked; ?>><p>Send as Gift</p> <i class="fa fa-gift" aria-hidden="true"></i><span class="checkmark"></span>
                     </label>
                     
                </div>
                <div class="cartBlockRowFooterInfo">
                    <p>{{ __('message.Total') }}</p>
                    <p>Gift Box</p>
                    <p>{{ __('message.Delivery Charges') }}:</p>
                </div>
                <div class="cartBlockRowFooterTotal">
                    <p id="loadtotalprice">$ {{ $totalPrice }}</p>
                    <p id="ajaxtotalprice"> </p>
                    <p id="loadgiftboxtotal">$ <?php echo abs($giftboxtotal); ?></p>
                    <p id="ajaxgiftboxtotal"> </p>
                    <p id="loaddeliverycharge"><?php 
                    $dilverychargeitem=0;
                    if($dilverycharge ==0){?>
                        {{ __('message.Free') }}
                    <?php }else{?>
                        $ <?php echo $dilverychargeitem=abs($dilverycharge); ?>                       
                    <?php } ?>
                    </p>
                    <p id="ajaxdeliverycharge">
                    </p>
                </div>
                <!--<div class="space5"><hr /></div>-->
                <div class="cartBlockRowFooterInfo">
                    <h4>{{ __('message.You Pay') }}:</h4>
                </div>
                <div class="cartBlockRowFooterTotal">
                    <h4 id="loadtotalpay"><strong>$ {{ $totalPrice+$dilverychargeitem+$giftboxtotal }}</strong></h4>
                    <h4 id="ajaxtotalpay"><strong>$ {{ $totalPrice+$dilverychargeitem+$giftboxtotal }}</strong></h4>
                </div>
                
               
                <div class="space10"></div>
                 <?php 
                if (Auth::user()) { ?>  
                <!--<button type="submit" class="btn btn-primary btn-rounded btn-lg guestCheckOutBtns">{{ __('message.Checkout') }} <i class="fa fa-arrow-circle-right"></i></button>-->
                 <a href="{{ route('checkout') }}" class="btn btn-primary btn-rounded btn-lg guestCheckOutBtns">{{ __('message.Checkout') }} <i class="fa fa-arrow-circle-right"></i></a>
                 <?php  } else {?>
                   <a href="#" data-toggle="modal" data-target="#userLoginModal" class="btn btn-primary btn-rounded btn-lg guestCheckOutBtns">{{ __('message.Checkout') }} <i class="fa fa-arrow-circle-right"></i></a>   
             <?php    } ?>
                  
                <br>
                <?php 
                if (Auth::user()) { ?>    
         
            <?php  } else { ?>
                <a href="{{ route('guest-checkout') }}" class="btn btn-primary btn-rounded btn-lg guestCheckOutBtns">{{ __('message.Guest Checkout') }} <i class="fa fa-arrow-circle-right"></i></a>
                         <?php } ?>
                  
                <!--<a href="{{ url("/add-to-cart/91") }}" class="btn btn-primary btn-rounded btn-lg"> {{ __('message.as Gift Wrapping') }} <i class="fa fa-shopping-cart"></i></a>-->
                <br>
                <a href="{{ route('home') }}" class="btn btn-primary btn-rounded btn-lg">{{ __('message.Continue Shopping') }} </a>
                
            </div>
             <!--</form>-->
            @endif
               <?php } ?>
        </div>
  </div>
</div>



<?php //die; ?>

