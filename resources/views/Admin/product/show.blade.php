@extends('admin.layouts.app')
@section('main-content')
<div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>All Products</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ route('admin.home')}}">Dashboard</a></li>
                        <!-- <li><a href="add-new-product.php">Add Products</a></li> -->
                        <li class="active">All Products</li>
                    </ol>
                </div>
            </div>
                 @can('products.create', Auth::user())
          <a class='col-lg-offset-5 btn btn-success' href="{{ route('product.create') }}">Add New</a>
        @endcan
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
                                        <th>Sr. No.</th>
                                        <th>Title</th>
                                        <th>sub-Title</th>
                                        <th>slug</th>
                                        <th>Date</th>
                                        @can('products.update',Auth::user())
                                        <th>Edit</th>
                                        @endcan
                                         @can('products.delete', Auth::user())
                                        <th>Delete</th>
                                        @endcan

                                    </tr>
                                </thead>
                                @foreach ($posts as $post)
                                <tbody>
                                     <tr>
                                        <td class="srNo">
                                           {{ $loop->index + 1 }}
                                        </td>
                                        <td>
                                            {{ $post->title['en'] }}
                                        </td>
                                        <td>
                                            {{ $post->subtitle['en'] }}
                                        </td>
                                        <td>{{ $post->slug }}</td>
                                        <td>{{ $post->created_at }} </td>
                                        @can('products.update',Auth::user())
                                        <td>
                                            <div class="operationsblok">
                                                <a href="edit-product.html" data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                               <!--  </a>
                                                <a href="edit-product.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="edit-product.html" data-toggle="tooltip" title="Delete">
                                                    <i class="fa  fa-trash-o"></i>
                                                </a> -->
                                            </div>
                                        </td>
                                          @endcan
                                          
                                    <!--      <td>
                                           <div class="operationsblok">
                                          
                                                <a href="edit-product.html" data-toggle="tooltip" title="Delete">
                                                    <i class="fa  fa-trash-o"></i>
                                                </a>
                                            </div>
                                        </td> -->
                                        @can('products.delete', Auth::user())
                                        <td>
                                          <div class="operationsblok">
                              <form id="delete-form-{{ $post->id }}" method="post" action="{{ route('product.destroy',$post->id) }}" style="display: none">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                              </form>
                              
                              <a href="" onclick="
                              if(confirm('Are you sure, You Want to delete this?'))
                                  {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $post->id }}').submit();
                                  }
                                  else{
                                    event.preventDefault();
                                  }" ><span class="glyphicon glyphicon-trash"></span> <i class="fa  fa-trash-o"></i></a>  
                                  </div>
                            </td>
                                         @endcan
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