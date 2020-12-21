<? error_reporting(E_ALL);  ?>
<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>
<?php include(HEADER_TEMPLATE); ?>
<?php
// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');
// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
   
    //enviadata.php
             $dataLocal = date('d/m/Y');
             $data = time();  

             $timestamp = mktime(date("H")-3, date("i"), 0);

             $data = gmdate("H:i:s", $timestamp);
   
   
   
session_start();
if(!isset($_SESSION["usuarioNome"]) and !isset($_SESSION["usuarioNome"]))
{
	header("Location:index.php");exit;
	}else {
	echo "Usuario: ". $_SESSION['usuarioNome'];
	}
 ?>
<br> <a href="sair.php">Sair</a>
<?

require 'conection_cadastro.php';

// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):

	$conexao = conexao::getInstance();
	$sql = 'SELECT id, matricula, tipo, situacao, nome, identidade, placa, veiculo, cidade, uf, empresa, datacadastro, foto FROM tb_cadastro';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);
    
else:

	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, matricula, tipo, situacao, nome, identidade, placa, veiculo, cidade, uf, empresa, datacadastro, foto FROM tb_cadastro WHERE nome LIKE :nome OR matricula LIKE :matricula OR datacadastro LIKE :datacadastro';
	
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $termo.'%');
	$stm->bindValue(':matricula', $termo.'%');
	$stm->bindValue(':datacadastro', $termo.'%');
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

endif;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>LISTA DE TODOS CADASTRADOS</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
    .teste {
	font-size: 9px;
}


    <!--Função Loader-->
        function showCarga()
    {
        document.getElementById('carga').style.display="block";
    }
    function hideCarga()
    {
        document.getElementById('carga').style.display="none";
    }
    <!--css-->
        .loading{
            display: none;
            background: #FFFFFF;
            position: absolute;
            width: 200;
            height: 100;
            top: 250;
            left: 540;
            border-style: solid;
            border-color: black;
            border-width: 1;
            text-align: center;
            /**text-transform: uppercase;*/
            font-family:Arial, Helvetica, sans-serif
            font-weight: bold;
            color: silver;
            z-index: 3;
        }
    .imgloading{padding-top: 15;font-family: arial;height: 130;
    }






    </style>


</head>
<body>


	<div class='container'>
		<fieldset>

			<!-- Cabeçalho da Listagem -->
			<legend><h1>LISTA DE TODOS CADASTROS</h1></legend>




			<!-- Formulário de Pesquisa -->
			<form action="" method="get" id='form-contato' class="form-horizontal col-md-10">
				<label class="col-md-2 control-label" for="termo">Pesquisar</label>
				<div class='col-md-7'>
			    	<input type="text" class="form-control" id="termo" name="termo" placeholder="Informe o Nome / Matricula ou Data de Cadastro">
				</div>
			    <button type="submit" class="btn btn-primary">Pesquisar</button>
			    <a href='mostra_todos.php' class="btn btn-primary">Ver Todos</a>
			</form>


            <body onLoad="java script:showCarga();">
            <div class="loading" id="carga">
                <img class="imgloading" src="img/ajax-loader.gif" style="height:600; width:250">
                <br/><br/>...
            </div>
            
            echo"<script type='text/javascript'>hideCarga(this);</script>";

			<!-- Link para página de cadastro -->
			<a href='cadastro_pessoas.php' class="btn btn-success pull-right">Cadastrar Novos</a>
			<div class='clearfix'></div>

			<?php if(!empty($clientes)):?>

				<!-- Tabela de Cadastros -->
				<table class="table table-striped">
					<tr class='active'>
						<th>Foto</th>
						<th>Matricula</th>
                        <th>Tipo</th>
						<th>Nome</th>
						<th>Placa</th>
						<th>Veiculo</th>
						<th>Cidade</th>
						<th>UF</th>
						<th>Empresa</th>
						<th>Data Cadastro</th>
						<!-- <th>Ação</th> -->
					</tr>
					<?php foreach($clientes as $cliente):?>
						<tr>
							<td><img src='fotos/<?=$cliente->foto?>' height='40' width='40'></td>
							<td><?=$cliente->matricula?></td>
                            <td><?=$cliente->tipo?></td>
							<td><?=$cliente->nome?></td>
							<td><?=$cliente->placa?></td>
							<td><?=$cliente->veiculo?></td>
							<td><?=$cliente->cidade?></td>
							<td><?=$cliente->uf?></td>
							<td><?=$cliente->empresa?></td>
							<td><?=$cliente->datacadastro?></td>
							

							
							<!-- <td>
								<a href='editar.php?id=<?=$cliente->id?>' class="btn btn-primary">Editar</a>
								<a href='javascript:void(0)' class="btn btn-danger link_exclusao" rel="<?=$cliente->id?>">Excluir</a>
							</td> -->
						</tr>	
					<?php endforeach;?>



				</table>

			<?php else: ?>

				<!-- Mensagem caso não exista clientes ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem dados cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
	
							
							
</body>
</html>
<?php include(FOOTER_TEMPLATE); ?>