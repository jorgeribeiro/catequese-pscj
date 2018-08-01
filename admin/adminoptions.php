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
                            <a href="registerform.php"><i class="fa fa-edit fa-fw"></i> Cadastrar catequizando</a>
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
                        <h1 class="page-header">Administrador</h1>
                            <div class="panel-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li><a href="#createaccount" data-toggle="tab" id="tab-create-account">Criar conta</a>
                                    </li>
                                    <li><a href="#manageaccounts" data-toggle="tab" id="tab-accounts">Gerenciar contas</a>
                                    </li>
                                    <li><a href="#createclass" data-toggle="tab" id="tab-create-class">Criar turma</a>
                                    </li>
                                    <li><a href="#manageclasses" data-toggle="tab" id="tab-classes">Gerenciar turmas</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="createaccount">
                                        <div class="container-fluid">
                                            <form class="form-signup" id="usersignup" name="usersignup" method="post" action="createuser.php">
                                                <input name="newuser" id="newuser" type="text" class="form-control" placeholder="Nome">
                                                <input name="surname" id="surname" type="text" class="form-control" placeholder="Sobrenome">
                                                <input name="email" id="email" type="text" class="form-control" placeholder="Email"><br>
                                                <input name="password1" id="password1" type="password" class="form-control" placeholder="Senha">
                                                <input name="password2" id="password2" type="password" class="form-control" placeholder="Repita a senha">
                                                <div class="form-group">
                                                    <label>Turma</label>
                                                    <select name="class" id="class" class="form-control">
                                                        <!-- Populated in jquery -->
                                                    </select>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="admin" id="admin" type="checkbox" value="1">Administrador
                                                    </label>
                                                </div>

                                                <button name="Submit" id="submitnewuser" class="btn btn-lg btn-primary btn-block" type="submit">Criar nova conta</button>
                                                <div id="messagecreateuser"></div>
                                            </form>
                                        </div> <!-- /container-fluid -->
                                    </div>
                                    <div class="tab-pane fade" id="manageaccounts">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <br>
                                                <table class="table table-striped table-bordered table-hover" id="table-accounts">
                                                    <thead>
                                                        <tr>                                                        
                                                            <th>Nome</th>
                                                            <th>Email</th>                                                            
                                                            <th>Turma</th>
                                                            <th>Administrador</th>
                                                            <th>Status</th>
                                                            <th style="text-align:center">Editar conta</th>
                                                        </tr>                                                        
                                                    </thead>
                                                    <tbody>
                                                        <!-- Populated in jquery -->
                                                    </tbody>                               
                                                </table>
                                            </div>
                                            <div class="modal fade" id="editusermodal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">Editar conta</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-signup" id="userupdateform" name="userupdateform" method="post" action="updateuser.php">
                                                                <input name="iduserupdate" id="iduserupdate" type="hidden" class="form-control">
                                                                <input name="userupdate" id="userupdate" type="text" class="form-control" placeholder="Nome">
                                                                <input name="emailupdate" id="emailupdate" type="text" class="form-control" placeholder="Email"><br>                                                                
                                                                <div class="form-group">
                                                                    <label>Turma</label>
                                                                    <select name="classupdate" id="classupdate" class="form-control">
                                                                        <!-- Populated in jquery -->
                                                                    </select>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input name="adminupdate" id="adminupdate" type="checkbox" value="1">Administrador
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input name="statusupdate" id="statusupdate" type="checkbox" value="1">Usuário ativo
                                                                    </label>
                                                                </div>

                                                                <div id="messageupdateuser"></div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">                                                        
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                            <button type="button" id="submitupdateuser" class="btn btn-success" type="submit">Salvar</button>                                                    
                                                        </div>
                                                    </div>                                                    
                                                </div>                                            
                                            </div>                                                                                
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="createclass">
                                        <div class="container-fluid">
                                            <form class="form-signup" id="newclass" name="newclass" method="post" action="createclass.php">
                                                <div class="form-group">
                                                    <label>Nível</label>
                                                    <select name="level" id="level" class="form-control">
                                                        <option value="Pré-iniciação">Pré-iniciação</option>
                                                        <option value="Iniciação">Iniciação</option>
                                                        <option value="Eucaristia">Eucaristia</option>
                                                        <option value="Perseverança">Perseverança</option>
                                                        <option value="Crisma">Crisma</option>
                                                        <option value="Adultos">Adultos</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Dia</label>
                                                    <select name="day" id="day" class="form-control">
                                                        <option value="Sábado">Sábado</option>
                                                        <option value="Domingo">Domingo</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Turno</label>
                                                    <select name="shift" id="shift" class="form-control">
                                                        <option value="Manhã">Manhã</option>
                                                        <option value="Tarde">Tarde</option>
                                                        <option value="Noite">Noite</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ano de início</label>
                                                    <select name="year" id="year" class="form-control">
                                                        <option value="2010">2010</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2017" selected="true">2017</option>
                                                    </select>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="active" id="active" type="checkbox" value="1" checked="true">Turma ativa
                                                    </label>
                                                </div>

                                                <button name="Submit" id="submitnewclass" class="btn btn-lg btn-primary btn-block" type="submit">Criar nova turma</button>

                                                <div id="messagecreateclass"></div>
                                            </form>
                                        </div> <!-- /container-fluid -->
                                    </div>
                                    <div class="tab-pane fade" id="manageclasses">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <br>
                                                <table class="table table-striped table-bordered table-hover" id="table-classes">
                                                    <thead>
                                                        <tr>                                                        
                                                            <th>Nível</th>
                                                            <th>Dia</th>                                                            
                                                            <th>Turno</th>
                                                            <th>Ano de início</th>
                                                            <th>Turma ativa</th>
                                                            <th style="text-align:center">Editar turma</th>
                                                        </tr>                                                        
                                                    </thead>
                                                    <tbody>
                                                        <!-- Populated in jquery -->
                                                    </tbody>                               
                                                </table>
                                            </div>
                                            <div class="modal fade" id="editclassmodal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">Editar turma</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-signup" id="classupdateform" name="classupdateform" method="post" action="updateclass.php">
                                                                <input name="idclassupdate" id="idclassupdate" type="hidden" class="form-control">
                                                                <div class="form-group">
                                                                    <label>Nível</label>
                                                                    <select name="levelupdate" id="levelupdate" class="form-control">
                                                                        <option value="Pré-iniciação">Pré-iniciação</option>
                                                                        <option value="Iniciação">Iniciação</option>
                                                                        <option value="Eucaristia">Eucaristia</option>
                                                                        <option value="Perseverança">Perseverança</option>
                                                                        <option value="Crisma">Crisma</option>
                                                                        <option value="Adultos">Adultos</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Dia</label>
                                                                    <select name="dayupdate" id="dayupdate" class="form-control">
                                                                        <option value="Sábado">Sábado</option>
                                                                        <option value="Domingo">Domingo</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Turno</label>
                                                                    <select name="shiftupdate" id="shiftupdate" class="form-control">
                                                                        <option value="Manhã">Manhã</option>
                                                                        <option value="Tarde">Tarde</option>
                                                                        <option value="Noite">Noite</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Ano de início</label>
                                                                    <select name="yearupdate" id="yearupdate" class="form-control">
                                                                        <option value="2010">2010</option>
                                                                        <option value="2011">2011</option>
                                                                        <option value="2012">2012</option>
                                                                        <option value="2013">2013</option>
                                                                        <option value="2014">2014</option>
                                                                        <option value="2015">2015</option>
                                                                        <option value="2016">2016</option>
                                                                        <option value="2017" selected="true">2017</option>
                                                                    </select>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input name="activeupdate" id="activeupdate" type="checkbox" value="1" checked="true">Turma ativa
                                                                    </label>
                                                                </div>

                                                                <div id="messageupdateclass"></div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">                                                        
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                            <button type="button" id="submitupdateclass" class="btn btn-success" type="submit">Salvar</button>                                                    
                                                        </div>
                                                    </div>                                                    
                                                </div>                                            
                                            </div>                                                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-body -->
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