 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Qubiee</title>
    <meta name="description" content="Qubiee">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="icon.png">

    <link rel="stylesheet" href="{{ asset('/admin/assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/cs-skin-elastic.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('/admin/assets/scss/style.css')}}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/datepicker/bootstrap-datetimepicker.css')}}">
     <!--start css for test editor -->
    <link rel="stylesheet" href="{{ asset('/admin/assets/dist/summernote-bs4.css')}}">
    <!--start css for test editor -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
<script>
            function readURL(input) {
                   if (input.files && input.files[0]) {
                       var reader = new FileReader();

                       reader.onload = function (e) {
                           $('#blah')
                               .attr('src', e.target.result);
                       };

                       reader.readAsDataURL(input.files[0]);
                   }
               }
               
               function readURL1(input) {
                   if (input.files && input.files[0]) {
                       var reader = new FileReader();

                       reader.onload = function (e) {
                           $('#blah1')
                               .attr('src', e.target.result);
                       };

                       reader.readAsDataURL(input.files[0]);
                   }
               }
               
               
               
             $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img style="height:100px;width:125px;padding:5px;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#product-file').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});  


$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img style="height:100px;width:125px;padding:5px;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#fileinputproduct').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});  
        </script>