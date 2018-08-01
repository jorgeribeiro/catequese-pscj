<?php
//DO NOT ECHO ANYTHING ON THIS PAGE OTHER THAN RESPONSE
//'true' triggers login success
ob_start();

require 'includes/functions.php';

// Define $email and $password
$email = $_POST['email'];
$password = $_POST['password'];

// To protect MySQL injection
$email = stripslashes($email);
$password = stripslashes($password);

$response = '';
$loginCtl = new LoginForm;

$response = $loginCtl->checkLogin($email, $password);
$resp = new RespObj($email, $response);
$jsonResp = json_encode($resp);
echo $jsonResp;

unset($resp, $jsonResp);
ob_end_flush();