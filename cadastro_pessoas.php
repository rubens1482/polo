<?php error_reporting(E_ALL);  ?>
<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>
<?php include(HEADER_TEMPLATE); ?>
<?php
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

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/formzin-1.0.4.min.js" type="text/javascript"></script>

<body>
<script type="text/javascript">
    Formzin.iniciar();
</script>

   <div class='container'>
		<fieldset>
			<legend>
			<h1>Formulário de Cadastros</h1></legend>
			
		  <form action="action_foto.php" method="post" id='form-contato' enctype='multipart/form-data'>
	<div class="row">
					<label for="nome">Selecionar Foto</label>
			      	<div class="col-md-2">
					    <a href="#" class="thumbnail">
					      <img src="fotos/padrao.jpg" height="190" width="150" id="foto-cliente">
					    </a>
				  	</div>
				  	<input type="file" name="foto" id="foto" value="foto" >
	</div>

		    <div class="form-group col-md-2">
			<label for="matricula">Matrícula:</label>
			<input type="matricula" class="form-control" id="matricula" name="matricula" placeholder="Informe a Matricula">
        
            </div>

			    <div class="form-group col-md-3">
			      <label for="tipo">Tipo de Cliente:</label>
                  <input type="tipo" class="form-control" id="tipo" name="tipo" placeholder="Informe o Tipo de Cliente">
		
				</div>
			    <div class="form-group col-md-7">
			      <label for="nome">Nome:</label>
			      <input type="nome" class="form-control" id="nome" maxlength="30" name="nome" placeholder="Informe o Nome">
		
				</div>
			    <div class="form-group col-md-2">
			      <label for="identidade">RG:</label>
			      <input type="identidade" class="form-control" id="identidade" maxlength="25" name="identidade" placeholder="Informe o RG">
		
				</div>
<div class="row">
			    <div class="form-group col-md-2">
			      <label for="placa">Placa:</label>
			      <input type="text" class="placa_carro form-control caixa_alta" id="placa" maxlength="8" name="placa" placeholder="Informe a Placa">
		
				</div>
			    <div class="form-group col-md-3">
			      <label for="veiculo">Veículo:</label>
			      <input type="veiculo" class="form-control" id="veiculo" maxlength="20" name="veiculo" placeholder="Informe o Veiculo">
		
				</div>
                
</div>			
<div class="row">	
				<div class="form-group col-md-2">
			      <label for="cidade">Cidade:</label>
			      <input type="cidade" class="form-control" id="cidade" maxlength="13" name="cidade" placeholder="Informe a Cidade">
		
				</div>
			    <div class="form-group col-md-1">
			      <label for="uf">UF:</label>
			      <input type="uf" class="form-control" id="uf" maxlength="3" name="uf" placeholder="Informe o Estado">
		
				</div>
			    <div class="form-group col-md-3">
			      <label for="empresa">Empresa:</label>
			      <input type="empresa" class="form-control" id="empresa" maxlength="25" name="empresa" placeholder="Informe a Empresa">
		
				</div>
</div>			
            <div>
			    <div class="form-group">
			     
			      <input type="datacadastro" name="datacadastro" id="datacadastro" disabled value=$dataLocal size="15" style="display:none">
		
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
			<!--
                <div class="form-group">
                        <label for="acesso">Acesso Liberado:  </label>
			            <label class="radio-inline"> 
						<input type="radio" name="situacao" value="1">
						<span class="label label-success">SIM</span> 
	                   </label>
                 	   <label class="radio-inline"> 
						<input type="radio" name="situacao" value="2">
						<span class="label label-danger">NAO</span> 
	                   </label>

               </div> -->

	    <input type="hidden" name="acao" value="incluir">
			    <button type="submit" class="btn btn-primary" id='botao'> 
			      Gravar
		    </button>
			    <a href='cadastro_pessoas.php' class="btn btn-danger">Cancelar</a>
		  </form>
	 </fieldset>
	</div>

</div></body>
</head>
</html>
<?php include(FOOTER_TEMPLATE); ?>