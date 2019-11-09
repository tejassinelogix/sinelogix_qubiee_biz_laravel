<!--<!DOCTYPE html>
<html>
<head>
<title>Xtacky</title>
<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css"/>
</head>
<body>
        <div class="w3-container">-->
<div class="checkoutwrapper">
    <div class="container">
        <div class="breadcrumbs">
            <ul>
                <li><a href="index.php"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> </li>
                <!-- <li><a href="innerpage-1.php">Power Supplies</a> <i class="fa fa-angle-right"></i> </li>
                <li><a href="product-details.php">Item Details</a> <i class="fa fa-angle-right"></i> </li> -->
                <li><b>{{ __('message.Checkout') }}</b></li>
            </ul>
        </div>
        <div class="space10"></div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="{!! URL::to('paypal') !!}">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                   <span onclick="this.parentElement.style.display = 'none'" style="float: right;">&times;</span>
                                    <p>{!! $message !!}</p>
                                </div>
<!--                                <div class="w3-panel w3-green w3-display-container">
                                    <span onclick="this.parentElement.style.display = 'none'"
                                          class="w3-button w3-green w3-large w3-display-topright">&times;</span>
                                    <p>{!! $message !!}</p>
                                </div>-->
                                <?php Session::forget('success'); ?>
                                @endif
                                @if ($message = Session::get('error'))
                                <div class="alert alert-danger">
                                    <span onclick="this.parentElement.style.display = 'none'" style="float: right;">&times;</span>
                                    <p>{!! $message !!}</p>
                                </div>
<!--                                <div class="w3-panel w3-red w3-display-container">
                                    <span onclick="this.parentElement.style.display = 'none'"
                                          class="w3-button w3-red w3-large w3-display-topright">&times;</span>
                                    <p>{!! $message !!}</p>
                                </div>-->
                                <?php Session::forget('error'); ?>
                                @endif

                                {{ csrf_field() }}

                                <!--                            <h2 class="w3-text-blue">Checkout Form</h2>
                                                            <p>Xtacky Checkout</p>-->

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('message.Amount') }} : {{ $total }}</label>
                                    <input value="{{ $total }}" name="amount" type="hidden">
                                    <!--                            <div class="col-md-6">
                                                                    <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                                    
                                                                 
                                                                </div>-->
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('message.Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" class="form-control" name="name" type="text" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('message.Email') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" class="form-control" name="email" type="text" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('message.Mobile') }}</label>
                                    <div class="col-md-6">
                                        <input id="contact" class="form-control" name="contact" type="text" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('message.Address') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="address" class="form-control" name="address" required autofocus>
                                            
                                        </textarea>
                                        <!--<input id="address" class="form-control" name="address" type="text" required autofocus>-->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="postal_code" class="col-md-4 col-form-label text-md-right">{{ __('message.Postal Code') }}</label>
                                    <div class="col-md-6">
                                        <input id="postal_code" class="form-control" name="postal_code" type="text" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('message.City') }}</label>
                                    <div class="col-md-6">
                                        <input id="city" class="form-control" name="city" type="text" required autofocus>
                                    </div>
                                </div>                                
<!--                            <p>      
        <label class="w3-text-blue"><b>Enter Amount : </b></label>
        <label class="w3-text-blue"><b>{{ $total }}</b></label>
    </p>    
    <p>      
        <label class="w3-text-blue"><b>Enter Name</b></label>
        <input class="w3-input w3-border" name="name" type="text">
    </p>    
    <p>      
        <label class="w3-text-blue"><b>Enter Address</b></label>
        <input class="w3-input w3-border" name="address" type="text"></p>    
    <p>      
        <label class="w3-text-blue"><b>Enter Mobile</b></label>
        <input class="w3-input w3-border" name="mobile" type="text"></p>      -->
                                <div class="form-group row mb-0">
                                    <label class="col-md-4 col-form-label text-md-right">      </label>
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" style="display: inline-block !important" class="btn-orange full-btn">{{ __('message.Pay with PayPal') }}</button>
                                        <button type="reset" style="display: inline-block !important" class="btn-orange full-btn">{{ __('message.Cancel') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="space30"></div>    
