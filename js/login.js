$(document).ready(function () {
    "use strict";
    $("#submit").click(function () {

        var email = $("#email").val();
        var password = $("#password").val();

        if((email == "") || (password == "")) {
            $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Por favor, insira um email e uma senha.</div>");
        } else {
            $.ajax({
                type: "POST",
                url: "checklogin.php",
                data: "email=" + email + "&password=" + password,
                dataType: "JSON",
                success: function(html) {
                    if(html.response == 'true') {
                        location.reload();
                        return html.email;
                    } else {
                        $("#message").html(html.response);
                    }
                },
                error: function (textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(errorThrown);
                },
                beforeSend: function () {
                    $("#message").html("<p class='text-center'><img src='images/ajax-loader.gif'></p>");
                }
            });
        }
        return false;
    });
});
