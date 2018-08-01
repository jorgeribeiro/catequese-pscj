$(document).ready(function() {

	$("#submitsignup").click(function() {

		var username = $("#newuser").val();
		var surname = $("#surname").val();
		var password = $("#password1").val();
		var password2 = $("#password2").val();
		var email = $("#email").val();
		var classid = $("#class").val();
		var admin = $("#admin:checked").val();

		if((username == "") || (surname == "") || (password == "") || (email == "")) {
		  	$("#messagesignup").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Por favor, insira todos os dados.</div>");
		} else {
			$.ajax({
				type: "POST",
				url: "createuser.php",
				data: "newuser=" + username + "&surname=" + surname + "&password1=" + password + "&password2=" + password2 + "&email=" + email + "&class=" + classid + "&admin=" + admin,
				success: function(html) {
					var text = $(html).text();
					//Pulls hidden div that includes "true" in the success response
					var response = text.substr(text.length - 4);

				  	if(response == 'true') {
						$("#messagesignup").html(html);
					} else {
						$("#messagesignup").html(html);
					}
				},
				beforeSend: function() {
					$("#messagesignup").html("<p class='text-center'><img src='images/ajax-loader.gif'></p>")
				}
			});
		}
		return false;
  	});
});
