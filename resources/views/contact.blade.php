
<!-- category page section -->
<div class="categoryInner privacypage">
    <div class="innerBannerSection productSubPageBanner">
        <!--        <div class="innerBannerImg" style="background: url('assets/images/inner-banner.jpg') no-repeat center;">
                    <div class="container">
                        <h1>Contact Us</h1>
                    </div>
                </div>-->
    </div>
    <!-- breadcrumbs -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="<?php echo url('/'); ?>"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> </li>
                        <!--<li><a href="<?php echo url('/'); ?>">Home</a> <i class="fa fa-angle-right"></i> </li>-->
                        <li><b>{{ __('message.Contact-Us') }}</b></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="categoryMainSection contactPageSection">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="heading2">Contact Details</h3>
                    <div class="contactAddDetails">
                        <p><i class="fa fa-phone"></i> Customer Service No.: <strong>+971 97655 97655</strong></p>
                        <p><i class="fa fa-envelope-o"></i> Email: <strong><a href="mailto:sales@qubiee.com">sales@qubiee.com</a></strong></p>
                        <p><i class="fa fa-clock-o"></i> Working Hours: <strong>Morning 9am to Evening 8pm (Friday & Saturday off)</strong></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="heading2">Get in touch with Us</h3>
                    <form class="signIn" action="{{ url('contact') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">
                                @if (\Session::has('contact_success'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{!! \Session::get('contact_success') !!}</li>
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
                            </div>
                            <div class="col-sm-12">
                                <div class="login-block">
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="control-label" for="name">{{ __('message.Name') }}</label>
                                        <input class="p-r-25" name="name"  type="text">
        <!--                                <span class="form-control-feedback">
                                            <i class="fa fa-user"></i>
                                        </span>-->
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="control-label" for="email">{{ __('message.Email') }}</label>
                                        <input class="p-r-25" name="email" type="text">
        <!--                                <span class="form-control-feedback">
                                            <i class="fa fa-envelope"></i>
                                        </span>-->
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="control-label" for="mobile">{{ __('message.Contact') }}</label>
                                        <input class="p-r-25" name="mobile"  type="text">
        <!--                                <span class="form-control-feedback">
                                            <i class="fa fa-mobile"></i>
                                        </span>-->
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="control-label" for="company">{{ __('message.Company / Organization Name') }} </label>
                                        <input class="p-r-25" name="company" type="text">
        <!--                                <span class="form-control-feedback">
                                            <i class="fa fa-user"></i>
                                        </span>-->
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="message">{{ __('message.Message') }}</label>
                                        <textarea class="forminput" name="message"  rows="4" ></textarea>
                                    </div>
                                    <button class="btn btn-primary btn-lg" type="submit">
                                        {{ __('message.Send') }} <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                <!--<a href="#" class="btn-orange">Send <i class="fa fa-arrow-circle-right"></i></a>-->
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="space30"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

