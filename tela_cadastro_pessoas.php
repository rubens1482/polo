<? error_reporting(E_ALL);  ?>
<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>
<?php include(HEADER_TEMPLATE); ?>
<?
// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');
// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
$dataLocal = date('d/m/Y');
$hora = date('H,i');
echo $dataLocal;

session_start();
if(!isset($_SESSION["usuarioNome"]) and !isset($_SESSION["usuarioNome"]))
{
    header("Location:index.php");exit;
}else {
    echo "Usuario: ". $_SESSION['usuarioNome'];
}
?>
<br> <a href="sair.php">Sair</a>


<html>
<head>
    <title> SISTEMA DE CADASTRO DE PESSOAS </title>

    <!-- Bootstrap -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <style type="text/css">
        .teste {
            font-size: 9px;
        }
    </style>

<body>

<div class="card">
    <form method="post" id='form-contato' enctype='multipart/form-data'>
        <div class="card-header">
            <h1>Formulário de Cadastro</h1>
        </div>
        <div class="card-block">
            <div class="row">

                <label for="nome">Selecionar Foto</label>
                <div class="col-md-2">
                    <a href="#" class="thumbnail">
                        <img src="fotos/padrao.jpg" height="190" width="150" id="foto-cliente">
                    </a>
                </div>
                <input type="file" name="foto" id="foto" value="foto" >
             </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="matricula">Matrícula:</label>
                        <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Informe a Matricula" required>
                    </div>

                    <div class="form-group">
                        <label for="tipo">Tipo de Cliente:</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Informe o Tipo de Cliente">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" maxlength="30" name="nome" required placeholder="Informe o Nome">
                </div>

                <div class="form-group col-md-6">
                    <label for="identidade">RG:</label>
                    <input type="text" class="form-control" id="identidade" maxlength="25" name="identidade" placeholder="Informe o RG">
                </div>

                <div class="form-group col-md-6">
                    <label for="placa">Placa:</label>
                    <input type="text" class="form-control" id="placa" maxlength="12" name="placa" placeholder="Informe a Placa">
                </div>

                <div class="form-group col-md-6">
                    <label for="veiculo">Veículo:</label>
                    <input type="veiculo" class="form-control" id="veiculo" maxlength="20" name="veiculo" placeholder="Informe o Veiculo">
                </div>

                <div class="form-group col-md-6">
                    <label for="cidade">Cidade:</label>
                    <input type="text" class="form-control" id="cidade" maxlength="13" name="cidade" placeholder="Informe a Cidade">
                </div>

                <div class="form-group col-md-4">
                    <label for="uf">UF:</label>
                    <input type="text" class="form-control" id="uf" maxlength="3" name="uf" placeholder="Informe o Estado">
                </div>

                <div class="form-group col-md-6">
                    <label for="empresa">Empresa:</label>
                    <input type="text" class="form-control" id="empresa" maxlength="25" name="empresa" placeholder="Informe a Empresa">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Acesso Liberado:</label><br>
                    <label class="custom-control custom-radio">
                        <input id="radio1" name="situacao" type="radio" value="1" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><span class="badge badge-pill badge-success">SIM</span></span>
                    </label>

                    <label class="custom-control custom-radio">
                        <input id="radio1" name="situacao" type="radio" value="2" class="custom-control-input" checked>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><span class="badge badge-pill badge-danger">NAO</span></span>
                    </label>
                </div>
            </div>
        </div>
      <div class="row"
        <div class="card-footer text-muted text-right">

            <input type="hidden" name="acao" value="incluir">
            <button type="submit" class="btn btn-primary" id='botao'>
                Gravar
            </button>
            <a href='cadastro_pessoas.php' class="btn btn-danger">Cancelar</a>
        </div>
         </div>
        </div>
</form>
<script type="text/javascript" src="js/custom.js"></script>
</body>
</head>
</html>



