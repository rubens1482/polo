<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php $db = open_database(); ?>

<!-- inicio codigo sidebar -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>-- PORTARIA SYSTEM -- V.1.0</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/simple-sidebar.css" rel="stylesheet">
        <link href="font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/estilo.css" rel="stylesheet">
    </head>
    <body>
    <nav class="navbar navbar-default no-margin">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header fixed-brand">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" id="menu-toggle">
                <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
            </button>
            <a class="navbar-brand" href="#"><i class="fa fa-rocket fa-4"></i> Portaria System</a>
        </div><!-- navbar-header-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2"> <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span></button></li>
            </ul>
            <div>
                <?
                session_start();
                if(!isset($_SESSION["usuarioNome"]) and !isset($_SESSION["usuarioNome"]))
                {
                    header("Location:index.php");exit;
                }else {
                    echo "Usuario: ". $_SESSION['usuarioNome'];
                }
                ?>
                <br> <a href="sair.php">Sair</a>

            </div>
        </div><!-- bs-example-navbar-collapse-1 -->
    </nav>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
                <li class="active">
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> Painel de Controle</a>

                </li>

                <li>
                    <a href="cadastro_pessoas.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa fa-plus fa-stack-1x "></i></span>Novo Cadastro</a>
                </li>
                <li>
                    <a href="mostra_todos.php"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-user fa-stack-1x "></i></span>Todos os Cadastros</a>
                </li>
                <li>
                    <a href="pesquisa.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-search fa-stack-1x "></i></span>Pesquisa Cadastros</a>
                </li>
                <li>
                    <a href="entrada.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-arrow-down fa-stack-1x "></i></span>Entrada</a>
                </li>
                <li>
                    <a href="s_sair.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-arrow-up fa-stack-1x "></i></span>Saída</a>
                </li>
                <li>
                    <a href="r_entrada.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-refresh fa-stack-1x "></i></span>Entrada/Saída</a>
                </li>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-file-excel-o fa-stack-1x "></i></span> Relatórios</a>
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Clientes</a></li>
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Entradas Diarias</a></li>
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Entradas e Saídas</a></li>
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Cidades +Ativas</a></li>
                    </ul>
                </li>



            </ul>
        </div><!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
<div class="container-fluid xyz">

<div class="row">
                 <div class="col-xs-6 col-sm-2 col-md-2">
                 <a href="cadastro_pessoas.php" class="btn btn-danger btn-lg">
					<div class="row">
						<div class="col-xs-12 text-center">
							<i class="fa fa-plus fa-2x"></i>
						</div>
						<div class="col-xs-12 text-center">
							<p>Novo Cadastro</p>
						</div>
					</div>
                 </a>
                 </div>
                
				
	
    <div class="col-xs-6 col-sm-2 col-md-2">
              <a href="mostra_todos.php" class="btn btn-warning btn-lg">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-user fa-2x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Cadastros</p>
                </div>
                   </div>
                     </a>
    </div>
	
			 
	<div class="col-xs-6 col-sm-2 col-md-2">
        <a href="pesquisa.php" class="btn btn-warning btn-lg">
    <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-search fa-2x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Pesquisar</p>
                </div>
    </div>
        </a>
    </div>
</div>

<hr>
<div class="row">

    <div class="col-xs-6 col-sm-2 col-md-2">
        <a href="entrada.php" class="btn btn-success btn-lg">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-arrow-down fa-2x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Entrada</p>
                </div>
            </div>
        </a>
    </div>


    <div class="col-xs-6 col-sm-2 col-md-2">
        <a href="s_sair.php" class="btn btn-info btn-lg">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-arrow-up fa-2x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Saída</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2">
        <a href="r_entrada.php" class="btn btn-warning btn-lg">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-refresh fa-2x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Entrada e Saída</p>
                </div>
            </div>
        </a>
    </div>

</div>
</hr>
<hr>
<div class="row">
    <div class="col-xs-6 col-sm-2 col-md-2">
        <a href="gerarelxls.php" class="btn btn-lg btn-primary">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-file-excel-o fa-2x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Relatório Dia</p>
                </div>
            </div>
        </a>
</div>
</hr>
</div>

    </div>
<?php include(FOOTER_TEMPLATE); ?>

    <nav class="navbar fixed-bottom navbar-light bg-faded text-center">
        <small>&copy; 2017 Portaria System</small>
    </nav>
    
       <!--  #page-content-wrapper -->


    </div>
	
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sidebar_menu.js"></script>
    </body>
    </html>
<!-- final codigo sidebar  -->

