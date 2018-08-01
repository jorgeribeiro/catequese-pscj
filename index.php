<?php 
require "pages/loginheader.php";
if (isset($_SESSION['email']) && $_SESSION['admin'] == 1) {
    header("location:admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>Catequese PSCJ</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- MetisMenu CSS -->
    <link href="css/metisMenu.css" rel="stylesheet">
    <!-- Custom CSS -->
	<link href="css/sb-admin-2.css" rel="stylesheet">
	<!-- Custom Fonts -->
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="wrapper">
		<!-- Navigation -->
	    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="index.php">Catequese - Paróquia do Sagrado Coração de Jesus do Bequimão</a>
	        </div>
	        <!-- /.navbar-header -->

	        <ul class="nav navbar-top-links navbar-right">
	            <li class="dropdown">
	                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
	                </a>
	                <ul class="dropdown-menu dropdown-user">
	                    <li><a href="pages/profile.php"><i class="fa fa-user fa-fw"></i> Perfil</a>
	                    </li>
	                    <li><a href="pages/config.php"><i class="fa fa-gear fa-fw"></i> Configurações</a>
	                    </li>
	                    <li class="divider"></li>
	                    <li><a href="pages/logout.php"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
	                    </li>
	                </ul>
	                <!-- /.dropdown-user -->
	            </li>
	            <!-- /.dropdown -->
	        </ul>
	        <!-- /.navbar-top-links -->

	        <div class="navbar-default sidebar" role="navigation">
	            <div class="sidebar-nav navbar-collapse">
	                <ul class="nav" id="side-menu">
	                    <li>
	                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Home</a>
	                    </li>
	                    <li>
	                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Cadastrar encontro<span class="fa arrow"></span></a>
	                        <ul class="nav nav-second-level">
	                            <li>
	                                <a href="flot.html">Flot Charts</a>
	                            </li>
	                            <li>
	                                <a href="morris.html">Morris.js Charts</a>
	                            </li>
	                        </ul>
	                        <!-- /.nav-second-level -->
	                    </li>
	                    <li>
	                        <a href="tables.html"><i class="fa fa-table fa-fw"></i> Lançar frequência</a>
	                    </li>
	                    <li>
	                        <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Cadastrar catequizando</a>
	                    </li>
	                    <li>
	                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Opção 1<span class="fa arrow"></span></a>
	                        <ul class="nav nav-second-level">
	                            <li>
	                                <a href="panels-wells.html">Panels and Wells</a>
	                            </li>
	                            <li>
	                                <a href="buttons.html">Buttons</a>
	                            </li>
	                            <li>
	                                <a href="notifications.html">Notifications</a>
	                            </li>
	                            <li>
	                                <a href="typography.html">Typography</a>
	                            </li>
	                            <li>
	                                <a href="icons.html"> Icons</a>
	                            </li>
	                            <li>
	                                <a href="grid.html">Grid</a>
	                            </li>
	                        </ul>
	                        <!-- /.nav-second-level -->
	                    </li>
	                    <li>
	                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Opção 2<span class="fa arrow"></span></a>
	                        <ul class="nav nav-second-level">
	                            <li>
	                                <a href="#">Second Level Item</a>
	                            </li>
	                            <li>
	                                <a href="#">Second Level Item</a>
	                            </li>
	                            <li>
	                                <a href="#">Third Level <span class="fa arrow"></span></a>
	                                <ul class="nav nav-third-level">
	                                    <li>
	                                        <a href="#">Third Level Item</a>
	                                    </li>
	                                    <li>
	                                        <a href="#">Third Level Item</a>
	                                    </li>
	                                    <li>
	                                        <a href="#">Third Level Item</a>
	                                    </li>
	                                    <li>
	                                        <a href="#">Third Level Item</a>
	                                    </li>
	                                </ul>
	                                <!-- /.nav-third-level -->
	                            </li>
	                        </ul>
	                        <!-- /.nav-second-level -->
	                    </li>
	                    <li>
	                        <a href="#"><i class="fa fa-files-o fa-fw"></i> Opção 3<span class="fa arrow"></span></a>
	                        <ul class="nav nav-second-level">
	                            <li>
	                                <a href="blank.html">Blank Page</a>
	                            </li>
	                            <li>
	                                <a href="login.html">Login Page</a>
	                            </li>
	                        </ul>
	                        <!-- /.nav-second-level -->
	                    </li>
	                </ul>
	            </div>
	            <!-- /.sidebar-collapse -->
	        </div>
	        <!-- /.navbar-static-side -->
	    </nav>

	    <div id="page-wrapper">
	    	<div class="container-fluid">
				<div class="form-signin">
					<div class="alert alert-success">Você se conectou com <strong>sucesso</strong>.</div>
					<a href="pages/logout.php" class="btn btn-default btn-lg btn-block">Sair</a>
				</div>
			</div>
	    </div>
	</div>
	<!-- /#wrapper -->

		

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.js"></script>
	<!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>
</html>
