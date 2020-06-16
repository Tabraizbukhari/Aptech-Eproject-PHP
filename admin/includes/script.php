<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>

  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

  
 //profile image
//  $(document).on('change', '#profileimage', function () {
// var file_data = $('#profileimage').prop('files')[0];
// var form_data = new FormData();
// form_data.append('file', file_data);
// // var image_extension = image_name.split('.').pop().toLowerCase();

// // if($.inArray(image_extension, ['png','jpg','jpeg']) == -1)
// // {
// //     alert('Invalid Image ')
// // }else{
// console.log('ajax');
// $.ajax({
//     url: BaseURL + 'profileimage',
//     type: 'POST',
//     data: form_data,
//     enctype: "multipart/form-data",
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
//     },
//     cache: false,
//     processData: false,
//     contentType: false,
//     success: function (data) {

//         var parent = $('#profilepicture').parent();
//         var image = '<img id="profilepicture" src="' + data + '" class="avatar float-md-center avatar-large shadow mr-md-4" alt="">';
//         $('#profilepicture').remove();
//         parent.prepend(image);
//     }
// });
// })





  
</script>