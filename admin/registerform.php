<?php
//PUT THIS HEADER ON TOP OF EACH UNIQUE PAGE
session_start();
if(!isset($_SESSION['email'])) {
    header("location:../pages/main_login.php");
} else {
    if($_SESSION['admin'] == 0)
        header("location:../index.php");
}

require 'includes/functions.php';
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
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../css/metisMenu.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                <a class="navbar-brand" href="../admin.php">Catequese - Paróquia do Sagrado Coração de Jesus do Bequimão</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> Perfil</a>
                        </li>
                        <li><a href="config.php"><i class="fa fa-gear fa-fw"></i> Configurações</a>
                        </li>
                        <li><a href="adminoptions.php"><i class="fa fa-users fa-fw"></i> Administrador</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
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
                            <a href="../admin.php"><i class="fa fa-dashboard fa-fw"></i> Home</a>
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

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Cadastrar catequizando</h1>
                        <form class="form-signup" id="registry" name="registry" method="post" action="createuser.php">                            
                            <input name="newregistry" id="newregistry" type="text" class="form-control" placeholder="Nome completo">
                            <input name="birthday" id="birthday" type="text" class="form-control" placeholder="Data de nascimento">
                            <input name="address" id="address" type="text" class="form-control" placeholder="Endereço (Rua, quadra, número etc)">                                                  
                            <input name="district" id="district" type="text" class="form-control" placeholder="Bairro">
                            <input name="zipcode" id="zipcode" type="text" class="form-control" placeholder="CEP">
                            <input name="phonenumber" id="phonenumber" type="text" class="form-control" placeholder="Telefone">
                            <div class="checkbox">
                                <label>
                                    <input name="student" id="student" type="checkbox" value="1">Estudante
                                </label>
                            </div>
                            <input name="school" id="school" type="text" class="form-control" placeholder="Escola/Faculdade/Universidade"><br>
                            <div class="form-group">
                                <label>Sacramentos que já recebeu:</label>
                                <div class="checkbox">                                
                                    <label>
                                        <input name="none" id="none" type="checkbox" value="1">Nenhum
                                    </label><br>
                                    <label>
                                        <input name="batismo" id="batismo" type="checkbox" value="1">Batismo
                                    </label><br>
                                    <label>
                                        <input name="eucaristia" id="eucaristia" type="checkbox" value="1">Eucaristia
                                    </label>
                                </div>
                            </div>
                            <input name="batismodata" id="batismodata" type="text" class="form-control" placeholder="Data do batismo">
                            <input name="paroquiabatismo" id="paroquiabatismo" type="text" class="form-control" placeholder="Paróquia onde foi batizado"><br>
                            <input name="father" id="father" type="text" class="form-control" placeholder="Nome completo do pai">
                            <input name="mother" id="mother" type="text" class="form-control" placeholder="Nome completo da mãe">

                            <button name="Submit" id="submitnewuser" class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar novo catequizando</button>
                            <div id="messagecreateregistry"></div>
                        </form>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/metisMenu.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>
    <!-- The AJAX createinfo script -->
    <script src="../js/createinfo.js"></script>
    <!-- The AJAX updateinfo script -->
    <script src="../js/updateinfo.js"></script>
    <!-- The AJAX loadinfo script -->
    <script src="../js/loadinfo.js"></script>
    
</body>
</html>