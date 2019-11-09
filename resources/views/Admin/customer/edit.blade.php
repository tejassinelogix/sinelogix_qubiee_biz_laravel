<?php //print_r($user_profile);  ?>
@extends('Admin.layouts.app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Customer</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('admin.home')}}">Dashboard</a></li>
                    <li><a href="{{ route('customer.index') }}">All Customer</a></li>
                    <li class="active">Edit Customer</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body card-block">
                        @include('Admin.includes.messages')
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('customer.update',$user->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <!--              <div class="col-lg-offset-3 col-lg-6">-->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">{{ __('message.Name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="First Name" value="@if (old('name')){{ old('name') }}@else{{ $user->name }}@endif" >
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="@if (old('email')){{ old('email') }}@else{{ $user->email }}@endif" >
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="address" value="<?php if (!empty($user_profile)) { ?>@if (old('address')){{ old('address') }}@else{{ $user_profile[0]->address }}@endif<?php } ?>">
                                    </div>
                                  

                                    <div class="form-group">
                                        <label for="contact">Contact</label>
                                        <input type="text" class="form-control" id="contact" name="contact" placeholder="contact" value="<?php if (!empty($user_profile)) { ?>@if (old('contact')){{ old('contact') }}@else{{ $user_profile[0]->contact }}@endif <?php } ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="pin_code">Postal Code</label>
                                        <input type="text" class="form-control" id="postalcode" name="postalcode" placeholder="Postal Code" value="<?php if (!empty($user_profile)) { ?>@if (old('postalcode')){{ old('postalcode') }}@else{{ $user_profile[0]->pin_code }}@endif<?php } ?>">
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                          <div class="form-group">
                                        <label for="name">{{ __('message.Last Name') }}</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" value="@if (old('lastname')){{ old('lastname') }}@else{{ $user->lastname }}@endif" >
                                    </div>
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control" id="state" name="state" placeholder="state" value="<?php if (!empty($user_profile)) { ?>@if (old('state')){{ old('state') }}@else{{ $user_profile[0]->state }}@endif<?php } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control" id="country" name="country" placeholder="country" value="<?php if (!empty($user_profile)) { ?>@if (old('country')){{ old('country') }}@else{{ $user_profile[0]->country }}@endif<?php } ?>">
                                    </div>
                                    <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="password" value="@if (old('password')){{ old('password') }}@else{{ $user->password }}@endif">
                                    <input type="hidden" class="form-control" id="password_old" name="password_old"  value="@if (old('password')){{ old('password') }}@else{{ $user->password }}@endif"> 
                                    </div>
                                       
                                    
                                </div>
                                
                                <div class="form-group">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href='{{ route('customer.index') }}' class="btn btn-warning">Back</a>
                                    </div>

                                </div>
                        </div>
                        </form>
                    
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>
</div><!-- /#right-panel -->






@endsection