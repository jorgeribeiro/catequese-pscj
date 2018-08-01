<?php
session_start();
session_destroy();
header("location:../pages/main_login.php");
