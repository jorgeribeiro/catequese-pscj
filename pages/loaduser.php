<?php
require 'includes/functions.php';

if(isset($_POST['iduser'])) {
    $userInfo = new UserInfo;
    $result = $userInfo->getInfo($_POST['iduser']);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}
?>