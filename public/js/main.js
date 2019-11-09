 $.noConflict();

jQuery(document).ready(function ($) {

 $("#Locale").on('change', function(){
         var val = $(this).val();    
         $.ajax({
            type:'get',
            url:"locale/"+val,
            success:function(data){
                location.reload();
                },
            error:function(){
            }
        });
    });   
 
});