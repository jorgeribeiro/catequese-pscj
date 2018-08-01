<?php
require 'includes/functions.php';

//Pull username, generate new ID and hash password
$newuser = str_replace(' ', '', $_POST['newuser']) . ' ' . str_replace(' ', '', $_POST['surname']);
$newemail = str_replace(' ', '', $_POST['email']);
$newpw = password_hash($_POST['password1'], PASSWORD_DEFAULT);
$pw1 = $_POST['password1'];
$pw2 = $_POST['password2'];
$classid = $_POST['class'];
$admin = $_POST['admin'];

// To protect MySQL injection
$newuser = stripslashes($newuser);
$newemail = stripslashes($newemail);
$pw1 = stripslashes($pw1);
$pw2 = stripslashes($pw2);

//Validation rules
if($pw1 != $pw2) {
    echo '<div id="messagecreateuser" class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>As senhas devem ser iguais.</div><div id="returnVal" style="display:none;">false</div>';
} elseif(strlen($pw1) < 4) {
    echo '<div id="messagecreateuser" class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>A senha deve ter no mínimo 4 caracteres.</div><div id="returnVal" style="display:none;">false</div>';
} elseif(!filter_var($newemail, FILTER_VALIDATE_EMAIL) == true) {
    echo '<div id="messagecreateuser" class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Insira um endereço de email válido.</div><div id="returnVal" style="display:none;">false</div>';
} else {
    //Validation passed
    if(isset($_POST['newuser']) && !empty(str_replace(' ', '', $_POST['newuser'])) && isset($_POST['password1']) && !empty(str_replace(' ', '', $_POST['password1']))) {

        //Tries inserting into database and add response to variable
        $a = new NewUserForm;
        $response = $a->createUser($newuser, $newemail, $newpw, $admin, $classid);

        //Success
        if($response == 'true') {
            echo '<div id="messagecreateuser" class="alert alert-success"><button type="button" class="close close-reset" data-dismiss="alert" aria-hidden="true">&times;</button>Conta criada com sucesso!</div>';
        } else {
            //Failure
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Email já cadastrado.</div>';
        }
    } else {
        //Validation error from empty form variables
        echo 'Um erro inesperado ocorreu... Tente novamente!';
    }
};
