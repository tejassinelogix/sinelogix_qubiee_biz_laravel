@extends('admin.layouts.app')


@section('main-content')


<div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Add New Product</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Dashboard</a></li>
                        <li><a href="{{ route('product.index') }}">All Products</a></li>
                        <li class="active">Add New Product</li>
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
           <form role="form" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
              <div class="box-body">
                <div class="col-lg-6">
                  <div class="form-group">
                  <label for="title">Product Title </label>
                  <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
                </div>
                     <div class="form-group">
                  <label for="subtitle">Product sub-Title </label>
                  <input type="text" name="subtitle" class="form-control" id="subtitle" placeholder="Enter Sub-Title">
                </div>
                   <div class="form-group">
                  <label for="subtitle">Product Slug </label>
                  <input type="text" name="slug" class="form-control" id="slug" placeholder="Enter slug">
                </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                  <label for="productprice">Product price</label>
                  <input type="text" name="productprice" class="form-control" id="productprice" placeholder="Enter Product price">
                </div>
                     <div class="form-group">
                  <label for="orignalprice ">Product Orignal Price </label>
                  <input type="text" name="orignalprice" class="form-control" id="orignalprice" placeholder="Enter Orignal Price">
                </div>
                   <div class="form-group">
                  <label for="maincategory">Main category</label>
                  <input type="text" name="maincategory" class="form-control" id="maincategory" placeholder="Enter Main Category">
                </div>
                </div>
                   <div class="col-lg-6">
                  <div class="form-group">
                  <label for="metatitle">Meta Title</label>
                  <input type="text" name="metatitle" class="form-control" id="metatitle" placeholder="Enter Meta Title">
                </div>
                    
                   <div class="form-group">
                  <label for="metakeyword">Meta Keyword</label>
                  <input type="text" name="metakeyword" class="form-control" id="metakeyword" placeholder="Enter Meta Keyword">
                </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                  <label for="offer">Offer</label>
                  <input type="text" name="offer" class="form-control" id="offer" placeholder="Enter Offer">
                </div>
                 </div>
                 <div class="col-lg-6">
                  <div class="form-group">
                  <label for="image">File input</label>
                  <input type="file" id="exampleInputFile" name="image">

                
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="status" value="1"> Publish
                  </label>
                </div>
                    <div class="form-group" style="margin-top:18px;">
                                <label>Select Category</label>
                                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">
                                  @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                 </div>
              
               
              </div>
              <!-- /.box-body -->
                  <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Bootstrap WYSIHTML5
                <small>Simple and fast</small>
              </h3> -->
              <!-- tools box -->
          <!--     <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                
              </div> -->
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              
                <textarea name="description" id="description" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
           
            </div>
          </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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