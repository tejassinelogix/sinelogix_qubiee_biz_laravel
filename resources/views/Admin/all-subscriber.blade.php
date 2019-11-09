@extends('Admin.layouts.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('main-content')
<!-- All Product -->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{ __('message.All Subscriber') }}</h1>
            </div>
        </div>
    </div>
    @if (\Session::has('errormeesag'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('errormeesag') !!}</li>
        </ul>
    </div>
    @endif
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="index.php">{{ __('message.Dashboard') }}</a></li>
                    <li class="active">{{ __('message.All Subscriber') }}</li>
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
                        <strong class="card-title">{{ __('message.All Subscriber') }}</strong>
                    </div>

                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('message.Sr. No') }}</th>

                                    <th>{{ __('message.User Name') }}</th>
                                     <th>{{ __('message.Confirmed email') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                foreach ($users as $user) {
                                   
                                    ?>
                                    <tr>
                                        <td> <?php echo $index++; ?></td>
                                        <td><?php echo $user->email; ?></td>
                                         <td>
                                             <?php
                                             if($user->status == 1){?>
                                               <span class="badge badge-success">Confirm </span>  
                                             <?php }  else if($user->status == 0) {?>
                                                  <span class="badge badge-danger">Unsubscribe Subscription </span>
                                             <?php }  else { ?>
                                                      <span class="badge badge-warning">Wating For Subscription </span>    
                                                      <?php }
                                             ?></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                         {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>
</div><!-- /#right-panel -->
<!-- Right Panel -->


@endsection

@section('footerSection')
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
$(function () {
    $("#example1").DataTable();
});
</script>
@endsection