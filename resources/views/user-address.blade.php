
<div class="innerPageSection">
    <div class="containerWrapper">
        <div class="breadcrumbs">
            <ul>
                <p><b>{{ __('message.Welcome') }}, {{ Auth::user()->name }}</b></p>
                <li><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> </li>
                <li>{{ __('message.My Account') }}</li>
            </ul>
        </div>
        <div class="space10"></div>
        <div class="row">
            @include('user-sidebar')
            <?php //echo "<pre>"; print_r($user_address); ?>
            <div class="col-md-10 col-sm-10">
                <h3 class="headingFull"><span>{{ __('message.Address') }}</span></h3>
                <div class="row">
                    @foreach($user_profile as $profile)
                    <div class="col-sm-4">
                        <div class="addressShippingSelect">
                            <h5><i class="fa fa-user"></i>{{ Auth::user()->name }}</h5>
                            <p><i class="fa fa-map-marker"></i>{{ $profile->address }}</p>
                            <p>{{ $profile->state }}, {{ $profile->country }}.</p>
                            <!--<p><i class="fa fa-phone"></i> Phone: <strong>97655 97655</strong></p>-->
                            <div class="footerAddressShipping">
                                <div class="btn-del">
                                    <a href="{{ url("/delete-address/{$profile->id}") }}"><i class="fa fa-close"></i>{{ __('message.Delete') }}</a>
                                </div>
                                <div class="btn-edit">
                                    <!--<a href="confirm-address.php#" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i> Edit</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @foreach($user_address as $add)
                    <?php                     //print_r($add);?>
                    <div class="col-sm-4">
                        <div class="addressShippingSelect">
                            <h5><i class="fa fa-user"></i>{{ $add->name }}</h5>
                            <p><i class="fa fa-map-marker"></i>{{ $add->address }}, {{ $add->city }}</p>
                            <p>{{ $add->state }}, {{ $add->country }}.</p>
                            <!--<p><i class="fa fa-phone"></i> Phone: <strong>97655 97655</strong></p>-->
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
                    <div class="space15"></div>
                    <div class="col-sm-12 text-center">
                        <button type="button" data-toggle="modal" data-target="#add-new" class="btn btn-primary btn-lg btn-rounded">{{ __('message.Add New Address') }}  <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</div>
<div class="space30"></div>

<!-- Modal -->
<div class="modal fade" id="add-new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form method="POST" action="{{ route('addUserAddress') }}">
    @csrf
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ __('message.Add New Address') }} </h4>
            </div>
            <div class="modal-body">
                <div class="modal-form-block"> 
                    <div class="col-sm-6">
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">Address Name</label> 
                            <input class="p-r-25" name="name" required="" placeholder="Address Name" type="text">
                        </div>
                            <!--new--> 
                          <!-- Text input-->
                            <div class="form-group">
                            <label class="control-label" for="textinput">Street Name/No.</label> 
                            <input class="p-r-25" name="streetname" id="streetname" required="" placeholder="Street Name/No." type="text">
                        </div>
                      
                          <!-- Text input-->                       
                        <div class="form-group">
                            <label class="control-label" for="textinput">{{ __('message.Country') }}</label>
                            <input class="p-r-25" name="Country" required="" type="text">
                        </div>
                            <!--new--> 
                             <div class="form-group">
                            <label class="control-label" for="textinput">Phone</label>
                            <input class="p-r-25" name="phone" required="" placeholder="Phone" type="number">  
                        </div>
                      
                    </div>

                    <div class="col-sm-6">
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">Building Name/No</label> 
                            <input class="p-r-25" name="address" required="" placeholder="Building, Street Name/No" placeholder="Building,Street Name/No" type="text">
                        </div>
                          <div class="form-group">
                            <label class="control-label" for="textinput">{{ __('message.Landmark') }}</label>
                            <input class="p-r-25" name="landmark" required="" placeholder="Landmark" type="text">
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">{{ __('message.City') }}</label>
                            <input class="p-r-25" name="City" required="" type="text">
                        </div>
                          <!-- Text input-->
<!--                        <div class="form-group">
                            <label class="control-label" for="textinput">{{ __('message.State') }}</label>
                            <input class="p-r-25" name="State" required="" type="text">
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
                </div>
            </div><!-- end modal body -->
            <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}" id="user_id">
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-lg btn-rounded">
                    {{ __('message.Save') }}
                </button>
                <!--<a href="review-order.php" class="btn btn-primary btn-lg btn-rounded">Register</a>-->
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('message.Close') }}</button>
            </div>
        </div><!-- end modal content -->
    </div>
    </form>
</div><!-- end modal -->

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ __('message.Update Address') }}</h4>
            </div>
            <div class="modal-body">
                <div class="modal-form-block"> 
                    <div class="col-sm-6">
                        <!-- Text input-->
                        <div class="form-group">                    
                            <label class="control-label" for="textinput">{{ __('message.Name') }}</label>              
                            <input class="p-r-25" name="textinput" required="" type="text" value="John Elton">                  
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">{{ __('message.Landmark') }}</label>
                            <input class="p-r-25" name="textinput" required="" type="text" value="19, Somewhere in New York">
                        </div>
                        <!-- Text input-->
                        <div class="form-group">                  
                            <label class="control-label" for="textinput">{{ __('message.Pincode') }}</label> 
                            <input class="p-r-25" name="textinput" required="" type="text" value="000002">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="textinput">{{ __('message.Country') }}</label>
                            <input class="p-r-25" name="textinput" required="" type="text" value="USA">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">{{ __('message.Address') }}</label> 
                            <input class="p-r-25" name="textinput" required="" type="text" value="Some address near in New York City New York">
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">{{ __('message.City') }}</label>
                            <input class="p-r-25" name="textinput" required="" type="text" value="New York">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textinput">{{ __('message.State') }}</label>
                            <input class="p-r-25" name="textinput" required="" type="text" value="NY">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="textinput">{{ __('message.Contact') }}</label>
                            <input class="p-r-25" name="textinput" required="" type="number" value="97655 97655">  
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div><!-- end modal body -->
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary btn-lg btn-rounded" value="Update"/>          
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('message.Close') }}</button>
            </div>
        </div><!-- end modal content -->
    </div>
</div><!-- end modal -->




