<?php error_reporting(E_ALL);  ?>
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
			 $hora = date('H:i:s');
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
<?php

require 'conection_cadastro.php';

// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):

	$conexao = conexao::getInstance();
	$sql = 'SELECT id, matricula, tipo, situacao, nome, identidade, placa, veiculo, cidade, uf, empresa, dataentrada, horaentrada, horasaida FROM tb_entrada';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

else:

	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, foto, matricula, tipo, situacao, nome, identidade, placa, veiculo, cidade, uf, empresa, 
	dataentrada, horaentrada, horasaida FROM tb_entrada WHERE nome LIKE :nome OR matricula LIKE :matricula OR dataentrada LIKE :dataentrada';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $termo.'%');
	$stm->bindValue(':matricula', $termo.'%');
	$stm->bindValue(':dataentrada', $termo.'%');
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

endif;
?>
<!DOCTYPE html>
<html>
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
<br><br>
<div>
  <div class="row">
    <div class="col-xs-7 col-sm-2 col-md-2">
        <a href="gerarelxls.php" class="btn btn-sm btn-primary fa fa-file-excel-o fa-1x">
            <div class="row">
                <div class="col-xs-7 text-center">
                    <p>Relatório Diario</p>
                </div>
            </div>
        </a>
    </div>
 </div>
</div>
<br><br>
	<div class='container'>
		<fieldset>
<div>
    <div class="row"
      <div class="col-xs-5 col-sm-2 col-md-2">
          <div class="col-xs-7 text-center">
			<!-- Cabeçalho da Listagem -->
     <FONT FACE="Primer Print" COLOR="Gray" class="fa fa-street-view fa-2x">    RELAÇÃO DE ENTRADAS E SAIDAS</FONT><BR>

          </div>
       </div>
     </div>
</div>
<br><br>

<!-- Formulário de Pesquisa -->
			<form action="" method="get" id='form-contato' class="form-horizontal col-md-10">
				<!-- <label class="col-md-2 control-label" for="termo">Pesquisar</label> -->
				<div class='col-md-4'>
			    	<input type="text" class="form-control" id="termo" name="termo" placeholder="Informe o Nome / Matricula ou Data de Cadastro">
				</div>
			    <button type="submit" class="btn btn-warning btn-sm fa fa-search fa-1x">  PESQUISAR</button>

			   <!--  <a href='listar_entradas.php' class="btn btn-primary">Ver Todos</a> -->
			</form>
<br><br><br><br>
<div class="row"></div>
			<!-- Link para página de cadastro
			<a href='cadastro_pessoas.php' class="btn btn-success pull-right">Cadastrar Novos</a> -->
			<div class='clearfix'></div>

			<?php if(!empty($clientes)):?>

				<!-- Tabela de Entrada -->
				<table class="table table-striped">
                    <h5>
					<tr class='active'>
						<th>Mat.</th>
						<th>Nome</th>
                        <th>Tipo</th>
						<th>Placa</th>
						<th>Veiculo</th>
                        <th>Empresa</th>
						<th>Entrada</th>
						<th>Entrada</th>
						<th>Saida</th>
						
					</tr>
                    </h5>
					<?php foreach($clientes as $cliente):?>
						<tr>
							<td class="warning"><?=$cliente->matricula?></td>
                         <!--   <img src='fotos/<?=$cliente->foto?>' height='175' width='110'> -->
                            <td><?=$cliente->nome?></td>
                            <td><?=$cliente->tipo?></td>
							<td><?=$cliente->placa?></td>
							<td><?=$cliente->veiculo?></td>
							<td><?=$cliente->empresa?></td>
							<td><?=$cliente->dataentrada?></td>
							<td><?=$cliente->horaentrada?></td>
							<td><?=$cliente->horasaida?></td>
							<td>&nbsp;</td>
							<td class="warning">
							    <a href='s_sair_libera.php?id=<?=$cliente->id?>' class="btn btn-primary">LIBERAR SAIDA</a>
		                   <!-- <a href='javascript:void(0)' class="btn btn-danger link_exclusao" rel="<?=$cliente->id?>">Excluir</a> -->
							</td>
							
						</tr>	
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<!-- Mensagem caso não exista clientes ou não encontrado  -->
<h3 class="text-center text-primary">Não existem dados cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>

<!--
<div class="row">
    <?php
    if(is_array($clientes)){
        foreach ($clientes as $d) {
            echo "<div class='card m-1' style='width: 20rem;'>
 
  <div class='card-block'>
    <h4 class='card-title'>$d->nome</h4><small>$d->tipo<br>$d->empresa</small>
       <fieldset class='bg-faded m-1 p-1'>
          $d->veiculo - $d->placa<br>$d->cidade - $d->uf
       </fieldset>
    <p class='card-text'>Entrada: $d->dataentrada  - $d->horaentrada<br>Saída: $d->horasaida</p>
    <a href='entradas/liberar/$d->id' class='btn btn-warning pull-right'>Liberar Saída</a>
  </div></div>";
        }}
    ?>
</div>
-->
	<script type="text/javascript" src="js/custom.js"></script>
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php include(FOOTER_TEMPLATE); ?>