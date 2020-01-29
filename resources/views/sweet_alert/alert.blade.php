@if (Session::has('sweet_alert.alert'))
<script>
    config = {!! Session::get('sweet_alert.alert') !!};
    shopping_url = "{{ url("/shopping-cart") }}";
    config.showCancelButton= true;
    config.confirmButtonClass= "btn-danger";
    config.confirmButtonText= "View Cart";
    config.cancelButtonText= "Continue Shopping";
    config.closeOnConfirm= false;
    config.closeOnCancel = true;

    swal(config,function(value){
        if(value){
            window.location.href = shopping_url;
        }else{
            return false;
        }
    });
</script>
@endif
