<?php
//echo "<pre>";
//print_r($products);
?>
<div class="innerPageSection">
    <div class="containerWrapper">
        <div class="breadcrumbs">
            <ul>
                <li><a href="index.php"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> </li>
                <li>{{ __('message.Order Confirmation') }}</li>
            </ul>
        </div>
        <div class="space10"></div>
        <!-- <div class="checkout-process-fig">
            <ul>
                <li><span>1</span><strong>Login / Register</strong></li>
                <li><span>2</span><strong>Confirm Address</strong></li>
                <li><span>3</span><strong>Review Order</strong></li>
                <li class="active-checkbox-process"><span>4</span><strong>Make Payment</strong></li>
            </ul>
        </div> -->
        <div class="success-msg-box">
            <i class="fa fa-check-circle"></i>
            <span>{{ __('message.Thank you') }} {{ $profile[0]->name }}!</span><br />
            {{ __('message.Your Order') }} (Order ID: {{ $order[0]->id }}) {{ __('message.has been placed successfully.') }}
            <div class="msg-box-close-btn"><i class="fa fa-close"></i></div>
        </div>

        <div class="order-confirmation-dtlsbox">
            <div class="pull-left">
                <h4><strong>{{ __('message.Your Order') }} ID: {{ $order[0]->id }}</strong>
                    <small>{{ __('message.Placed on') }}: {{ $order[0]->created_at }}</small></h4>
                <p>{{ __('message.Check your email') }}: <strong>{{ $profile[0]->email }}</strong></p>
            </div>
            <div class="pull-right">
                <!--<a href="{{ url('/downloadInvoicePDF/'.$orderdata.'') }}" target="_blank" class="btn btn-primary btn-lg">Download Invoice</a>-->
                <a href="{{ url('/downloadInvoicePDF') }}"  class="btn btn-primary btn-lg">{{ __('message.Download Invoice') }}</a>
                <a href="{{ url('/order') }}" class="btn btn-default2 btn-lg">{{ __('message.Go to My Orders') }}</a>
                <a href="{{ route('home') }}" class="btn btn-default2 btn-lg">{{ __('message.Continue Shopping') }} </a>
            </div>
        </div>

        <div class="space15"></div>

        <h3 class="headingFull"><span>{{ __('message.Order Summary') }}</span></h3>

        <div class="cartBlockRowHead">
            <div class="cartBlockDesc">
                <h3>{{ __('message.Item Description') }}</h3>
            </div>
            <div class="cartBlockRate">
                <h3>{{ __('message.Price') }} ($)</h3>
            </div>
            <div class="cartBlockQty">
                <h3>{{ __('message.Quantity') }}</h3>
            </div>
            <div class="cartBlockTotal">
                <h3>{{ __('message.Total') }}</h3>
            </div>
        </div>

        <!--                        @if(Session::has('cart'))-->

        @foreach($products as $product)
        <?php
//                        print_r($product['item'])
        ?>
        <!-- cartBlockRow  -->
        <div class="cartBlockRow">
            <div class="cartBlockDesc">
                <div class="cartBlockImg">
                    <img src="public/images/{{ $product['item']['product_image'] }}" alt="">
                </div>
                <h3><?php echo $product['item']['product_name'][$language]; ?></h3>
<!--                                <small>Color: Light Grey</small>-->
            </div>
            <div class="cartBlockRate">
                <p>$ {{ $product['item']['product_price'] }}</p>
            </div>
            <div class="cartBlockQty">
                <div id="myform2" class="qty-spinner">
                    <!--                                    <a href="{{ url('/reduce/'.$product['item']['id'].'') }}">
                                                             <button class="minus"><i class="fa fa-minus"></i></button> 
                                                            <input type="button" value="-" class="qtyminus" field="quantity2">
                                                        </a>-->

                    <input type="text" name="quantity2" value="{{ $product['qty'] }}" class="qty">
                    <!--                                    <a href="{{ url('/increase/'.$product['item']['id'].'') }}">
                                                             <button class="plus"><i class="fa fa-plus"></i></button> 
                                                            <input type="button" value="+" class="qtyplus" field="quantity2">
                                                        </a>-->
                </div>
            </div>
            <div class="cartBlockTotal">
                <p>$ {{ $product['qty'] * $product['item']['product_price'] }}</p>
                <!--<a href="{{ url('/remove/'.$product['item']['id'].'') }}"><button><i class="fa fa-close"></i></button></a>-->
            </div>
        </div>
        @endforeach
        <!--                        @endif-->
        <div class="cartBlockRowFooter">
            <div class="cartBlockRowFooterMargin">                
                <!--<p>Delivery and payment options can be selected later.</p>-->
            </div>
            <div class="cartBlockRowFooterLastCol">
                <div class="cartBlockRowFooterInfo">
                    <p>{{ __('message.Total') }}:</p>
                    <p>{{ __('message.Delivery Charges') }}:</p>
                </div>
                <div class="cartBlockRowFooterTotal">
                    <p>${{ $total }}</p>
                    <p>{{ __('message.Free') }}</p>
                </div>
                <div class="space5"><hr /></div>
                <div class="cartBlockRowFooterInfo">
                    <h4>{{ __('message.You Paid') }}:</h4>
                </div>
                <div class="cartBlockRowFooterTotal">
                    <h4><strong>${{ $total }}</strong></h4>
                </div>
            </div>
        </div>

    </div>        
</div>