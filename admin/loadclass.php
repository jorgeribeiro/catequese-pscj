<?php
require 'includes/functions.php';

if(isset($_POST['idclass'])) {
    $classInfo = new ClassInfo;
    $result = $classInfo->getSingleClassInfo($_POST['idclass']);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}
?>