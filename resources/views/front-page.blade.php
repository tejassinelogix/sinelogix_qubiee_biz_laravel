<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coming Soon</title>
<link rel="shortcut icon" href="{{ asset('/') }}public/assets/front/images/icon.png" type="image/x-icon"/>
<link href="{{ URL::to('public/assets/front/tools/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::to('public/assets/front/tools/960.css') }}" rel="stylesheet" type="text/css" />
 <!--google fonts-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,700,900" rel="stylesheet">
<style>
    .subscribeForm {
        display: block;
        margin-bottom: 10px;
        position: relative;
    }
    .subscribeForm input {
        display: inline-block;
        width: 80%;
        height: 40px;
        float: left;
        padding: 0 10px;
        font-size: 14px;
        border: none;
        color: #000;
    }
    .subscribeForm button {
        display: inline-block;
        float: left;
        margin-left: 5px;
        /*position: absolute;*/
        top: 0;
        right: 0;
        padding: 0 15px;
        height: 40px;
        border: none;
        background: #2e3192;
        color: #fff;
        font-size: 14px;
    }
</style>
</head>
<body>

<div id="shim">

</div>
<div id="content">
	<div class="logo_box" style="padding-top: 0;">
		<img src="{{ asset('/') }}public/assets/front/images/logo.png" alt="realxgear">
	</div>          
	<div class="main_box">
		<div style="clear: both; padding: 10px 0;"></div>
		<h4>Get in touch with Us, We're</h4>
		<h2>Coming Soon</h2>
		
		<!--<div class="col-md-4 col-sm-4">-->
                        <div class="footer-menu">
                            <h3 class="footer-wid-title">{{ __('message.Subscribe') }}</h3>
                            <!--                            <form method="post" class="subscribeForm">
                                                            <input type="email" placeholder="Your Email">
                                                            <button type="submit">Subscribe</button>
                                                            </form>-->

                            <!--<p>Register now to get updates on promotions and coupons.</p>-->
                            <!--<p>{{ __('message.dummy_short_txt') }}</p>-->

                            @if (\Session::has('subscribe_success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('subscribe_success') !!}</li>
                                </ul>
                            </div>
                            @endif
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form class="subscribeForm" action="{{ url('subscribe') }}" method="post">
                                @csrf
                                <input type="email" placeholder="{{ __('message.E-Mail Address') }}" name="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                                <button type="submit">
                                   {{ __('message.Subscribe') }}
                                </button>
                            </form>
                        </div>
                    <!--</div>-->
        
		<!-- countdownClock 
    	<div class="countdownClock">
    		<span id="countdownClock"></span>
    		<div class="countDesc">
    			<div>Days</div>
    			<div>Hour</div>
    			<div>Min</div>
    			<div>Sec</div>
    		</div>
    	</div>-->
		<ul class="info">
			<!-- <li>
				<h3>P</h3>
				<p>866-599-5350<br/>403-926-8331</p>
			</li>
			<li>
				<h3>A</h3>
				<p>301 Clematis. Suite 3000<br/>West Palm Beach, FL 33401</p>
			</li>
			<li>
				<h3>S</h3>
				<p class="social">
					<a href="#" class="tw"></a>
					<a href="#" class="fb"></a>				
					<a href="#" class="li"></a>
				</p>
			</li> -->
		</ul>
	</div>
</div>
<script type="text/javascript" src="{{ URL::to('public/assets/front/js/jquery.min.js') }}"></script> 
<script type="text/javascript" src="{{ URL::to('public/assets/front/js/cufon-yui.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/assets/front/js/Clarendon_LT_Std_700.font.js') }}"></script>
<script type="text/javascript">
	Cufon.replace('h1,h3', {fontFamily: 'Clarendon LT Std', hover:true})
</script>
<!-- countdown -->
    <script type="text/javascript" src="{{ URL::to('public/assets/front/js/jquery.countdownTimer.js') }}"></script>

    <!-- custom jquery -->
    <script type="text/javascript" src="{{ URL::to('public/assets/front/js/custom.js') }}"></script>
</body>
</html>
