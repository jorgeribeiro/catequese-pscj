<?php
require 'includes/functions.php';

$iduser = $_POST['idusernewpassword'];
$oldpw = $_POST['oldpassword'];
$newpw = password_hash($_POST['newpassword1'], PASSWORD_DEFAULT);
$newpw1 = $_POST['newpassword1'];
$newpw2 = $_POST['newpassword2'];

// To protect MySQL injection
$newpw1 = stripslashes($newpw1);
$newpw2 = stripslashes($newpw2);

//Validation rules
if($newpw1 != $newpw2) {
    echo '<div id="messagenewpassword" class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>As senhas devem ser iguais.</div><div id="returnVal" style="display:none;">false</div>';
} elseif(strlen($newpw1) < 4) {
    echo '<div id="messagenewpassword" class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>A senha deve ter no mínimo 4 caracteres.</div><div id="returnVal" style="display:none;">false</div>';
} else {
    //Validation passed
    if(isset($_POST['oldpassword']) && !empty(str_replace(' ', '', $_POST['oldpassword'])) && isset($_POST['newpassword1']) && !empty(str_replace(' ', '', $_POST['newpassword1']))) {

        //Tries inserting into database and add response to variable
        $a = new UpdateUserForm;
        $response = $a->updatePassword($iduser, $oldpw, $newpw);

        //Success
        if($response == 'true') {
            echo '<div id="messagenewpassword" class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Senha atualizada com sucesso!</div>';
        } else {
            echo $response;
        }
    }
};
