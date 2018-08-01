$(document).ready(function() {

	$("#submitupdateuser").click(function() {

		var iduser = $("#iduserupdate").val();
		var username = $("#userupdate").val();
		var email = $("#emailupdate").val();
		var classid = $("#classupdate").val();
		var admin = $("#adminupdate:checked").val();
		var status = $("#statusupdate:checked").val();

		if((username == "") || (email == "")) {
		  	$("#messageupdateuser").html("<div id=\"messageupdateuser\" class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Por favor, insira todos os dados.</div>");
		} else {
			$.ajax({
				type: "POST",
				url: "updateuser.php",
				data: "iduserupdate=" + iduser + "&userupdate=" + username + "&emailupdate=" + email + "&classupdate=" + classid + "&adminupdate=" + admin + "&statusupdate=" + status,
				success: function(html) {
					var text = $(html).text();
					//Pulls hidden div that includes "true" in the success response
					var response = text.substr(text.length - 4);

				  	if(response == 'true') {
						$("#messageupdateuser").html(html);
					} else {
						$("#messageupdateuser").html(html);
					}
					$.ajax({
			            type: "POST",
			            url: "loadaccounts.php",
			            dataType: "JSON",
			            success: function(data) {
			            	// Empty the table
			            	$("#table-accounts tbody").empty();
			            	// And repopulate with updated data
			                $.each(data, function(index, item) {			           
			                    $("#table-accounts tbody").append(
			                        "<tr><td>" + item.nome + "</td>" + 
			                        "<td>" + item.email + "</td>" + 
			                        "<td>" + item.nivel + " - " + item.dia + " (" + item.turno + ")" + " / " + item.ano_inicio + "</td>" + 
			                        "<td>" + (item.admin == 1 ? 'Sim' : 'Não') + "</td>" + 
			                        "<td>" + (item.status == 1 ? 'Ativo' : 'Não ativo') + "</td>" + 
			                        "<td style=\"text-align:center\">" + 
			                        "<div class=\"btn-group btn-group-sm\">" +
			                        "<button type=\"button\" id=\"" + item.idUsuario + "\" class=\"btn btn-sm btn-default btn-open-modal btn-edit-user\" title=\"Editar\" data-toggle=\"modal\" data-target=\"#editusermodal\"><span class=\"glyphicon glyphicon-pencil\"></span></button>"
			                        );
			                });
			            }
			        });
				},
				beforeSend: function() {
					$("#messageupdateuser").html("<p class='text-center'><img src='images/ajax-loader.gif'></p>")
				}
			});
		}
		return false;
  	});

  	$("#submitupdateclass").click(function() {

  		var idclass = $("#idclassupdate").val();
		var level = $("#levelupdate").val();
		var day = $("#dayupdate").val();
		var shift = $("#shiftupdate").val();
		var year = $("#yearupdate").val();
		var active = $("#activeupdate:checked").val();

		$.ajax({
			type: "POST",
			url: "updateclass.php",
			data: "idclassupdate=" + idclass + "&levelupdate=" + level + "&dayupdate=" + day + "&shiftupdate=" + shift + "&yearupdate=" + year + "&activeupdate=" + active,
			success: function(html) {
				var text = $(html).text();
				//Pulls hidden div that includes "true" in the success response
				var response = text.substr(text.length - 4);

			  	if(response == 'true') {
					$("#messageupdateclass").html(html);
				} else {
					$("#messageupdateclass").html(html);
				}
				$.ajax({
		            type: "POST",
		            url: "loadclasses.php",
		            dataType: "JSON",
		            success: function(data) {
		                // Empty the table
		                $("#table-classes tbody").empty();
		                // And repopulate with updated data
		                $.each(data, function(index, item) {
		                    $("#table-classes tbody").append(
		                        "<tr><td>" + item.nivel + "</td>" + 
		                        "<td>" + item.dia + "</td>" + 
		                        "<td>" + item.turno + "</td>" + 
		                        "<td>" + item.ano_inicio + "</td>" + 
		                        "<td>" + (item.turma_ativa == 1 ? 'Sim' : 'Não') + "</td>" +                     
		                        "<td style=\"text-align:center\">" + 
		                        "<div class=\"btn-group btn-group-sm\">" +
		                        "<button type=\"button\" id=\"" + item.idTurma + "\" class=\"btn btn-sm btn-default btn-open-modal btn-edit-class\" title=\"Editar\" data-toggle=\"modal\" data-target=\"#editclassmodal\"><span class=\"glyphicon glyphicon-pencil\"></span></button>"
		                        );
		                });
		            }
		        });
			},
			beforeSend: function() {
				$("#messageupdateclass").html("<p class='text-center'><img src='images/ajax-loader.gif'></p>")
			}
		});
		return false;
  	});

  	$("#submitnewemail").click(function() {

  		var iduser = $("#idusernewemail").val();
  		var newemail = $("#newemail").val();

		$.ajax({
			type: "POST",
			url: "updateemail.php",
			data: "idusernewemail=" + iduser + "&newemail=" + newemail,
			success: function(html) {
				var text = $(html).text();
				//Pulls hidden div that includes "true" in the success response
				var response = text.substr(text.length - 4);

			  	if(response == 'true') {
					$("#messagenewemail").html(html);
				} else {
					$("#messagenewemail").html(html);
				}
				$.ajax({
			            type: "POST",
			            url: "loadaccounts.php",
			            dataType: "JSON",
			            success: function(data) {
			            	// Empty the table
			            	$("#table-accounts tbody").empty();
			            	// And repopulate with updated data
			                $.each(data, function(index, item) {			           
			                    $("#table-accounts tbody").append(
			                        "<tr><td>" + item.nome + "</td>" + 
			                        "<td>" + item.email + "</td>" + 
			                        "<td>" + item.nivel + " - " + item.dia + " (" + item.turno + ")" + " / " + item.ano_inicio + "</td>" + 
			                        "<td>" + (item.admin == 1 ? 'Sim' : 'Não') + "</td>" + 
			                        "<td>" + (item.status == 1 ? 'Ativo' : 'Não ativo') + "</td>" + 
			                        "<td style=\"text-align:center\">" + 
			                        "<div class=\"btn-group btn-group-sm\">" +
			                        "<button type=\"button\" id=\"" + item.idUsuario + "\" class=\"btn btn-sm btn-default btn-open-modal btn-edit-user\" title=\"Editar\" data-toggle=\"modal\" data-target=\"#editusermodal\"><span class=\"glyphicon glyphicon-pencil\"></span></button>"
			                        );
			                });
			            }
			        });
			},
			beforeSend: function() {
				$("#messagenewemail").html("<p class='text-center'><img src='images/ajax-loader.gif'></p>")
			}
		});
		return false;
  	});

  	$("#submitnewpassword").click(function() {

  		var iduser = $("#idusernewpassword").val();
  		var oldpassword = $("#oldpassword").val();
  		var newpassword1 = $("#newpassword1").val();
  		var newpassword2 = $("#newpassword2").val();

		$.ajax({
			type: "POST",
			url: "updatepassword.php",
			data: "idusernewpassword=" + iduser + "&oldpassword=" + oldpassword + "&newpassword1=" + newpassword1 + "&newpassword2=" + newpassword2,
			success: function(html) {
				var text = $(html).text();
				//Pulls hidden div that includes "true" in the success response
				var response = text.substr(text.length - 4);

			  	if(response == 'true') {
					$("#messagenewpassword").html(html);
				} else {
					$("#messagenewpassword").html(html);
				}
				$.ajax({
			            type: "POST",
			            url: "loadaccounts.php",
			            dataType: "JSON",
			            success: function(data) {
			            	// Empty the table
			            	$("#table-accounts tbody").empty();
			            	// And repopulate with updated data
			                $.each(data, function(index, item) {			           
			                    $("#table-accounts tbody").append(
			                        "<tr><td>" + item.nome + "</td>" + 
			                        "<td>" + item.email + "</td>" + 
			                        "<td>" + item.nivel + " - " + item.dia + " (" + item.turno + ")" + " / " + item.ano_inicio + "</td>" + 
			                        "<td>" + (item.admin == 1 ? 'Sim' : 'Não') + "</td>" + 
			                        "<td>" + (item.status == 1 ? 'Ativo' : 'Não ativo') + "</td>" + 
			                        "<td style=\"text-align:center\">" + 
			                        "<div class=\"btn-group btn-group-sm\">" +
			                        "<button type=\"button\" id=\"" + item.idUsuario + "\" class=\"btn btn-sm btn-default btn-open-modal btn-edit-user\" title=\"Editar\" data-toggle=\"modal\" data-target=\"#editusermodal\"><span class=\"glyphicon glyphicon-pencil\"></span></button>"
			                        );
			                });
			            }
			        });
			},
			beforeSend: function() {
				$("#messagenewpassword").html("<p class='text-center'><img src='images/ajax-loader.gif'></p>")
			}
		});
		return false;
  	});
});
