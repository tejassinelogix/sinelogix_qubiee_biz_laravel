<html class="no-js" lang="">
    <head>
        @include('Admin.layouts.head')
    </head>
    <body>
        <div class="wrapper">
            @include('Admin.layouts.header')
            <!-- Header-->
            <!-- Header-->
            <!-- All Product -->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
<!--                <div class="page-title">
                    <h1>Settings</h1>
                </div>-->
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="<?php echo url(Request::segment(1).'/dashboard') ?>">{{ __('message.Dashboard') }}</a></li>
                        <li class="active">Settings</li>
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
                        <div class="card-header">
                            <strong class="card-title">Qubiee Settings</strong>
                        </div>
                        <div class="card-body">
                                 @if(session('info'))
                            <div class="alert alert-success">
                                {{ session('info') }}
                            </div>
                            @endif
                            @if(session('infofiled'))
                            <div class="alert alert-danger">
                                {{ session('infofiled') }}
                            </div>
                            @endif
                            @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                            @endforeach
                            @endif
                               <form method="POST" action="{{ route('updatePassword') }}" class="form-horizontal">
                                @csrf
                                  <div class="form-group row">
                                    <label for="old password" class="col-md-4 col-form-label text-md-right">{{ __('message.Old Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="oldpassword" type="password" class="form-control{{ $errors->has('oldpassword') ? ' is-invalid' : '' }}" name="oldpassword" required>

                                        @if ($errors->has('oldpassword'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('oldpassword') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('message.Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('message.Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" value="{{ Auth::user()->id }}" id="user_id" placeholder="Enter Name" name="user_id">
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('message.Change Password') }} <i class="fa fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
<!--                            <form action="" method="post" class="form-horizontal">
                                <div class="row form-group">
                                 
                                    <div class="col col-md-2">
                                        <label for="" class=" form-control-label">Password</label>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <input type="password" name="" placeholder="" class="form-control">
                                    </div>
                                    <div class="space5"></div>
                                    <div class="col col-md-2">
                                        
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <button type="submit" class="btn btn-primary pull-right">Create New User <i class="fa fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </form>-->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>
        <!-- All Product -->



    </div><!-- /#right-panel -->

    <!-- Right Panel -->

      <!-- Right Panel -->

            <script src="{{ asset('/admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
            <script src="{{ asset('/admin/assets/js/plugins.js')}}"></script>
            <script src="{{ asset('/admin/assets/js/main.js')}}"></script>

            <!-- data table js -->
            <script src="{{ asset('/admin/assets/js/lib/data-table/datatables.min.js')}}"></script>
            <script src="{{ asset('/admin/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
            <script src="{{ asset('/admin/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
            <script src="{{ asset('/admin/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
            <script src="{{ asset('/admin/assets/js/lib/data-table/jszip.min.js')}}"></script>
            <script src="{{ asset('/admin/assets/js/lib/data-table/pdfmake.min.js')}}"></script>
            <script src="{{ asset('/admin/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
            <script src="{{ asset('/admin/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
            <script src="{{ asset('/admin/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
            <script src="{{ asset('/admin/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
            <script src="{{ asset('/admin/assets/js/lib/data-table/datatables-init.js')}}"></script>


</body>

</html>