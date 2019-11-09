
@extends('Admin.layouts.app')

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>{{ __('message.Add New Permissions') }}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ route('admin.home')}}">{{ __('message.Dashboard') }}</a></li>
                        <li><a href="{{ route('permission.index')}}">{{ __('message.All Permissions') }}</a></li>
                        <li class="active">{{ __('message.Add New Permissions') }}</li>
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
	          <form role="form" action="{{ route('permission.store') }}" method="post">
	          {{ csrf_field() }}
	            <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	              <div class="form-group">
	                <label for="name">{{ __('message.Permission') }}</label>
	                <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('message.Permission') }}">
	              </div>

	              <div class="form-group">
	              	<label for="for">{{ __('message.Permission for') }}</label>
	              	<select name="for" id="for" class="form-control">
	              		<option selected disable>{{ __('message.Select Permission for') }}</option>
	              		<option value="user">{{ __('message.User') }}</option>
	              		<option value="post">{{ __('message.Post') }}</option>
	              		<option value="other">{{ __('message.Other') }}</option>
	              	</select>
	              </div>

	            <div class="form-group">
	              <button type="submit" class="btn btn-primary">{{ __('message.Submit') }}</button>
	              <a href='{{ route('permission.index') }}' class="btn btn-warning">{{ __('message.Back') }}</a>
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