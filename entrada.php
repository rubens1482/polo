<? error_reporting(E_ALL);  ?>
<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>
<?php include(HEADER_TEMPLATE); ?>
<? 
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

<html>
<head>
     <title>-- ENTRADA DE PESSOAS --</title>
     

<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <style type="text/css">
    .teste {
	font-size: 9px;
}
    </style>
    
  <script type="text/javascript" src="jquery-1.3.2.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $("input[name='matricula']").blur(function(){
    
	   var $id = $("input[name='id']");
	  var $tipo = $("input[name='tipo']");
      var $identidade = $("input[name='identidade']");
	  var $nome = $("input[name='nome']");
      var $situacao = $("input[name='situacao']");
      var $placa = $("input[name='placa']");
      var $veiculo = $("input[name='veiculo']");
      var $cidade = $("input[name='cidade']");
      var $uf = $("input[name='uf']");
      var $empresa = $("input[name='empresa']");
	  

	  $id.val('Carregando...');
      $identidade.val('Carregando...');
      $tipo.val('Carregando...');
      $nome.val('Carregando...');
	  $situacao.val('Carregando...');
	  $placa.val('Carregando...');
      $veiculo.val('Carregando...');
      $cidade.val('Carregando...');
      $uf.val('Carregando...');	  
      $empresa.val('Carregando...');	  
      
	  
        $.getJSON(
          'function.php',
          { matricula: $( this ).val() },
          function( json )
          {
            $id.val( json.id );
			$identidade.val( json.identidade );
			$tipo.val( json.tipo );
            $nome.val( json.nome );
            $situacao.val( json.situacao );
            $placa.val( json.placa );
            $veiculo.val( json.veiculo );
            $cidade.val( json.cidade );
            $uf.val( json.uf );			
			$empresa.val( json.empresa );
			
			
          }
        );
    });
  });
  </script>
</head>
<body>


<!-- FORMULARIO NOVO -->

<div class='container'>
		<fieldset>
			<legend>
			<h6>CONTROLE DE ENTRADAS</h6></legend>
			
		  <form action="liberar.php" name="entrar" method="post" id='form-contato'>

		    <div class="form-group col-md-2">
			<label for="matricula">Matrícula:</label>
			<input type="matricula" onkeypress="if(event.keyCode==13){ this.blur(); return false;}" class="form-control" id="matricula" name="matricula" placeholder="Informe a Matricula">
        
            </div>

			    <div class="form-group col-md-3">
			      <label for="tipo">Tipo de Cliente:</label>
                  <input type="tipo" class="form-control" id="tipo" name="tipo" placeholder="Tipo de Cliente">
		
				</div>
			    <div class="form-group col-md-5">
			      <label for="nome">Nome:</label>
			      <input type="nome" class="form-control" id="nome" maxlength="30" name="nome" placeholder="Nome" readonly="readonly">
		
				</div>
			    <div class="form-group col-md-2">
			      <label for="identidade">RG:</label>
			      <input type="identidade" class="form-control" id="identidade" maxlength="25" name="identidade" placeholder="RG" readonly="readonly">
		
				</div>
<div class="row">
			    <div class="form-group col-md-2">
			      <label for="placa">Placa:</label>
			      <input type="placa" class="form-control" id="placa" maxlength="12" name="placa" placeholder="Placa">
		
				</div>
			    <div class="form-group col-md-3">
			      <label for="veiculo">Veículo:</label>
			      <input type="veiculo" class="form-control" id="veiculo" maxlength="20" name="veiculo" placeholder="Veiculo">
		
				</div>
                
</div>			
<div class="row">	
				<div class="form-group col-md-2">
			      <label for="cidade">Cidade:</label>
			      <input type="cidade" class="form-control" id="cidade" maxlength="13" name="cidade" placeholder="Cidade">
		
				</div>
			    <div class="form-group col-md-1">
			      <label for="uf">UF:</label>
			      <input type="uf" class="form-control" id="uf" maxlength="3" name="uf" placeholder="Estado">
		
				</div>
			    <div class="form-group col-md-3">
			      <label for="empresa">Empresa:</label>
			      <input type="empresa" class="form-control" id="empresa" maxlength="25" name="empresa" placeholder="Empresa">
		
				</div>
</div>			
            <div>
		
                <div class="form-group">
                 <label for="situacao">Acesso Liberado? (1)SIM (2)NÃO</label>
				 <input name="situacao" type="text" readonly="readonly" size="5" />      
                </div>
<div>
<input name='horaentrada' type='text' disabled value=$hora size='6' style="display:none">
<input name='dataentrada' type='text' disabled value=$dataLocal size='10' style="display:none">
</div>

	    <input type="hidden" name="acao" value="LIBERAR ACESSO">
			    <button type="submit" class="btn btn-primary" id='botao'> 
			      LIBERAR ENTRADA
		    </button>
			    <a href='cadastro_pessoas.php' class="btn btn-danger">Cancelar</a>
		  </form>
	 </fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</div>

<!-- FIM FORMULARIO NOVO -->
</body>
</html>
<?php include(FOOTER_TEMPLATE); ?>