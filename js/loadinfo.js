$(document).ready(function() {

    // Reset forms when close button pressed
    $(document).on("click", ".close-reset", function() {
        resetForms();
    });

    // Load user's info when open the edit modal
    $(document).on("click", ".btn-edit-user", function() {
        var userid = $(this).attr("id");
        $.ajax({
            type: "POST",
            url: "loaduser.php",
            data: "iduser=" + userid,
            dataType: "JSON",
            success: function(data) {                
                $("#iduserupdate").val(userid);
                $("#userupdate").val(data.nome);
                $("#emailupdate").val(data.email);
                $("#classupdate").val(data.fk_idTurma);
                $("#adminupdate").prop('checked', data.admin == 1);
                $("#statusupdate").prop('checked', data.status == 1);
                // Open modal and show account's info
                $("#editusermodal").modal("show");
                // Clean modal after closing it
                $("#editusermodal").on("hidden.bs.modal", function() {
                    resetButtons();
                });
            }
        });
        return false;
    });    

    // Load classe's info when open the edit modal
    $(document).on("click", ".btn-edit-class", function() {
        var classid = $(this).attr("id");
        $.ajax({
            type: "POST",
            url: "loadclass.php",
            data: "idclass=" + classid,
            dataType: "JSON",
            success: function(data) {
                $("#idclassupdate").val(classid);
                $("#levelupdate").val(data.nivel);
                $("#dayupdate").val(data.dia);
                $("#shiftupdate").val(data.turno);
                $("#yearupdate").val(data.ano_inicio);
                $("#activeupdate").prop('checked', data.turma_ativa == 1);
                // Open modal and show classe's info
                $("#editclassmodal").modal("show");
                // Clean modal after closing it
                $("#editclassmodal").on("hidden.bs.modal", function() {
                    resetButtons();
                });
            }
        });
        return false;
    });

    // Open modal to update user's email 
    $("#btn-new-email").click(function() {
        $("#newemailmodal").modal("show");
        $("#newemailmodal").on("hidden.bs.modal", function() {
            resetButtons();
            resetForms();
        });
    });

    // Open modal to update user's password
    $("#btn-new-password").click(function() {
        $("#newpasswordmodal").modal("show");
        $("#newpasswordmodal").on("hidden.bs.modal", function() {
            resetButtons();
            resetForms();
        });
    });

    // Fire create account tab to be the first
    $("#tab-create-account").tab("show");

    // Populate classes options for create account
    $("#tab-create-account").on("shown.bs.tab", function() {
        $.ajax({
            type: "POST",
            url: "loadclasses.php",
            data: "onlyactives=" + true,
            dataType: "JSON",
            success: function(data) {
                // Empty the table
                $("#class").empty();
                // And repopulate with updated data
                $.each(data, function(index, item) {
                    $("#class").append(
                        $("<option></option>")
                            .attr("value", item.idTurma)
                            .text(item.nivel + " - " + item.dia + " (" + item.turno + ")" + " / " + item.ano_inicio));
                    $("#classupdate").append(
                        $("<option></option>")
                            .attr("value", item.idTurma)
                            .text(item.nivel + " - " + item.dia + " (" + item.turno + ")" + " / " + item.ano_inicio));
                });
            }
        });
        resetForms();
    });

    // Populate account's table
    $("#tab-accounts").on("shown.bs.tab", function() {
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
        resetForms();
    });

    // Populate classe's table
    $("#tab-classes").on("shown.bs.tab", function() {
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
        resetForms();
    });

    function resetForms() {
        $("#usersignup").trigger("reset");
        $("#newclass").trigger("reset");
        $("#formnewemail").trigger("reset");
        $("#formnewpassword").trigger("reset");
    }

    function resetButtons() {
        $("#messagecreateuser").html("<div id=\"messagecreateuser\"></div>");
        $("#messagecreateclass").html("<div id=\"messagecreateclass\"></div>");
        $("#messageupdateuser").html("<div id=\"messageupdateuser\"></div>");
        $("#messageupdateclass").html("<div id=\"messageupdateclass\"></div>");
        $("#messagenewemail").html("<div id=\"messagenewemail\"></div>");
        $("#messagenewpassword").html("<div id=\"messagenewpassword\"></div>");
    }
});
