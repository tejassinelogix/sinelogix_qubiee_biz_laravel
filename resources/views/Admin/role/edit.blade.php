
@extends('Admin.layouts.app')

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edit Category</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ route('admin.home')}}">Dashboard</a></li>
                        <li><a href="{{ route('role.index') }}">All Roles</a></li>
                        <li class="active">Edit Role</li>
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
	          <form role="form" action="{{ route('role.update',$role->id) }}" method="post">
	          {{ csrf_field() }}
	          {{ method_field('PATCH') }}
	            <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	              <div class="form-group">
	                <label for="name">Role title</label>
	                <input type="text" class="form-control" id="name" name="name" placeholder="role Title" value="{{ $role->name }}">
	              </div>

	              				<div class="row">
	              	              <div class="col-lg-4">
	              	              	<label for="name">Posts Permissions</label>
	              	              	@foreach ($permissions as $permission)
	              	              		@if ($permission->forper == 'post')
	              			              	<div class="checkbox">
	              			              		<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
	              			              		@foreach ($role->permissions as $role_permit)
	              			              			@if ($role_permit->id == $permission->id)
	              			              				checked
	              			              			@endif
	              			              		@endforeach
	              			              		>{{ $permission->name }}</label>
	              			              	</div>
	              	              		@endif
	              	              	@endforeach
	              	              </div>
	              	              <div class="col-lg-4">
	              	              	<label for="name">User Permissions</label>
	                	              	@foreach ($permissions as $permission)
	                	              		@if ($permission->forper == 'user')
	                			              	<div class="checkbox">
	                			              		<label><input type="checkbox" name='permission[]' value="{{ $permission->id }}"
	                			              		@foreach ($role->permissions as $role_permit)
	                			              			@if ($role_permit->id == $permission->id)
	                			              				checked
	                			              			@endif
	                			              		@endforeach
	                			              		>{{ $permission->name }}</label>
	                			              	</div>
	                	              		@endif
	                	              	@endforeach
	              	              </div>

	              	              <div class="col-lg-4">
	              	              	<label for="name">Crud Permissions</label>
	                	              	@foreach ($permissions as $permission)
	                	              		@if ($permission->forper == 'other')
	                			              	<div class="checkbox">
	                			              		<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
	                			              		@foreach ($role->permissions as $role_permit)
	                			              			@if ($role_permit->id == $permission->id)
	                			              				checked
	                			              			@endif
	                			              		@endforeach
	                			              		>{{ $permission->name }}</label>
	                			              	</div>
	                	              		@endif
	                	              	@endforeach
	              	              </div>
	              	            </div>

	            <div class="form-group">
	              <button type="submit" class="btn btn-primary">Submit</button>
	              <a href='{{ route('role.index') }}' class="btn btn-warning">Back</a>
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