@extends('admin.layouts.app')

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Add New Category</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ route('admin.home')}}">Dashboard</a></li>
                        <li><a href="{{ route('category.index')}}">All Categories</a></li>
                        <li class="active">Add New Category</li>
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
                    @include('includes.messages')      
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('category.store') }}" method="post">
            {{ csrf_field() }}
              <div class="box-body">
              <div class="col-lg-offset-6 col-lg-6">
                <div class="form-group">
                  <label for="name">Category title</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Category Title">
                </div>

                <div class="form-group">
                  <label for="slug">Category Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                </div>
                  <div class="form-group">
                                    <label for="file-input" class=" form-control-label">Product Image
                                    </label>
                                    <input type="file" id="file-input" name="file-input" class="form-control-file">
                                </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href='{{ route('category.index') }}' class="btn btn-warning">Back</a>
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