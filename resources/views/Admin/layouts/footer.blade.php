<!--<script src="{{ asset('public/admin/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/plugins.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/main.js') }}"></script>

 data table js 
<script src="{{ asset('public/admin/assets/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/pdfmake.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/datatables-init.js') }}"></script>

<script src="{{ asset('public/admin/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{  asset('public/admin/plugins/ckeditor/ckeditor.js') }}"></script>
 <script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('description');
    });
</script> 

<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#bootstrap-data-table-export').DataTable();
    });
</script>

<script type="text/javascript" src="{{ asset('public/admin/assets/js/nicEdit-latest.js') }}""></script>
<script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
</script>
</body>
</html>-->

    <script src="{{ asset('/admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{ asset('/admin/assets/js/plugins.js')}}"></script>
    <script src="{{ asset('admin/assets/js/main.js')}}"></script>
    

    <!-- data table js -->
    <script src="{{ asset('/admin/assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/lib/data-table/pdfmake.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/lib/data-table/datatables-init.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/jquery.printPage.js')}}"></script>
<script type="text/javascript">
    $("#Locale").on('change', function(){
         var val = $(this).val();    
         $.ajax({
            type:'get',
            url:"/locale/"+val,
            success:function(data){
                location.reload();
                },
            error:function(){
            }
        });
    }); 
</script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#bootstrap-data-table-export').DataTable();
        });
 function addmenumodel(adminid,requestnumber) {
                     //alert(etitle);
                    $("#adminid").val(adminid);
                    $("#requestnumber").val(requestnumber);
           

                }
    </script>
    