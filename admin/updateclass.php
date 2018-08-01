<?php
require 'includes/functions.php';

$idclass = $_POST['idclassupdate'];
$newlevel = $_POST['levelupdate'];
$newday = $_POST['dayupdate'];
$newshift = $_POST['shiftupdate'];
$newyear = $_POST['yearupdate'];
$active = $_POST['activeupdate'];

$a = new UpdateClassForm;
$response = $a->updateClass($idclass, $newlevel, $newday, $newshift, $newyear, $active);
//Success
if($response == 'true') {
    echo '<div id="messageupdateclass" class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Turma atualizada com sucesso!</div>';
} else {
    //Failure
    mySqlErrors($response);
}
