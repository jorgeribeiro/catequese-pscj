<?php
require 'includes/functions.php';

$level = $_POST['level'];
$day = $_POST['day'];
$shift = $_POST['shift'];
$year = $_POST['year'];
$active = $_POST['active'];

$a = new NewClassForm;
$response = $a->createClass($level, $day, $shift, $year, $active);
//Success
if($response == 'true') {
    echo '<div id="messagecreateclass" class="alert alert-success"><button type="button" class="close close-reset" data-dismiss="alert" aria-hidden="true">&times;</button>Turma criada com sucesso!</div>';
} else {
    //Failure
    mySqlErrors($response);
}
