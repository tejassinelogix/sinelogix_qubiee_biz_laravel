<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   @include('Admin.layouts.head')
</head>
  <?php
    if (Session::has('locale')) {
        $language = $this->language = Session::get('locale');
    } else {
        $language = $this->language = app()->getLocale();
    }
    ?>
<body class="<?php echo $language . 'language'; ?>">
<!-- <div class="wrapper"> -->
	@include('Admin.layouts.header')
@section('main-content')
  @show
	@include('Admin.layouts.footer')
<!-- </div> -->
</body>
</html>