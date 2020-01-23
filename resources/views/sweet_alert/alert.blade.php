@if (Session::has('sweet_alert.alert'))
<script>
    config = {!! Session::get('sweet_alert.alert') !!};
    shopping_url = "{{ url("/shopping-cart") }}";
    config = {"timer":3000,"text":"Item Name :- AC Milan 3D Multi-Color Light\nQuantity :- 19\nPrice :- $ 380","buttons":{"cancel":false,"confirm":false},"title":"Product Added to Cart ","icon":"success"};
    config.buttons.confirm  =  "View Cart";
    config.buttons.cancel =  "Continue Shopping";

    swal(config).then((value) => {
        if(value){
            window.location.href = shopping_url;
        }
    });
</script>
@endif
