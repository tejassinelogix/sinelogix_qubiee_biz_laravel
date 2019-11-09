
@extends('Admin.layouts.app')
@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
 
@section('main-content')

  <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>{{ __('message.All Permission') }}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ route('admin.home')}}">{{ __('message.Dashboard') }}</a></li>
                        <li class="active">{{ __('message.All Permission') }}</li>
                    </ol>
                </div>
            </div>
            <a class='col-lg-offset-5 btn btn-success' href="{{ route('permission.create') }}">{{ __('message.Add New') }}</a>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">{{ __('message.All Permission') }}</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                       <th>{{ __('message.Sr. No') }}</th>
                                      <th>{{ __('message.Permission Name') }}</th>
                                      <th>{{ __('message.Permission For') }}</th>
                                      <th>{{ __('message.Edit') }}</th>
                                      <th>{{ __('message.Delete') }}</th>
                                    </tr>
                                </thead>
                           <tbody>
                        @foreach ($permissions as $permission)
                          <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->forper }}</td>
                              <td><a href="{{ route('permission.edit',$permission->id) }}"><span class="glyphicon glyphicon-edit"></span><i class="fa fa-pencil"></i></a></td>
                              <td>
                                <form id="delete-form-{{ $permission->id }}" method="post" action="{{ route('permission.destroy',$permission->id) }}" style="display: none">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                </form>
                                <a href="" onclick="
                                if(confirm('Are you sure, You Want to delete this?'))
                                    {
                                      event.preventDefault();
                                      document.getElementById('delete-form-{{ $permission->id }}').submit();
                                    }
                                    else{
                                      event.preventDefault();
                                    }" ><span class="glyphicon glyphicon-trash"></span><i class="fa  fa-trash-o"></i></a>
                              </td>
                            </tr>
                          </tr>
                        @endforeach
                        </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>
</div><!-- /#right-panel -->


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