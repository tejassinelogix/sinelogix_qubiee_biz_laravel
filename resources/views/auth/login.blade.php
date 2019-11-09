@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card loginCard">
                <div class="card-header">{{ __('message.Login') }}</div>
                <div class="card-body">
                    <div class="col-sm-12">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <!--<label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>-->

                                <div class="col-md-12">
                                    <input id="email" type="email" placeholder="{{ __('message.Email') }}" class="email form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <!--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>-->
                                <div class="col-md-12">
                                    <input id="password" type="password" placeholder="{{ __('message.Password') }}" class="password form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                               <label class="form-check-label" for="remember">
                                            {{ __('message.Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('message.Login') }}
                                    </button>


                                </div>
                                <div class="col-md-6 text-left">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('message.Forgot Your Password?') }}
                                    </a>
                                </div>
                                  <div class="col-md-6 text-right">
                                    <div class="form-check">
                                        <a class="btn btn-primary" href="{{ route('register') }}">{{ __('message.Sign Up') }}</a>
                                    </div>
                                </div>
                            </div>
                            
                    <div class="form-group row">
                               <div class="col-md-12">
                                    <div class="social">
                                        <label class="col-form-label text-md-right">{{ __('message.Login Using') }} : </label>
                                        <a href="{{ url('auth/facebook') }}"><i class="fa fa-facebook-square" aria-hidden="true"></i> {{ __('message.Facebook') }}</a> /
                                        <a href="{{ url('auth/google') }}"><i class="fa fa-google-plus-square" aria-hidden="true"></i> {{ __('message.Google') }}+</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
