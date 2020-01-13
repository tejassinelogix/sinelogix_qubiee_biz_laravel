<?php
// echo "<pre>";
//     print_r($address);
// print_r($profile);
?>

<div class="innerPageSection">
    <div class="containerWrapper">
        <div class="breadcrumbs">
            <ul>
                <li><a href="<?php echo url('/'); ?>"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i></li>
                <li><a href="{{ url('/shopping-cart') }}">{{ __('message.shopping cart') }}</a> <i class="fa fa-angle-right"></i></li>
                <li>{{ __('message.checkout') }}</li>
            </ul>
            <!--            <ul>
                            <li><a href="index.php"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> </li>
                            <li><a href="product-categories.php"> Cups / Mugs</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="product-details.php"> Set amet lorem ipsum bouquet</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="shopping-cart.php"> Shopping Cart</a> <i class="fa fa-angle-right"></i></li>
                            <li>Checkout</li>
                        </ul>-->
        </div>
        <div class="space10"></div>

        <!--        <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                    {{ csrf_field() }}-->
        <!-- checkOutTablayout -->
        <div class="checkOutTablayout">

            <!-- checkOutTabs -->
            <div class="checkOutTabs">
                <ul class="nav nav-tabs" role="tablist">
                    <!-- <li role="presentation" class="active">
                        <a href="#LoginRegister" aria-controls="LoginRegister" role="tab" data-toggle="tab">
                            <span>1</span>
                            <strong>Login / Register</strong>
                        </a>
                    </li> -->
                    <?php
                    if($giftcart){
                        $senderactive="active";
                        $reciver="";
                        $activeclass="class='active'";
                         $activeclassforaddess="";
                        ?>
                    <li role="presentation" <?php echo $activeclass; ?>>
                        <!--<a href="#" data-toggle="modal" data-target="#senderDetailsModal">-->
                        <a href="#senderDetailsModal" aria-controls="senderDetailsModal" role="tab" data-toggle="tab">
                            <span><i class="fa fa-gift"></i></span>
                            <strong>Sender/Receiver Details</strong>
                        </a>
                    </li>
                     <?php }  else {
                         $senderactive="";
                        $reciver="active";

                        $activeclass="";
                         $activeclassforaddess="class='active'";
                    }
                    ?>

                    <li role="presentation" <?php echo $activeclassforaddess; ?>>
                        <a href="#ConfirmAddress" aria-controls="ConfirmAddress" role="tab" data-toggle="tab">
                            <span>1</span>
                            <strong>{{ __('message.Confirm Address') }}</strong>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#ReviewOrder" aria-controls="ReviewOrder" id="ReviewOrderTab" role="tab" data-toggle="tab">
                            <span>2</span>
                            <strong>{{ __('message.Review Order') }}</strong>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#MakePayment" id="MakePaymentTab" aria-controls="MakePayment" role="tab" data-toggle="tab">
                            <span>3</span>
                            <strong>{{ __('message.Make Payment') }}</strong>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane <?php echo $senderactive; ?>" id="senderDetailsModal">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                             <div class="space15"></div>
                                <div class="col-sm-12 text-center">

                                    <?php if ($giftcart == 1 ) { ?>
                                     <!--<a href="#ReviewOrder" id="nextreview" class="btn btn-primary btn-lg btn-rounded" aria-controls="ReviewOrder" role="tab" data-toggle="tab" aria-expanded="false">{{ __('message.Continue') }} <i class="fa fa-arrow-circle-right"></i>
                                        </a>-->
                                            <?php if($shippingmark == 1){?>
                                            <div class="col-sm-12 text-center">
                                         <a href="#ConfirmAddress"  id="nextConfirmAddress" class="btn btn-primary btn-lg btn-rounded" aria-controls="ConfirmAddress" role="tab" data-toggle="tab" aria-expanded="false">{{ __('message.Next') }} <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                     <?php  }else{ ?>
                                          <button type="button" data-toggle="modal" data-target="#senderDetailsModalOpen" class="btn btn-default2 btn-lg btn-rounded">Addd Sender Address <i class="fa fa-arrow-circle-right"></i></button>
                                      <?php }
                                     } else {   ?>

        <!--                                        <a href="#ReviewOrder" id="nextreviewnogift" class="btn btn-primary btn-lg btn-rounded" aria-controls="ReviewOrder" role="tab" data-toggle="tab" aria-expanded="false">{{ __('message.Continue') }} <i class="fa fa-arrow-circle-right"></i>
                                        </a>-->
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div role="tabpanel" class="tab-pane active" id="LoginRegister">
                    <div class="row">
                        <div class="col-md-offset-3 col-sm-6">
                            <div class="col-sm-6">
                                <h4 class="headingFull"><span>New Customer Register</span></h4>
                                <p>We will send order details to this email address</p>
                                <button class="btn btn-default2 btn-lg btn-rounded" data-toggle="modal" data-target="#myModal"><i class="fa fa-sign-in"></i> Register Now!</button>
                            </div>
                            <div class="col-sm-6">
                                <div class="login-block">
                                    <h4 class="heading-center"><span>Login</span></h4>
                                    <label>Username</label>
                                    <input type="text" required="required" class="inputRounded" />
                                    <label>Password</label>
                                    <input type="password" required="required" class="inputRounded" />
                                    <div class="space5"></div>
                                    <a href="#" class="btn btn-primary btn-lg btn-rounded btn-full">Sign In  <i class="fa fa-arrow-circle-right"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> -->
                <div role="tabpanel" class="tab-pane <?php echo $reciver; ?>" id="ConfirmAddress">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="addressShippingSelect">
                                        <?php if ($profile && isset($profile[0]->address)) { ?>
                                            <h5><i class="fa fa-user"></i>{{ $profile[0]->name }}</h5>
                                            <p><i class="fa fa-map-marker"></i><?php if(isset($profile[0]->address)){ ?> {{ $profile[0]->address }}, {{ $profile[0]->locality }} <?php }else{ } ?></p>
                                            <p><?php if(isset($profile[0]->state)){ ?> {{ $profile[0]->state }}, {{ $profile[0]->country }}. <?php }else{ } ?></p>
                                            <p><i class="fa fa-phone"></i> Phone: <strong><?php if(isset($profile[0]->contact)){ ?> {{ $profile[0]->contact }} <?php }else{ } ?></strong></p>
                                            <div class="pretty p-svg p-plain">
                                                <input id="0" type="checkbox" name="address" class="chb"  onclick='f1(this.id)'/>
                                                <div class="state">
                                                    <img class="svg" src="{{ asset('/') }}public/assets/images/task.svg">
                                                    <label>{{ __('message.Select this address') }}</label>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <p>{{ __('message.Please update your profile and proceed to checkout') }}</p>
                                        <?php } ?>
                                        <!--                                        <label class="radio-btn">Select this address
                                                                                    <input id="0" type='radio' name="address"  onclick='f1(this.id)' />
                                                                                    <span class="checkmark"></span>
                                                                                  </label>-->
                                        <div class="footerAddressShipping">
                                            <div class="btn-del">
                                                <!-- <a href="#"><i class="fa fa-close"></i>{{ __('message.Delete') }}</a> -->
                                            </div>
                                            <div class="btn-edit">
                                                <!--<a href="confirm-address.php#" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i> Edit</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @foreach($address as $add)
                                <div class="col-sm-4">
                                    <div class="addressShippingSelect">
                                        <h5><i class="fa fa-user"></i>{{ $add->name }}</h5>
                                        <p><i class="fa fa-map-marker"></i>{{ $add->address }}, {{ $add->city }}</p>
                                        <p>{{ $add->state }}, {{ $add->country }}.</p>
                                        <p><i class="fa fa-phone"></i> Phone: <strong>{{ $add->phone }}</strong></p>


                                        <div class="pretty p-svg p-plain">
                                            <input id="{{ $add->id }}" type="checkbox" name="address" class="chb"  onclick='f1(this.id)'/>
                                            <div class="state">
                                                <img class="svg" src="{{ asset('/') }}public/assets/images/task.svg">
                                                <label>{{ __('message.Select this address') }}</label>
                                            </div>
                                        </div>
                                        <?php if ($giftcart == 1 && $totalQty > 1) { ?>
                                            <label>{{ __('message.Send As Gift') }}</label>
                                            <input type="radio" class="rdCheck" name="send_as_gift" id="1" value="1" onclick='f2(this.id)'>
                                        <?php } else { ?>

                                        <?php } ?>
                                        <!--                                        <div class="pretty p-default p-curve">
                                                                                    <input id="{{ $add->id }}" type="checkbox" name="address" class="chb" onclick='f1(this.id)'/>
                                                                                    <div class="state">
                                                                                        <label>Select this address</label>
                                                                                    </div>
                                                                                </div>-->

                                        <!--                                        <label class="radio-btn">Select this address
                                                                                    <input id="{{ $add->id }}" class="radio-btn" name="address" type='radio' onclick='f1(this.id)' />
                                                                                    <span class="checkmark"></span>
                                                                                  </label>-->


                                        <!--<button class="btn btn-default2 btn-rounded btn-sm" onClick="">Select this address</button>-->
                                        <!--<input class="btn btn-default2 btn-rounded btn-sm" value="Select this address">-->
<!--                                        <input id="{{ $add->id }}" class="radio-btn" name="address" type='radio' onclick='f1(this.id)' />
                                        <lable class="btn btn-default2 btn-rounded btn-sm">Select this address</lable>-->
                                        <div class="footerAddressShipping">
                                            <div class="btn-del">
                                                <a href="{{ url("/delete-address/{$add->id}") }}"><i class="fa fa-close"></i>{{ __('message.Delete') }}</a>
                                            </div>
                                            <div class="btn-edit">
                                                <!--<a href="confirm-address.php#" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i> Edit</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <?php
                                foreach ($products as $product) {

                                    $gift_wrapping = $product['item']['gift_wrapping'];
                                }
                                ?>



                                <div class="space15"></div>
                                <div class="col-sm-12 text-center">
                                    <a href="{{ url('/shopping-cart') }}" class="btn btn-default btn-lg btn-rounded">{{ __('message.Back') }} <i class="fa fa-arrow-circle-left"></i></a>
                                    <?php  if ($giftcart == 1) { ?>
                                    <a href="#senderDetailsModal" id="backsenderDetailsModal" class="btn btn-default btn-lg btn-rounded" aria-controls="senderDetailsModal" role="tab" data-toggle="tab" aria-expanded="false">{{ __('message.Back') }} <i class="fa fa-arrow-circle-left"></i></a>
                                    <?php } ?>
                                    <button type="button" data-toggle="modal" data-target="#add-new" class="btn btn-default2 btn-lg btn-rounded">{{ __('message.Add New Address') }}  <i class="fa fa-arrow-circle-right"></i></button>
                                    <?php if ($giftcart == 1 && $totalQty > 1) { ?>
                                        <a href="#ReviewOrder" id="nextreview" class="btn btn-primary btn-lg btn-rounded" aria-controls="ReviewOrder" role="tab" data-toggle="tab" aria-expanded="false">{{ __('message.Continue') }} <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    <?php } else { ?>
                                        <a href="#ReviewOrder" id="nextreviewnogift" class="btn btn-primary btn-lg btn-rounded" aria-controls="ReviewOrder" role="tab" data-toggle="tab" aria-expanded="false">{{ __('message.Continue') }} <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="ReviewOrder">

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

                    @if(Session::has('cart'))

                    @foreach($products as $product)

                    <!-- cartBlockRow  -->
                    <div class="cartBlockRow">
                        <div class="cartBlockDesc">
                            <div class="cartBlockImg">
                                <img src="public/images/{{ $product['item']['product_image'] }}" alt="">
                            </div>
                            <?php if ($product['item']['as_gift_wrap'] == 0) { ?>
                                <h3>
                                    <a href="<?php echo url('/productdetails'); ?>/{{$product['item']['url'] }}"><?php echo $product['item']['product_name'][$language]; ?>
                                    </a>
                                </h3>
                            <?php } else { ?>
                                <h3>
                                    <?php echo $product['item']['product_name'][$language]; ?>
                                </h3>
                            <?php } ?>
                         <!--<small>Color: Light Grey</small>-->
                        </div>
                        <div class="cartBlockRate">
                            <p>$ {{ $product['item']['product_price'] }}</p>
                        </div>
                        <div class="cartBlockQty">
                            <?php if ($product['item']['as_gift_wrap'] == 0) { ?>
                                <div id="myform2" class="qty-spinner">
                                    <a href="{{ url('/reduce/'.$product['item']['id'].'') }}">
                                        <button class="minus"><i class="fa fa-minus"></i></button>
                                       <!--<input type="button" value="-" class="qtyminus" field="quantity2">-->
                                    </a>

                                    <input type="text" name="quantity2" value="{{ $product['qty'] }}" class="qty">
                                    <a href="{{ url('/increase/'.$product['item']['id'].'') }}">
                                        <button class="plus"><i class="fa fa-plus"></i></button>
                                       <!--<input type="button" value="+" class="qtyplus" field="quantity2">-->
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="cartBlockTotal">
                            <p>$ {{ $product['qty'] * $product['item']['product_price'] }}</p>
                            <a href="{{ url('/remove/'.$product['item']['id'].'') }}" class="totalCartRemoveBtn"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                            <h1>{{ __('message.Empty cart') }} </h1>
                        </div>
                    </div>
                    @endif
                    <div class="cartBlockRowFooter">
                        <div class="cartBlockRowFooterMargin">
                            <!--<p>{{ __('message.Delivery and payment options can be selected later.') }}</p>-->
                        </div>
                        @if(Session::has('cart'))
                        <div class="cartBlockRowFooterLastCol">
                            <div class="cartBlockRowFooterInfo">
                                <p>{{ __('message.Total') }}</p>
                                <p>{{ __('message.Delivery Charges') }}:</p>
                            </div>
                            <div class="cartBlockRowFooterTotal">
                                <p>{{ $total }}</p>
                                <p>{{ __('message.Free') }}</p>
                            </div>
                            <div class="space5"><hr /></div>
                            <div class="cartBlockRowFooterInfo">
                                <h4>{{ __('message.You Pay') }}:</h4>
                            </div>
                            <div class="cartBlockRowFooterTotal">
                                <h4><strong>$ {{ $total }}</strong></h4>
                            </div>
                            <div class="space10"></div>
                            <div class="col-sm-12 text-center">
                                <a href="#ConfirmAddress" id="backreview" class="btn btn-default btn-lg btn-rounded" aria-controls="ConfirmAddress" role="tab" data-toggle="tab" aria-expanded="false">{{ __('message.Back') }} <i class="fa fa-arrow-circle-left"></i></a>
                                <a href="#MakePayment"  id="nextpayment" class="btn btn-primary btn-lg btn-rounded" aria-controls="MakePayment" role="tab" data-toggle="tab" aria-expanded="false">{{ __('message.Next') }} <i class="fa fa-arrow-circle-right"></i></a>
                            </div>

 <!-- <a href="#MakePayment" aria-controls="MakePayment" role="tab" data-toggle="tab" class="btn btn-primary btn-rounded btn-lg">Make Payment <i class="fa fa-arrow-circle-right"></i></a>  -->
 <!-- <a href="{{ route('checkout') }}" class="btn btn-primary btn-rounded btn-lg">{{ __('message.Checkout') }} <i class="fa fa-arrow-circle-right"></i></a>  -->
                        </div>
                        @endif
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane" id="MakePayment">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8">
                            <!--makepaymentSection-->
                            <div class="makepaymentSection">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                                        <div class="list-group">
                                            <a href="make-payment.php" class="list-group-item active">
                                                <h4 class="fa fa-credit-card"></h4> {{ __('message.Credit/Debit Card') }}
                                            </a>
                                            <a href="make-payment.php#" class="list-group-item">
                                                <h4 class="fa fa-globe"></h4>{{ __('message.Net Banking') }}
                                            </a>
                                            <!--                                                <a href="make-payment.php#" class="list-group-item">
                                                                                                <h4 class="fa fa-credit-card"></h4>{{ __('message.Debit Card') }}
                                                                                            </a>-->
                                            <a href="make-payment.php#" class="list-group-item">
                                                <h4 class="fa fa-home"></h4>{{ __('message.COD') }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">

                                        <!--  Credit card  -->
                                        <div class="bhoechie-tab-content active">

                                            <h3 class="headingFull"><span>{{ __('message.Pay using Credit/Debit Card') }}</span></h3>
                                            <div class="modal-form-block row">
                                                <div class="col-md-6">
                                                    <label>{{ __('message.Card Number') }}   </label>
                                                    <!--<input type="number" >-->
                                                    <input name="number"
                                                           oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                           type = "number" maxlength = "16" name="cardnumber" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>{{ __('message.Card CVV') }}   </label>
                                                    <input name="number"
                                                           oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                           type = "number" maxlength = "4" name="cardnumbercvv"/>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label class="control-label col-md-12">{{ __('message.Expiration Date') }}</label>
                                                        <div class="col-md-6">
                                                            <div class="select-dropdown1">
                                                                <select class="month" name="expiry-month2" id="expiry-month2">
                                                                    <option>{{ __('message.Month') }}</option>
                                                                    <option value="01">Jan (01)</option>
                                                                    <option value="02">Feb (02)</option>
                                                                    <option value="03">Mar (03)</option>
                                                                    <option value="04">Apr (04)</option>
                                                                    <option value="05">May (05)</option>
                                                                    <option value="06">June (06)</option>
                                                                    <option value="07">July (07)</option>
                                                                    <option value="08">Aug (08)</option>
                                                                    <option value="09">Sep (09)</option>
                                                                    <option value="10">Oct (10)</option>
                                                                    <option value="11">Nov (11)</option>
                                                                    <option value="12">Dec (12)</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="select-dropdown1">
                                                                <select name="expiry-year" class="year">
                                                                    <!--                                                                        <option value="13">2013</option>
                                                                                                                                            <option value="14">2014</option>
                                                                                                                                            <option value="15">2015</option>
                                                                                                                                            <option value="16">2016</option>
                                                                                                                                            <option value="17">2017</option>
                                                                                                                                            <option value="18">2018</option>-->
                                                                    <option value="19">2019</option>
                                                                    <option value="20">2020</option>
                                                                    <option value="21">2021</option>
                                                                    <option value="22">2022</option>
                                                                    <option value="23">2023</option>
                                                                    <!--                                                                        <option rel="ABN_N" class="">ABN AMRO Bank</option>
                                                                                                                                            <option rel="AND_N" class="">Andhra Bank</option>
                                                                                                                                            <option rel="BBK_N" class="">Bank of Bahrain &amp; Kuwait</option>
                                                                                                                                            <option rel="BOBCO_N" class="">Bank of Baroda Corp Accnt</option>
                                                                                                                                            <option rel="BOB_N" class="">Bank of Baroda Retail Accnt</option>
                                                                                                                                            <option rel="BOI_N" class="">Bank of India</option>
                                                                                                                                            <option rel="BOM_N" class="">Bank of Maharashtra</option>
                                                                                                                                            <option rel="CAN_N" class="">Canara Bank</option>
                                                                                                                                            <option rel="CSB_N" class="">Cathooptionc Syrian Bank</option><option rel="CEN_N" class="">Central Bank of India</option>
                                                                                                                                            <option rel="CITIUB_N" class="">City Union Bank</option>
                                                                                                                                            <option rel="COP_N" class="">Corporation Bank</option>
                                                                                                                                            <option rel="DCBC_N" class="">DCB Bank Business</option>
                                                                                                                                            <option rel="DCB_N" class="">DCB Bank Personal</option>
                                                                                                                                            <option rel="DEUNB_N" class="">Deutsche Bank</option>
                                                                                                                                            <option rel="DCBB" class="">Development Credit Bank</option>
                                                                                                                                            <option rel="DLB_N" class="">Dhanlakshmi Bank</option>
                                                                                                                                            <option rel="FDEB_N" class="">Federal Bank</option>
                                                                                                                                            <option rel="IDBI_N" class="">IDBI Bank</option>
                                                                                                                                            <option rel="INB_N" class="">Indian Bank</option>
                                                                                                                                            <option rel="IOB_N" class="">Indian Overseas Bank</option>
                                                                                                                                            <option rel="NIIB_N" class="">IndusInd Bank</option>
                                                                                                                                            <option rel="ING_N" class="">ING Vysya Bank</option>
                                                                                                                                            <option rel="JKB_N" class="">Jammu &amp; Kashmir Bank</option>
                                                                                                                                            <option rel="JNCS_N" class="">JCash</option>
                                                                                                                                            <option rel="KTKB_N" class="">Karnataka Bank</option>
                                                                                                                                            <option rel="KVB_N" class="">Karur Vysya Bank</option>
                                                                                                                                            <option rel="NKMB_N" class="">Kotak Mahindra Bank</option>
                                                                                                                                            <option rel="LVB_N" class="">Lakshmi Vilas Bank</option>
                                                                                                                                            <option rel="OBPRF_N" class="">Oriental Bank of Commerce</option>
                                                                                                                                            <option rel="PSBNB" class="">Punjab and Sind Bank</option>
                                                                                                                                            <option rel="PNBCO_N" class="">Punjab National Bank Corp Accnt</option>
                                                                                                                                            <option rel="NPNB_N" class="">Punjab National Bank Retail Accnt</option>
                                                                                                                                            <option rel="SRB_N" class="">Saraswat Bank</option>
                                                                                                                                            <option rel="SVC_N" class="">Shamrao Vithal Bank</option>
                                                                                                                                            <option rel="SIB_N" class="">South Indian Bank</option>
                                                                                                                                            <option rel="SCB_N" class="">Standard Chartered Bank</option>
                                                                                                                                            <option rel="SBJ_N" class="">State Bank of Bikaner and Jaipur</option>State Bank of Hyderabad
                                                                                                                                            <option rel="SBM_N" class="">State Bank of Mysore</option>
                                                                                                                                            <option rel="SBP_N" class="">State Bank of Patiala</option>
                                                                                                                                            <option rel="SBT_N" class="">State Bank of Travancore</option>
                                                                                                                                            <option rel="SYNBK_N" class="">Syndicate Bank</option>
                                                                                                                                            <option rel="TNMB_N" class="">Tamilnad Mercantile Bank</option>
                                                                                                                                            <option rel="RBS_N" class="">The Royal Bank of Scotland</option>
                                                                                                                                            <option rel="UCOB" class="">UCO Bank</option>
                                                                                                                                            <option rel="UNI_N" class="">Union Bank of India</option>
                                                                                                                                            <option rel="UBI_N" class="sel">United Bank of India</option>
                                                                                                                                            <option rel="VJYA_N" class="">Vijaya Bank</option>
                                                                                                                                            <option rel="YES_N" class="">YES Bank</option>-->
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-12">
                                                    <label>{{ __('message.Name on Card') }}</label>
                                                    <input type="text" >
                                                </div>
                                            </div>
                                            <!-- end login box  -->
                                        </div>

                                        <!--Net Banking-->
                                        <div class="bhoechie-tab-content">
                                            <h3 class="headingFull"><span>{{ __('message.Pay using Net Banking') }}</span></h3>
                                            <div class="net-banking row">
                                                <div class="form-group">
                                                    <label class="col-md-12 control-label" for="radios">{{ __('message.Select Bank') }}</label>
                                                    <div class="col-md-4 sbi">
                                                        <label class="radio-inline" for="radios-0">
                                                            <input name="radios" id="radios-0" value="1" checked="checked" type="radio">
                                                            <img src="assets/images/net_bank_logos.png">
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 hdfc">
                                                        <label class="radio-inline" for="radios-1">
                                                            <input name="radios" id="radios-1" value="2" type="radio">
                                                            <img src="assets/images/net_bank_logos.png">
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 icici">
                                                        <label class="radio-inline" for="radios-2">
                                                            <input name="radios" id="radios-2" value="3" type="radio">
                                                            <img src="assets/images/net_bank_logos.png">
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 citibank">
                                                        <label class="radio-inline" for="radios-3">
                                                            <input name="radios" id="radios-3" value="4" type="radio">
                                                            <img src="assets/images/net_bank_logos.png">
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 axis">
                                                        <label class="radio-inline" for="radios-4">
                                                            <input name="radios" id="radios-4" value="5" type="radio">
                                                            <img src="assets/images/net_bank_logos.png">
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 kotak">
                                                        <label class="radio-inline" for="radios-5">
                                                            <input name="radios" id="radios-5" value="6" type="radio">
                                                            <img src="assets/images/net_bank_logos.png">
                                                        </label>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-12">{{ __('message.Other Bank') }}</label>
                                                    <div class="col-md-6">
                                                        <div class="select-dropdown1">
                                                            <select name="expiry-year" class="year">
                                                                <option>Select Bank</option>
                                                                <!--                                                                    <option rel="ABN_N" class="">ABN AMRO Bank</option>
                                                                                                                                    <option rel="AND_N" class="">Andhra Bank</option>
                                                                                                                                    <option rel="BBK_N" class="">Bank of Bahrain &amp; Kuwait</option>
                                                                                                                                    <option rel="BOBCO_N" class="">Bank of Baroda Corp Accnt</option>
                                                                                                                                    <option rel="BOB_N" class="">Bank of Baroda Retail Accnt</option>
                                                                                                                                    <option rel="BOI_N" class="">Bank of India</option>
                                                                                                                                    <option rel="BOM_N" class="">Bank of Maharashtra</option>
                                                                                                                                    <option rel="CAN_N" class="">Canara Bank</option>
                                                                                                                                    <option rel="CSB_N" class="">Cathooptionc Syrian Bank</option><option rel="CEN_N" class="">Central Bank of India</option>
                                                                                                                                    <option rel="CITIUB_N" class="">City Union Bank</option>
                                                                                                                                    <option rel="COP_N" class="">Corporation Bank</option>
                                                                                                                                    <option rel="DCBC_N" class="">DCB Bank Business</option>
                                                                                                                                    <option rel="DCB_N" class="">DCB Bank Personal</option>
                                                                                                                                    <option rel="DEUNB_N" class="">Deutsche Bank</option>
                                                                                                                                    <option rel="DCBB" class="">Development Credit Bank</option>
                                                                                                                                    <option rel="DLB_N" class="">Dhanlakshmi Bank</option>
                                                                                                                                    <option rel="FDEB_N" class="">Federal Bank</option>
                                                                                                                                    <option rel="IDBI_N" class="">IDBI Bank</option>
                                                                                                                                    <option rel="INB_N" class="">Indian Bank</option>
                                                                                                                                    <option rel="IOB_N" class="">Indian Overseas Bank</option>
                                                                                                                                    <option rel="NIIB_N" class="">IndusInd Bank</option>
                                                                                                                                    <option rel="ING_N" class="">ING Vysya Bank</option>
                                                                                                                                    <option rel="JKB_N" class="">Jammu &amp; Kashmir Bank</option>
                                                                                                                                    <option rel="JNCS_N" class="">JCash</option>
                                                                                                                                    <option rel="KTKB_N" class="">Karnataka Bank</option>
                                                                                                                                    <option rel="KVB_N" class="">Karur Vysya Bank</option>
                                                                                                                                    <option rel="NKMB_N" class="">Kotak Mahindra Bank</option>
                                                                                                                                    <option rel="LVB_N" class="">Lakshmi Vilas Bank</option>
                                                                                                                                    <option rel="OBPRF_N" class="">Oriental Bank of Commerce</option>
                                                                                                                                    <option rel="PSBNB" class="">Punjab and Sind Bank</option>
                                                                                                                                    <option rel="PNBCO_N" class="">Punjab National Bank Corp Accnt</option>
                                                                                                                                    <option rel="NPNB_N" class="">Punjab National Bank Retail Accnt</option>
                                                                                                                                    <option rel="SRB_N" class="">Saraswat Bank</option>
                                                                                                                                    <option rel="SVC_N" class="">Shamrao Vithal Bank</option>
                                                                                                                                    <option rel="SIB_N" class="">South Indian Bank</option>
                                                                                                                                    <option rel="SCB_N" class="">Standard Chartered Bank</option>
                                                                                                                                    <option rel="SBJ_N" class="">State Bank of Bikaner and Jaipur</option>State Bank of Hyderabad
                                                                                                                                    <option rel="SBM_N" class="">State Bank of Mysore</option>
                                                                                                                                    <option rel="SBP_N" class="">State Bank of Patiala</option>
                                                                                                                                    <option rel="SBT_N" class="">State Bank of Travancore</option>
                                                                                                                                    <option rel="SYNBK_N" class="">Syndicate Bank</option>
                                                                                                                                    <option rel="TNMB_N" class="">Tamilnad Mercantile Bank</option>
                                                                                                                                    <option rel="RBS_N" class="">The Royal Bank of Scotland</option>
                                                                                                                                    <option rel="UCOB" class="">UCO Bank</option>
                                                                                                                                    <option rel="UNI_N" class="">Union Bank of India</option>
                                                                                                                                    <option rel="UBI_N" class="sel">United Bank of India</option>
                                                                                                                                    <option rel="VJYA_N" class="">Vijaya Bank</option>
                                                                                                                                    <option rel="YES_N" class="">YES Bank</option>-->
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--                                            <div class="bhoechie-tab-content">
                                                                                        <h3 class="headingFull"><span>{{ __('message.Pay using Credit Card') }}</span></h3>
                                                                                        <div class="modal-form-block row">
                                                                                            <div class="col-md-6">
                                                                                                <label>{{ __('message.Card Number') }}</label>
                                                                                                <input type="number" >
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <label>{{ __('message.Card CVV') }}</label>
                                                                                                <input type="number" >
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="row">
                                                                                                    <label class="control-label col-md-12">{{ __('message.Expiration Date') }}</label>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="select-dropdown1">
                                                                                                            <select class="month" name="expiry-month1" id="expiry-month1">
                                                                                                                <option>{{ __('message.Month') }}</option>
                                                                                                                <option value="01">Jan (01)</option>
                                                                                                                <option value="02">Feb (02)</option>
                                                                                                                <option value="03">Mar (03)</option>
                                                                                                                <option value="04">Apr (04)</option>
                                                                                                                <option value="05">May (05)</option>
                                                                                                                <option value="06">June (06)</option>
                                                                                                                <option value="07">July (07)</option>
                                                                                                                <option value="08">Aug (08)</option>
                                                                                                                <option value="09">Sep (09)</option>
                                                                                                                <option value="10">Oct (10)</option>
                                                                                                                <option value="11">Nov (11)</option>
                                                                                                                <option value="12">Dec (12)</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="select-dropdown1">
                                                                                                            <select name="expiry-year" class="year">
                                                                                                                <option value="13">2013</option>
                                                                                                                <option value="14">2014</option>
                                                                                                                <option value="15">2015</option>
                                                                                                                <option value="16">2016</option>
                                                                                                                <option value="17">2017</option>
                                                                                                                <option value="18">2018</option>
                                                                                                                <option value="19">2019</option>
                                                                                                                <option value="20">2020</option>
                                                                                                                <option value="21">2021</option>
                                                                                                                <option value="22">2022</option>
                                                                                                                <option value="23">2023</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <label>Name on Card</label>
                                                                                                <input type="text" >
                                                                                            </div>

                                                                                        </div>
                                                                                         end login box
                                                                                    </div>-->
                                        <div class="bhoechie-tab-content">
                                            <h3 class="headingFull"><span>{{ __('message.Pay using Cash On Delivery') }}</span></h3>
                                            <?php if ($profile) { ?>
                                                <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                                                    {{ csrf_field() }}

                                                    <input type="hidden" id="name" class="form-control" required name="name" value="{{ $profile[0]->name }}">
                                                    <input type="hidden" id="address" class="form-control" required name="address" value="<?php if(isset($profile[0]->address)){ ?> {{ $profile[0]->address }}<?php }else{ } ?>">
                                                    <input type="hidden" id="contact" name="contact" class="form-control" required value="<?php if(isset($profile[0]->contact)){ ?> {{ $profile[0]->contact }} <?php }else{ } ?>">
                                                    <input type="hidden" id="postal" name="postal" class="form-control" required value="<?php if(isset($profile[0]->pin_code)){ ?> {{ $profile[0]->pin_code }} <?php }else{ } ?>">
                                                    <input type="hidden" id="city" name="city" class="form-control" required value="<?php if(isset($profile[0]->country)){ ?> {{ $profile[0]->country }} <?php }else{ } ?>">
                                                    <input type="hidden" id="selected_address" name="shipping_address" value="0">
                                                    <input type="hidden" id="send_gift" name="send_gift" value="0">
                                                    <div class="text-center">

                                                        <input type="submit" class="btn btn-primary btn-rounded btn-lg" value="{{ __('message.Place Order') }}" name="checkout">
                                                         <!-- <i class="fa fa-arrow-circle-right"></i> -->
                                                        <!--                                                     <button type="submit" class="btn btn-success" >Buy Now</button>
                                                                                                            <a href="{{ route('checkout') }}" class="btn btn-primary btn-rounded btn-lg">Place Order<i class="fa fa-arrow-circle-right"></i></a>
                                                                                                            <a href="thankyou-order.php" class="btn btn-primary btn-rounded btn-lg">Place Order  <i class="fa fa-arrow-circle-right"></i></a> -->
                                                    </div>
                                                </form>
                                            <?php } ?>
                                        </div>
                                        <br>
                                        <a href="#ReviewOrder" id="backpayment" class="btn btn-default btn-lg btn-rounded" aria-controls="ReviewOrder" role="tab" data-toggle="tab" aria-expanded="false">{{ __('message.Back') }} <i class="fa fa-arrow-circle-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="add-new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ url('addAddress') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ __('message.Add New Address') }}</h4>
                </div>
                <div class="modal-body">



                    <div class="modal-form-block">
                        <div class="col-sm-6">
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="control-label" for="textinput">Address Name</label>
                                <input class="p-r-25" name="name" required="" placeholder="Work / Home" type="text">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="textinput">Street Name/No.</label>
                                <input class="p-r-25" name="streetname" id="streetname" required="" placeholder="Street Name/No." type="text">
                            </div>
                            <!-- Text input-->
                            <!--                        <div class="form-group">
                                                        <label class="control-label" for="textinput">Pincode</label>
                                                        <input class="p-r-25" name="pin_code" required="" placeholder="Pincode" type="text">
                                                    </div>-->

                            <div class="form-group">
                                <label class="control-label" for="textinput">Country</label>
                                <input class="p-r-25" name="country" required="" placeholder="Country" type="text">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="textinput">Phone</label>
                                <input class="p-r-25" name="phone" required="" placeholder="Phone" type="number">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="control-label" for="textinput">Building Name/No.</label>
                                <input class="p-r-25" name="address" required="" placeholder="Building Name/No."  type="text">
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="control-label" for="textinput">Landmark</label>
                                <input class="p-r-25" name="landmark" required="" placeholder="Landmark" type="text">
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="control-label" for="textinput">City</label>
                                <input class="p-r-25" name="city" required="" placeholder="City" type="text">
                            </div>
                            <!--                        <div class="form-group">
                                                        <label class="control-label" for="textinput">State</label>
                                                        <input class="p-r-25" name="state" required="" placeholder="State" type="text">
                                                    </div>-->


                        </div>
                        <div class="clear"></div>

                        <div class="form-group">
                            <label for="address_address">Enter a Location</label>
                            <input type="text" id="address-input" name="address_address" class="form-control map-input">
                            <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                            <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
                        </div>
                        <div id="address-map-container" style="width:100%;height:400px; ">
                            <div style="width: 100%; height: 100%" id="address-map"></div>
                        </div>



                        <!--                    <div id="googleMap" style="width:100%;height:400px;"></div>

                        <script>
                        function myMap() {
                        var mapProp= {
                          center:new google.maps.LatLng(25.1947824,55.2730131),
                          zoom:5,
                        };
                        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                        }
                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4y42DfJUNmx6YzlPWFdbhwj4m-6XEIg8&callback=myMap"></script>-->

                    </div>


                </div><!-- end modal body -->
                <div class="modal-footer">
                    <input type="submit" name="add_new_address" class="btn btn-primary btn-lg btn-rounded" value="Register">
                    <!-- <a href="#" class="btn btn-primary btn-lg btn-rounded">Register</a> -->
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div><!-- end modal content -->
    </div>
</div><!-- end modal -->

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update Address</h4>
            </div>
            <div class="modal-body">
                <div class="modal-form-block">
                    <div class="col-sm-6">
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">Name</label>
                            <input class="p-r-25" name="textinput" required="" type="text" value="John Elton">
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">Landmark</label>
                            <input class="p-r-25" name="textinput" required="" type="text" value="19, Somewhere in New York">
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">Pincode</label>
                            <input class="p-r-25" name="textinput" required="" type="text" value="000002">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="textinput">Country</label>
                            <input class="p-r-25" name="textinput" required="" type="text" value="USA">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">Address</label>
                            <input class="p-r-25" name="textinput" required="" type="text" value="Some address near in New York City New York">
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">City</label>
                            <input class="p-r-25" name="textinput" required="" type="text" value="New York">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textinput">State</label>
                            <input class="p-r-25" name="textinput" required="" type="text" value="NY">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="textinput">Phone</label>
                            <input class="p-r-25" name="textinput" required="" type="number" value="97655 97655">
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div><!-- end modal body -->
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary btn-lg btn-rounded" value="Update"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- end modal content -->
    </div>
</div><!-- end modal -->

<!-- Sender Details Modal -->
<div class="modal fade" id="senderDetailsModalOpen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <!--<h4 class="modal-title" id="myModalLabel">Sender/Receiver Details</h4>-->
            </div>
            <div class="modal-body">
                <div class="row senderReceiverFormCol">
                    <form class="col-md-6" action="" method="">
                        <div class="modal-form-block">
                            <h4 class="heading-center"><span>Sender's Details</span></h4>
                            <div class="form-group">
                                <label class="control-label" for="textinput">First Name</label>
                                <input class="p-r-25" name="senderfirstname" required="" type="text" value="{{$profile[0]->name}}">
                                <input type="hidden" id="sendergiftmark" name="sendergiftmark" value="<?php echo $giftcart; ?>">
                                <input type="hidden" id="shippingmark" name="shippingmark" value="<?php echo $shippingmark; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="textinput">Last Name</label>
                                <input class="p-r-25" name="senderlastname" required="" type="text" value="{{$profile[0]->lastname}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="textinput">Phone</label>
                                <input class="p-r-25" name="senderphone" required="" type="text" value="<?php if(isset($profile[0]->contact)){ ?> {{ $profile[0]->contact }} <?php }else{   echo 'call now';  } ?>">
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="control-label" for="textinput">Email id</label>
                                <input class="p-r-25" name="senderemailid" required="" type="email" value="{{$profile[0]->email}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="textinput">Gift Event</label>
                                <input class="p-r-25" name="sendergiftevent" required="" type="text" value="">
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="control-label" for="textinput">Address</label>
                                <input class="p-r-25" name="senderaddress" required="" type="text" value="<?php if(isset($profile[0]->address)){ ?>{{ $profile[0]->address }} <?php }else{ } ?>">
                            </div>

                            <button type="submit" class="btn btn-primary btn-rounded">Submit <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </form>
                    <form class="col-md-6" action="" method="">
                        <div class="modal-form-block">
                            <h4 class="heading-center"><span>Receiver Details</span></h4>
                             <div class="form-group">
                                <label class="control-label" for="textinput">First Name</label>
                                <input class="p-r-25" name="reciverfirstname" required="" type="text" value="">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="textinput">Last Name</label>
                                <input class="p-r-25" name="reciverlastname" required="" type="text" value="">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="textinput">Phone</label>
                                <input class="p-r-25" name="reciverphone" required="" type="number" value="">
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="control-label" for="textinput">Email id</label>
                                <input class="p-r-25" name="reciveremailid" required="" type="email" value="">
                            </div>
                              <div class="form-group">
                                <label class="control-label" for="textinput">Gift Event</label>
                                <input class="p-r-25" name="recivergiftevent" required="" type="text" value="">
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="control-label" for="textinput">Address</label>
                                <input class="p-r-25" name="reciveraddress" required="" type="text" value="">
                            </div>
                            <!--<button type="submit" class="btn btn-primary btn-rounded">Submit <i class="fa fa-arrow-circle-right"></i></button>-->
                        </div>
                    </form>
                </div>
                <div class="clear space15"></div>
            </div>
        </div>
    </div>
</div>
