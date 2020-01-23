<!DOCTYPE html>
<html>
<head>
	<title>Laravel Sweet Alert Notification</title>
	<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
	<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
	<link rel="stylesheet" href="{{ URL::to('public/assets/css/sweetalert.min.css') }}" />
    <script src="{{ URL::to('public/assets/js/sweetalert.min.js') }}"></script>
</head>
<body>


<h1 class="text-center">Laravel Sweet Alert Notification</h1>
@include('sweet_alert.alert')


</body>
</html>