
<section class="OrderWrapper">
<div class="container">
    @if(Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-md-offset-3">
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">

                
                <div class="row">
                    <div class="col-md-9 col-lg-9">
                        @if(session('info'))
                        <div class="alert alert-success">
                            {{ session('info') }}
                        </div>
                        @endif
                    </div>
                </div>
                 <!-- <div>
                        @component('components.who')

                        @endcomponent
                    </div> -->
                 
                <div class="col-md-12 col-lg-12">
                    

                   <form action="{{ url('checkout') }}" method="post" id="checkout-form">
                   
                       <h4><b>Checkout</b></h4>
                   <h4>Your Total : ${{ $total }}</h4>
                   <div id="charge-error" class="alert alert-danger{{ !Session::has('error') ? 'hidden' : '' }}">
                       {{ Session::get('error') }}
                   </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" required name="name">
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" class="form-control" required name="address">
                            </div>
                        </div>
                        
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-name">Contact</label>
                                <input type="text" id="contact" name="contact" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-name">Postal Code</label>
                                <input type="text" id="postal" name="postal" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-name">City</label>
                                <input type="text" id="city" name="city" class="form-control" required>
                            </div>
                        </div>
                        
<!--                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-name">Card Holder Name</label>
                                <input type="text" id="card-name" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-number">Credit Card Number</label>
                                <input type="text" id="card-number" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-expiry-month">Expiration Month</label>
                                <input type="text" id="card-expiry-month" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-expiry-year">Expiration Year</label>
                                <input type="text" id="card-expiry-year" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-cvc">CVC</label>
                                <input type="text" id="card-cvc" class="form-control" required>
                            </div>
                        </div>-->

                    </div>
                       {{ csrf_field() }}
                       <button type="submit" class="btn btn-success" >Buy Now</button>
                   </form>
                </div>
            </div>
                    
                   

                </div>
            </div>
        </div>
    </div>
</div>
</section>


