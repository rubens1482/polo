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
<?

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
<style type="text/css">
    .main-container{

    }
    .highlight  {
        width: 500px;
        color: white;
        background: rgba(0, 0, 0, 0.50);
        border-radius: 9px;
        padding: 3%;

    }

    .highlight img {

        float: left;
        width: 100px;
        height: 100px;
        margin: 10px;
    }

    .highlight ul {
        list-style-image: url('http://icons.iconarchive.com/icons/yusuke-kamiyamane/fugue/16/tick-small-icon.png');
        margin-left: 1%;
        float: left;
        clear: right
    }

    .highlight button {
        margin-left: 1%;
        float: right;
    }

    .highlight h1,h2,h3,h4,h5,h6 {
        padding-bottom: 2%;
        border-bottom: 2px dashed rgba(255, 255, 255, 0.41);
        font-size:20px;
        text-align : center;
        text-transform: uppercase;
    }

    .highlight p {
        text-align: justify;
    }
</style>

<link href="font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<div class ="main-container">


<!-- INICIO DO CARD -->
    <div class=" highlight" style="margin-left:0;">
        <FONT FACE="Primer Print" COLOR="White" class="fa fa-street-view fa-2x">    RELAÇÃO DE ENTRADAS E SAIDAS</FONT><BR
        <div class="row">
            <?php
            if(is_array($clientes)){
                foreach ($clientes as $cliente) {
                    echo "<div class='card m-1' style='width: 20rem;'>
 
  <div class='card-block'>
    <h4 class='card-title'>$cliente->nome</h4><small>$cliente->tipo<br>$cliente->empresa</small>
       <fieldset class='bg-faded m-1 p-1'>
          $cliente->veiculo - $cliente->placa<br>$cliente->cidade - $cliente->uf
       </fieldset>
    <p class='card-text'>Entrada: $cliente->dataentrada  - $cliente->horaentrada<br>Saída: $cliente->horasaida</p>
   <a href='s_sair_libera.php?id=$cliente->id' class='btn btn-warning pull-right'>Liberar Saída</a>
  </div></div>";
                }}
            ?>
        </div>
    </div>
</div>
<!-- FIM DO CARD -->