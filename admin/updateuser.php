<?php
require 'includes/functions.php';

$iduser = $_POST['iduserupdate'];
$newuser = $_POST['userupdate'];
$newemail = str_replace(' ', '', $_POST['emailupdate']);
$classid = $_POST['classupdate'];
$admin = $_POST['adminupdate'];
$status = $_POST['statusupdate'];

// To protect MySQL injection
$newuser = stripslashes($newuser);
$newemail = stripslashes($newemail);

//Validation rules
if(!filter_var($newemail, FILTER_VALIDATE_EMAIL) == true) {
    echo '<div id="messageupdateuser" class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Insira um endereço de email válido.</div><div id="returnVal" style="display:none;">false</div>';
} else {
    //Validation passed
    if(isset($_POST['userupdate']) && !empty(str_replace(' ', '', $_POST['userupdate']))) {

        //Tries inserting into database and add response to variable
        $a = new UpdateUserForm;
        $response = $a->updateUser($iduser, $newuser, $newemail, $admin, $classid, $status);

        //Success
        if($response == 'true') {
            echo '<div id="messageupdateuser" class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Conta atualizada com sucesso!</div>';
        } else {
            //Failure
            echo '<div id="messageupdateuser" class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Email já cadastrado.</div>';
        }
    } else {
        //Validation error from empty form variables
        echo 'Um erro inesperado ocorreu... Tente novamente!';
    }
};
