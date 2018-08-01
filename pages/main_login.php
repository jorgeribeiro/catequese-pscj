<?php
session_start();
if (isset($_SESSION['email'])) {
	if($_SESSION['admin'] == 1)
    	header("location:../admin.php");
    else
    	header("location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Catequese PSCJ</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="../css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="../css/main.css" rel="stylesheet" media="screen">
	</head>

	<body>
		<div class="container">
			<form class="form-signin" name="form1" method="post" action="checklogin.php">
				<h3 class="form-signin-heading" align="center">Sistema da Catequese</h3>
				<input name="email" id="email" type="text" class="form-control" placeholder="Email" autofocus>
				<input name="password" id="password" type="password" class="form-control" placeholder="Senha">
				<button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
		
				<div id="message"></div>
			</form>
		</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="../js/jquery.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="../js/bootstrap.js"></script>
	<!-- The AJAX login script -->
    <script src="../js/login.js"></script>

  </body>
</html>
