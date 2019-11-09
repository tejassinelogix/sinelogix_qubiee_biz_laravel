@extends('admin.layouts.app')

 
@section('main-content')

  <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>All Categories</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ route('admin.home')}}">Dashboard</a></li>
                        <li class="active">All Categories</li>
                    </ol>
                </div>
            </div>
            <a class='col-lg-offset-5 btn btn-success' href="{{ route('category.create') }}">Add New</a>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                      <th>S.No</th>
                                      <th>Tag Name</th>
                                      <th>Slug</th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                    </tr>
                                </thead>
                           <tbody>
                        @foreach ($categories as $category)
                          <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                              <td>
                      <div class="operationsblok">
                                      <a href="{{ route('category.edit',$category->id) }}"><span class="glyphicon glyphicon-edit"></span><i class="fa fa-pencil"></i></a>
                             </div>
                              </td>
                              <td>
                                         <div class="operationsblok">
                                <form id="delete-form-{{ $category->id }}" method="post" action="{{ route('category.destroy',$category->id) }}" style="display: none">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                </form>
                                <a href="" onclick="
                                if(confirm('Are you sure, You Want to delete this?'))
                                    {
                                      event.preventDefault();
                                      document.getElementById('delete-form-{{ $category->id }}').submit();
                                    }
                                    else{
                                      event.preventDefault();
                                    }" ><span class="glyphicon glyphicon-trash"></span><i class="fa  fa-trash-o"></i></a>
                            </div>
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