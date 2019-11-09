

<!-- MyAccount -->
<!--<div class="MyAccountWrapper"></div>
<div class="MyAccount">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p><b>Welcome, {{ $Profile[0]->name }}</b></p>
                <h4 class="Account-heading">Settings</h4>
            </div>
            <div class="col-sm-3">
                <div class="">
                    <ul class="MyAccountList nav nav-tabs">
                        <li>
                            <a href="{{ url('/profile') }}">Profile</a>
                            <i class="fa fa-chevron-right"></i>
                        </li>
                        <li>
                            <a href="{{ url('/order') }}">Order History</a>
                            <i class="fa fa-chevron-right"></i>
                        </li>
                         <li>
                            <a href="{{ url('/wallet') }}">Wallet</a>
                            <i class="fa fa-chevron-right"></i>
                        </li>
                        <li>
                            <a href="{{ url('/download') }}">Downloads</a>
                            <i class="fa fa-chevron-right"></i>
                        </li>

                        <li>
                            <a href="{{ url('/setting') }}">Settings</a>
                            <i class="fa fa-chevron-right"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="AccountBoxWrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            @if(session('info'))
                            <div class="alert alert-success">
                                {{ session('info') }}
                            </div>
                            @endif
                            @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                            @endforeach
                            @endif
                            <form method="POST" action="{{ route('changePassword') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" value="{{ Auth::user()->id }}" id="user_id" placeholder="Enter Name" name="user_id">
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Change Password
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!-- End MyAccount -->


<div class="innerPageSection">
    <div class="containerWrapper">
        <div class="breadcrumbs">
            <ul>
                <p><b>Welcome, {{ $Profile[0]->name }}</b></p>
                <li><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> </li>
                <li>My Account</li>
            </ul>
        </div>
        <div class="space10"></div>
        <div class="row">
           @include('user-sidebar')
           
            <div class="col-md-10 col-sm-10">
                <h3 class="headingFull"><span>Setting</span></h3>
                <div class="addressShippingSelect">
                            @if(session('info'))
                            <div class="alert alert-success">
                                {{ session('info') }}
                            </div>
                            @endif
                            @if(session('infofiled'))
                            <div class="alert alert-danger">
                                {{ session('infofiled') }}
                            </div>
                            @endif
                            @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                            @endforeach
                            @endif
                            <form method="POST" action="{{ route('changePassword') }}">
                                @csrf
                                  <div class="form-group row">
                                    <label for="old password" class="col-md-4 col-form-label text-md-right">{{ __('message.Old Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="oldpassword" type="password" class="form-control{{ $errors->has('oldpassword') ? ' is-invalid' : '' }}" name="oldpassword" required>

                                        @if ($errors->has('oldpassword'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('oldpassword') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('message.Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('message.Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" value="{{ Auth::user()->id }}" id="user_id" placeholder="Enter Name" name="user_id">
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('message.Change Password') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
</div>
