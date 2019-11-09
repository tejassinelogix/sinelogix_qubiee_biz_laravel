@extends('admin.layouts.app')


@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Editors
        <small>Advanced form element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class=" col-md-12">
                <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Title</h3>
            </div>
          @include('includes.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('tag.store') }}" method="post">
               {{ csrf_field() }}
 
              <div class="box-body">
                <div class="col-lg-offset-3 col-lg-6">
                  <div class="form-group">
                  <label for="title">Tag Title </label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter Tag Title">
                </div>
                 
                   <div class="form-group">
                  <label for="subtitle">Tag Slug </label>
                  <input type="text" name="slug" class="form-control" id="slug" placeholder="Enter Tag slug">
                </div>
                   <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
                </div>
              
               
              </div>
              <!-- /.box-body -->
                  <!-- /.box -->

            </form>
          </div>
        

       
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection