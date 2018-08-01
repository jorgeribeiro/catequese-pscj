<?php
require 'includes/functions.php';

$accountInfo = new AccountInfo;
$accountsResult = $accountInfo->getInfo();
$accounts = array();
while($row = mysqli_fetch_array($accountsResult)) { $accounts[] = $row; }
echo json_encode($accounts);
?>