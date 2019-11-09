@extends('Admin.layouts.app')

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Add Vendor Commission</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ route('admin.home')}}">Dashboard</a></li>
                        <li><a href="<?php echo url(Request::segment(1).'/addvencommission') ?>">All Commissions</a></li>
                        <li class="active">Add Vendor Commission</li>
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
             @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                        @endif
                       
            <form role="form" action="<?php echo url('/admin/editcommission') ?>" method="post">
            {{ csrf_field() }}
           <div class="box-body">
              <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                  <label for="name">Vendor Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Vendor Name" value="@if (old('name')){{ old('name') }}@else{{ $user[0]->name }}@endif" readonly="">
                  <input type="hidden" value="<?php echo $user[0]->id; ?>" name="vendorid" id="vendorid">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="email" value="@if (old('email')){{ old('email') }}@else{{ $user[0]->email }}@endif" readonly="">
                </div>

                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="@if (old('phone')){{ old('phone') }}@else{{ $user[0]->phone }}@endif" readonly="">
                </div>
                  <div class="form-group">
                  <label for="Rate">Moving Fees Rate ($)</label>
                 
                  <input type="number" class="form-control quantity" id="rate" name="rate" placeholder="Rate" value="@if (old('rate')){{ old('rate') }}@else<?php if( isset($user['0']['rate_admins']['rate'])){?>{{ $user[0]->rate_admins->rate }}<?php }else{ } ?>@endif">
                  </div>
                  <div class="form-group">
                  <label for="Rate">$ 0-100 (Percentage)</label>
                 
                  <input type="number" class="form-control quantity" id="lesshundred" name="lessthanhundred" placeholder="less than hundred" value="@if (old('lesshundred')){{ old('lesshundred') }}@else<?php if( isset($user['0']['rate_admins']['lesshundred'])){?>{{ $user[0]->rate_admins->lesshundred }}<?php }else{ } ?>@endif">
                  </div>
                  <div class="form-group">
                  <label for="Rate">$ 101+ (Percentage)</label>
                 
                  <input type="number" class="form-control quantity" id="greterhundred" name="greterthanhundred" placeholder="greter than hundred" value="@if (old('greterhundred')){{ old('greterhundred') }}@else<?php if( isset($user['0']['rate_admins']['greterhundred'])){?>{{ $user[0]->rate_admins->greterhundred }}<?php }else{ } ?>@endif">
                  </div>
                

                <div class="form-group">
               

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href='<?php echo url(Request::segment(1).'/addvencommission') ?>' class="btn btn-warning">Back</a>
              </div>
                
              </div>
          
        </div>

            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>
</div><!-- /#right-panel -->






@endsection