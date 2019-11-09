@extends('Admin.layouts.app')

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edit Vendor</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ route('admin.home')}}">Dashboard</a></li>
                        <li><a href="{{ route('user.index') }}">All Vendor</a></li>
                        <li class="active">Edit Vendor</li>
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
            <form role="form" action="{{ route('user.update',$user->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
              <div class="box-body">
              <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                  <label for="name">Vendor Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Vendor Name" value="@if (old('name')){{ old('name') }}@else{{ $user->name }}@endif" readonly="">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="email" value="@if (old('email')){{ old('email') }}@else{{ $user->email }}@endif" readonly="">
                </div>

                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="@if (old('phone')){{ old('phone') }}@else{{ $user->phone }}@endif">
                </div>
                  <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="password" value="@if (old('password')){{ old('password') }}@else{{ $user->password }}@endif">
                  <input type="hidden" class="form-control" id="password_old" name="password_old"  value="@if (old('password')){{ old('password') }}@else{{ $user->password }}@endif"> 
                  </div>
                 <div class="form-group">
                  <label for="confirm_passowrd">Status</label>
                  <div class="checkbox">
                    <label ><input type="checkbox" name="status" 
                    @if (old('status')==1 || $user->status == 1)
                      checked
                    @endif value="1">Status</label>
                  </div>
                </div>

                <div class="form-group">
                <label>Assign Role</label>
                <div class="row">
                  @foreach ($roles as $role)
                      <div class="col-lg-3">
                        <div class="checkbox">
                          <label ><input type="checkbox" name="role[]" value="{{ $role->id }}"
                          @foreach ($user->roles as $user_role)
                            @if ($user_role->id == $role->id)
                              checked
                            @endif
                          @endforeach> {{ $role->name }}</label>
                        </div>
                      </div>
                  @endforeach
                </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href='{{ route('user.index') }}' class="btn btn-warning">Back</a>
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