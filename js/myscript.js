
function Approvalerror() {
    return  swal({
        title: "Account Not Approved",
        text:  "Your account was not approved, For further detail's contact admistration",
        // icon: "success",
      });
    // return swal("successfully registered!", "Now..! you are waiting for admistrator approval of your account Thank You!", "success");		
}

function successregister() {
    return  swal({
        title: "Successfully Registered!",
        text:  "Now..! you are waiting for admistrator approval of your account Thank You!",
        icon: "success",
      });
    // return swal("successfully registered!", "Now..! you are waiting for admistrator approval of your account Thank You!", "success");		
}
function success(title, text) {
    console.log('done');
    return  swal({
        title: title,
        text:  text,
        icon: "success",
      });
    // return swal("successfully registered!", "Now..! you are waiting for admistrator approval of your account Thank You!", "success");		
}

$(document).ready(function () {
    $("#emailid").on("focusout", function () {
    var val = $("#emailid").val();
    $("#emailspan").empty("");
    if(!$('#emailid').val()){
        $('#emailerror').attr('hidden','hidden');
        $(".btn-submit").prop("disabled", true);
        var tem = '<span  class="p-1 mb-2 text-danger">Required Email Address</span>';
        $("#emailspan").append(tem);

    }else{
        $("#emailspan").empty("");


    $.ajax({
        type: "GET",
        url: "includes/function.php",
        data: {
            emailcheck: val
        },
        success: function (response) {
            if (response == true) {
                $('#emailerror').attr('hidden','hidden');
                $(".btn-submit").prop("disabled", true);
                var tem = '<span  class="p-1 mb-2 text-danger">The email address is already taken</span>';
                $("#emailspan").append(tem);
            } else {
              $("#emailspan").empty("");
              $("#emailid").removeClass("is-invalid");
                $(".btn-submit").prop("disabled", false);
             
            }
        	}
        });
        }
        
    });

        $("#username").on("focusout", function () {
        var val = $("#username").val();
        $("#usernamespan").empty("");

        if(!$('#username').val()){
            $("#usernameerror").attr('hidden','hidden');
            $("#username").addClass("is-invalid");

            var tem = '<span  class="p-1 mb-2 text-danger">The Username Required</span>';
            $("#usernamespan").append(tem);
            
        }else{
            $("#usernamespan").empty("");
            
        $.ajax({
            type: "GET",
            url: "includes/function.php",
            data: {
                usernamecheck: val
            },
            success: function (response) {
                console.log(response);
                if (response == true) {
                    $("#usernameerror").attr('hidden','hidden');
                    $(".btn-submit").prop("disabled", true);
                    var tem = '<span  class="p-1 mb-2 text-danger">The Username address is already taken</span>';
                    $("#usernamespan").append(tem);
                    $("#username").addClass("is-invalid");

                } else {
                    $("#usernameerror").attr('hidden','hidden');
                    $("#usernamespan").empty("");
                    $("#username").removeClass("is-invalid");
                    $(".btn-submit").prop("disabled", false);
                 
                }
                }
            });
        }
        });


        $('#firstname').blur(function()
        {
            $("#firstnamespan").empty();

            if( !$(this).val() ) {
                $(this).addClass("is-invalid");
                $("#firstnameerror").removeAttr('hidden','hidden');
                var tem = '<span  class="p-1 mb-2 text-danger">Required First Name</span>';
                $("#firstnamespan").append(tem);

                $(".btn-submit").prop("disabled", true);

            }else{
                $('#firstnamespan').empty();
                $("#firstnameerror").attr('hidden','hidden');
                $("#firstname").removeClass("is-invalid");
                $(".btn-submit").prop("disabled", false);

            }
        });


        $('#lastname').blur(function()
        {
            $("#lastnamespan").empty();

            if( !$(this).val() ) {
                $(this).addClass("is-invalid");
                $("#lastnameerror").removeAttr('hidden','hidden');
                var tem = '<span  class="p-1 mb-2 text-danger">Required Last Name</span>';
                $("#lastnamespan").append(tem);

                $(".btn-submit").prop("disabled", true);

            }else{
                $('#lastnamespan').empty();
                $("#lastnameerror").attr('hidden','hidden');
                $("#lastname").removeClass("is-invalid");
                $(".btn-submit").prop("disabled", false);

            }
        });

        $('#password').blur(function()
        {
            $("#passwordspan").empty();
            if( !$(this).val() ) {
                $(this).addClass("is-invalid");
                $("#passerror").removeAttr('hidden','hidden');
                var tem = '<span  class="p-1 mb-2 text-danger">Required Password</span>';
                $("#passwordspan").append(tem);

                $(".btn-submit").prop("disabled", true);

            }else if($(this).val().length < 8){
                    $(this).addClass("is-invalid");
                    $("#passerror").removeAttr('hidden','hidden');
                    var tem = '<span  class="p-1 mb-2 text-danger">Required password at least 8 characters</span>';
                    $("#passwordspan").append(tem);

                    $(".btn-submit").prop("disabled", true);
                }else{
                $('#passwordspan').empty();
                $("#passerror").attr('hidden','hidden');
                $("#password").removeClass("is-invalid");
                $(".btn-submit").prop("disabled", false);
                }
            
        });

        $('#compass').blur(function()
        {
            $("#compasswordspan").empty();

            if( !$(this).val() ) {
               
                $(this).addClass("is-invalid");
                $("#compasserror").removeAttr('hidden','hidden');
                var tem = '<span  class="p-1 mb-2 text-danger">Required Confirm Password</span>';
                $("#compasswordspan").append(tem);

                $(".btn-submit").prop("disabled", true);
            }else if($(this).val() != $('#password').val()){
                $(this).addClass("is-invalid");
                $("#compasserror").removeAttr('hidden','hidden');
                var tem = '<span  class="p-1 mb-2 text-danger">Passwords does not match</span>';
                $("#compasswordspan").append(tem);
                $(".btn-submit").prop("disabled", true);   
            }
            else{
               
                $('#compasswordspan').empty();
                $("#compasserror").attr('hidden','hidden');
                $("#compass").removeClass("is-invalid");
                $(".btn-submit").prop("disabled", false);

            }
        });


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                console.log(reader);
                reader.onload = function (e) {
                    $('#imgupload').attr('src', e.target.result);
                    $('#imgfile').attr('src', e.target.result);
                    // var html = '<button class="btn m-1 btn-outline-primary float-right" id="btncloseimges">close</button>';
                    // $('#btncloseimg').append(html);
                    $('.hid').attr('hidden','hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
      
        $('#btncloseimges').on('click', function () {
            console.log('done');
         $('#imgupload').removeAttr('src');
         $("#btncloseimges").attr('hidden','hidden');
         $('.hid').removeAttr('hidden','hidden');
         $('#imgfile').removeAttr('src');
        

        })
        $("#file-upload").change(function(){
         $('#imgfile').removeAttr('src');
            
            $("#btncloseimges").removeAttr('hidden','hidden');

            readURL(this);
            
        });


         //profile image
    $(document).on('change', '#inputGroupFile02', function () {
        
        var property = this.files[0];
        var image_name = property.name;
        var image_extension = image_name.split('.').pop().toLowerCase();

        if($.inArray(image_extension, ['png','jpg','jpeg']) == -1)
        {
            alert('Invalid Image ');
        }else{

            var formdata = new FormData();
            formdata.append('file',property);
        $.ajax({
            url:    'api/updateprofilepic.php',
            type:   'POST',
            data:   formdata,
            enctype:"multipart/form-data",
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {
                var parent = $('#profilepic').parent();
                var image = '<img id="profilepic" width="200" height="180" src='+data+' class="avatar float-md-center avatar-large shadow mr-md-4" alt="">';
                $('#profilepic').remove();
                parent.prepend(image);
            }
        });
     } });



     $( "#searchForm" ).submit(function( event ) {
 
        // Stop form from submitting normally
        event.preventDefault();
        var input = $('#feedbackinput').val();
        var form_data = new FormData();
        form_data.append('feedback', input);
        console.log(input);
        $.ajax({
            url: 'api/Feedback.php',
            type: 'POST',
            data: form_data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {
                swal({
                    title: "FEEDBACK",
                    text:  data,
                    icon:  "success",
                }).then(function(value){
                    if(value){
                         $('.modal').modal('hide');
                         $('#feedbackinput').empty();
                    }
                });
            }
        });
      
        
      });


})