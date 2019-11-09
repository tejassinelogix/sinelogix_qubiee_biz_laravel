<div class="innerPageSection cartPageSection">
    <div class="containerWrapper">
        <div class="breadcrumbs">
            <ul>
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> </li>
                <li>{{ __('message.Guest Checkout') }}</li>
            </ul>
        </div>
        <div class="container">
             
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
            <form action="{{ route('guest-checkoutRegister') }}" method="post">
                @csrf
                <p><span class="required" style="color: red">* Mandatory Fields</span>
                <div class="col-sm-6">
                    <div class="form-group">
                    <label for="name">{{ __('message.Name') }}</label> <span class="required" style="color: red">*</span>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="{{ __('message.Name') }}">
                </div>
                <div class="form-group">
                    <label for="lastname">{{ __('message.Last Name') }}</label> <span class="required" style="color: red">*</span>
                    <input type="text" class="form-control" name="lastname" id="lastname" value="{{ old('lastname') }}" placeholder="{{ __('message.Last Name') }}">
                </div>
                <div class="form-group">
                    <label for="email">{{ __('message.E-Mail Address') }}</label> <span class="required" style="color: red">*</span>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('message.E-Mail Address') }}">
                </div>
               
                </div>
                <div class="col-sm-6">
                          <div class="form-group">
                    <label for="contact">{{ __('message.Contact') }}</label> <span class="required" style="color: red">*</span>
                    <input type="number" class="form-control" id="contact" name="contact" value="{{ old('contact') }}" placeholder="{{ __('message.Contact') }}">
                </div>
<!--                <div class="form-group">
                    <label for="state">{{ __('message.State') }}</label> <span class="required" style="color: red">*</span>
                    <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}" placeholder="{{ __('message.State') }}">
                </div>-->
                <div class="form-group">
                    <label for="country">{{ __('message.Country') }}</label> <span class="required" style="color: red">*</span>
                    <input type="text" class="form-control" id="country" name="country" value="{{ old('country') }}" placeholder="{{ __('message.Country') }}">
                </div>
                <div class="form-group">
                    <label for="address">{{ __('message.Address') }}</label> <span class="required" style="color: red">*</span>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="{{ __('message.Work / Home') }}">
                </div>
<!--                <div class="form-group">
                    <label for="pincode">{{ __('message.Pincode') }}</label> <span class="required" style="color: red">*</span>
                    <input type="text" class="form-control" id="pincode" name="pincode" value="{{ old('pincode') }}" placeholder="{{ __('message.Pincode') }}">
                </div>-->
                </div>
                <div class="clear"></div>
                 <div class="checkbox">
                    <label>
                        <input type="checkbox" name="terms" value="1" required>{{ __('message.Agree with the terms and conditions') }}
                    </label>
                </div>
                  
                <input type="submit" class="btn btn-primary btn-lg btn-rounded pull-right" value="{{ __('message.Save') }}" >        
                <!--<button type="submit" class="btn btn-primary btn-lg btn-rounded pull-right">{{ __('message.Save') }}</button>-->
            </form>
        </div>
    </div>
</div>