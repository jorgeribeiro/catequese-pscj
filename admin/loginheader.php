<?php
//PUT THIS HEADER ON TOP OF EACH UNIQUE PAGE
session_start();
if(!isset($_SESSION['email'])) {
	header("location:../pages/main_login.php");
}