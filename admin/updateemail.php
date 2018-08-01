<?php
require 'includes/functions.php';

$iduser = $_POST['idusernewemail'];
$newemail = str_replace(' ', '', $_POST['newemail']);

// To protect MySQL injection
$newemail = stripslashes($newemail);

//Validation rules
if(!filter_var($newemail, FILTER_VALIDATE_EMAIL) == true) {
    echo '<div id="messagenewemail" class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Insira um endereço de email válido.</div><div id="returnVal" style="display:none;">false</div>';
} else {
    //Tries inserting into database and add response to variable
    $a = new UpdateUserForm;
    $response = $a->updateEmail($iduser, $newemail);

    //Success
    if($response == 'true') {
        echo '<div id="messagenewemail" class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Email atualizado com sucesso!</div>';
    } else {
        //Failure
        echo '<div id="messagenewemail" class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Email já cadastrado.</div>';
    }
};
