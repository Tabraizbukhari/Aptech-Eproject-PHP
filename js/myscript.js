
function successregister() {
    return swal("successfully registered!", "Now..! you are waiting for admistrator approval of your account Thank You!", "success");		
}

$(document).ready(function () {
    $("#emailid").on("focusout", function () {
    var val = $("#emailid").val();
    $("#emailspan").empty("");
    $.ajax({
        type: "GET",
        url: "function/function.php",
        data: {
            emailcheck: val
        },
        success: function (response) {
            console.log(response);
            if (response == true) {
                $(".btn-submit").prop("disabled", true);
                var tem = '<span  class="p-1 mb-2 text-danger">The email address is already taken</span>';
                $("#emailspan").append(tem);
            } else {
              $("#emailspan").empty("");

                $(".btn-submit").prop("disabled", false);
             
            }
        	}
    	});
    });

    
        $("#username").on("focusout", function () {
        var val = $("#username").val();
        $("#usernamespan").empty("");
        $.ajax({
            type: "GET",
            url: "function/function.php",
            data: {
                usernamecheck: val
            },
            success: function (response) {
                console.log(response);
                if (response == true) {
                    $(".btn-submit").prop("disabled", true);
                    var tem = '<span  class="p-1 mb-2 text-danger">The Username address is already taken</span>';
                    $("#usernamespan").append(tem);
                } else {
                  $("#usernamespan").empty("");
    
                    $(".btn-submit").prop("disabled", false);
                 
                }
                }
            });
        });


})