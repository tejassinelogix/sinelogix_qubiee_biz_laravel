
<div class="innerPageSection">
    <div class="containerWrapper">
        <div class="breadcrumbs">
            <ul>
                <p><b>{{ __('message.Welcome') }}, {{ $Profile[0]->name }}</b></p>
                <li><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> </li>
                <li>{{ __('message.My Account') }}</li>
            </ul>
        </div>
        <div class="space10"></div>
        <div class="row">
            @include('user-sidebar')
            <div class="col-md-10 col-sm-10">
                <h3 class="headingFull"><span>{{ __('message.My Profile') }}</span></h3>
                <div class="addressShippingSelect">
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
                    <form class="form-horizontal" method="post" action="{{ url('/addProfile') }}" enctype="multipart/form-data">
                        {{ csrf_field()}}
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label class="control-label " for="Name">{{ __('message.Name') }}:</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text"   class="form-control" value="{{ $Profile[0]->name }}" id="Name" placeholder="Enter First Name" name="Name">
                                <input type="hidden" class="form-control" value="{{ $Profile[0]->id }}" id="user_id" placeholder="Enter Name" name="user_id">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label class="control-label " for="lastname">{{ __('message.Last Name') }}:</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text"   class="form-control" value="{{ $Profile[0]->lastname }}" id="lastname" placeholder="Enter Last Name" name="lastname">
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label class="control-label " for="Email">{{ __('message.Email') }}:</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text"  class="form-control" value="{{ $Profile[0]->email }}" id="Email" placeholder="Enter Email" name="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label class="control-label" for="Contact">{{ __('message.Contact') }} :
                                </label>
                            </div>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control" id="Contact" <?php if ($getProfileInfo != null && isset($getProfileInfo[0]->contact) ) { ?>value="{{$getProfileInfo[0]->contact}}"<?php } ?> placeholder="" name="Contact">
                            </div>
                        </div>
<!--                        <div class="form-group" id="locationField">
                            <div class="col-sm-3">
                                <label class="control-label" for="Address">{{ __('message.Address') }} :
                                </label>
                            </div>
                            <div class="col-sm-8">
                                <input name="autocomplete" id="autocomplete" placeholder="Enter your address"
                                       onFocus="geolocate()" type="text" class="form-control"></input>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label class="control-label " for="Address">{{ __('message.Address') }}:</label>
                            </div>
                            <div class="col-sm-8">
                                <textarea rows="4" class="form-control"id="addressfull" name="Address"><?php if ($getProfileInfo != null && isset($getProfileInfo[0]->address)) { ?>{{$getProfileInfo[0]->address}}<?php } ?></textarea>
                            </div>
                        </div>
                        <table id="address" style="display: none">
                            <tr>
                                <td class="label">{{ __('message.Street address') }}</td>
                                <td class="slimField"><input class="field" id="street_number"
                                                             disabled="true"></input></td>
                                <td class="wideField" colspan="2"><input class="field" id="route"
                                                                         disabled="true"></input></td>
                            </tr>
                            <tr>
                                <td class="label">{{ __('message.City') }} </td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label class="control-label " for="CompanyName">{{ __('message.Company Name') }} :
                                </label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="CompanyName" <?php if ($getProfileInfo != null && isset($getProfileInfo[0]->company)) { ?>value="{{$getProfileInfo[0]->company}}"<?php } ?> placeholder="Enter Company Name" name="CompanyName">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="Country">{{ __('message.Country') }}:</label>
                            </div>
                            <div class="col-sm-8">
                                <input class="form-control field" id="country" <?php if ($getProfileInfo != null && isset($getProfileInfo[0]->country)) { ?>value="{{$getProfileInfo[0]->country}}"<?php } ?> name="Country" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label class="control-label " for="State">{{ __('message.State') }}:</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="administrative_area_level_1" <?php if ($getProfileInfo != null && isset($getProfileInfo[0]->state)) { ?>value="{{$getProfileInfo[0]->state}}"<?php } ?> placeholder="" name="State">
                            </div>
                        </div>
<!--                        <div class="form-group">
                            <div class="col-sm-3">
                                <label class="control-label " for="locality">{{ __('message.locality') }}:</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="locality" <?php //if ($getProfileInfo != null) { ?>value=""<?php //} ?> placeholder="" name="locality">
                            </div>
                        </div>-->
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label class="control-label " for="postal_code">{{ __('message.Postal Code') }}:</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="postal_code" name="postalcode" <?php if ($getProfileInfo != null && isset($getProfileInfo[0]->pin_code)) { ?>value="{{$getProfileInfo[0]->pin_code}}"<?php } ?> placeholder="" name="State">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label class="control-label " for="profile_img">{{ __('message.Profile Photo') }}:</label>
                            </div>
                            <div class="col-sm-8">
                                <?php if ($getProfileInfo != null && isset($getProfileInfo[0]->profile_img)) { ?>
                                    <img src="public/images/profile/{{ $getProfileInfo[0]->profile_img }}" style="height: 100px;width: 100px;margin-bottom: 10px;"/>
                                <?php } ?>
                                <input type="file" id="file-input" name="profile_img" class="form-control-file">
                            </div>
                        </div>
                        <div class="SaveBtnWrapper">
                            <button type="submit" class="btn btnSave">{{ __('message.Save') }}</button>
                            <button type="reset" class="btn btnSave">{{ __('message.Cancel') }}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>