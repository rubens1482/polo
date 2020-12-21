<!DOCTYPE html >
<html lang ="pt-br">
<head><title>Formulário</title>
<link href="../css/bootstrap.css" rel="stylesheet" media="screen">
</head>
<meta charset="utf-8">
<body>
<?php
require_once("fpdf/fpdf.php");
// chamada da função de conexão
$servidor = "mysql.hostinger.com.br"; /*maquina a qual o banco de dados está*/
$usuario = "u870495724_polo"; /*usuario do banco de dados MySql*/
$senha = "polo123"; /*senha do banco de dados MySql*/
$banco = "u870495724_polo"; /*seleciona o banco a ser usado*/
$conexao = mysql_connect($servidor,$usuario,$senha);/*Conecta no bando de dados MySql*/
if (!$conexao) {echo "Não foi possível conectar ao banco MySQL.
"; exit;}/*testa a conexão*/
else {
;}
mysql_select_db($banco,$conexao); /*seleciona o banco a ser usado*/
$res = mysql_query (" SELECT `matricula`,`nome`,`tipo`,`foto` FROM `tb_cadastro`` "); /*Executa o comando SQL e retorna o valor da consulta em uma variavel ($res) */
?>
<?php
// Variaveis de Tamanho
$mesq = "5"; // Margem Esquerda (mm)
$mdir = "5"; // Margem Direita (mm)
$msup = "12"; // Margem Superior (mm)
$leti = "66.7"; // Largura da Etiqueta (mm)
$aeti = "25.4"; // Altura da Etiqueta (mm)
$ehet = "2"; // Espaço horizontal entre as Etiquetas (mm)
$pdf=new fpdf('P','mm','Letter'); // Cria um arquivo novo tipo carta, na vertical.
$pdf->Open(); // inicia documento
$pdf->AddPage(); // adiciona a primeira pagina
$pdf->SetMargins('5','12,7'); // Define as margens do documento
$pdf->SetAuthor(""); // Define o autor
$pdf->SetFont('helvetica',7); // Define a fonte
$pdf->SetDisplayMode('fullpage');//Adicinei uma fullpage
$coluna = 0;
$linha = 0;
//MONTA A ARRAY PARA ETIQUETAS
while($dados = mysql_fetch_array($res)) {
$nome = $dados["nome"];
$tipo = $dados["tipo"];
$matricula = $dados["matricula`"];
$foto = $dados["foto`"];
//$estado = $dados["ESTADO_1"];
//$cida = $dados["CIDADE_1"];
//$local = $bairro . " – " . $cida . " – " . $estado;
//$cep = "CEP_1: " . $dados["CEP_1"];
if($linha == "10") {
$pdf->AddPage();
$linha = 0;
}
if($coluna == "3") { // Se for a terceira coluna
$coluna = 0; // $coluna volta para o valor inicial
$linha = $linha +1; // $linha é igual ela mesma +1
}
if($linha == "10") { // Se for a última linha da página
$pdf->AddPage(); // Adiciona uma nova página
$linha = 0; // $linha volta ao seu valor inicial
}
$posicaoV = $linha*$aeti;
$posicaoH = $coluna*$leti;
if($coluna == "0") { // Se a coluna for 0
$somaH = $mesq; // Soma Horizontal é apenas a margem da esquerda inicial
} else { // Senão
$somaH = $mesq+$posicaoH; // Soma Horizontal é a margem inicial mais a posiçãoH
}
if($linha =="0") { // Se a linha for 0
$somaV = $msup; // Soma Vertical é apenas a margem superior inicial
} else { // Senão
$somaV = $msup+$posicaoV; // Soma Vertical é a margem superior inicial mais a posiçãoV
}
$pdf->Text($somaH,$somaV,$nome); // Imprime o nome da pessoa de acordo com as coordenadas
$pdf->Text($somaH,$somaV+4,$ende); // Imprime o endereço da pessoa de acordo com as coordenadas
$pdf->Text($somaH,$somaV+8,$local); // Imprime a localidade da pessoa de acordo com as coordenadas
$pdf->Text($somaH,$somaV+12,$cep); // Imprime o cep da pessoa de acordo com as coordenadas
$coluna = $coluna+1;
}
$pdf->Output();
?>
<script src="js/bootstrap.js"></script>
</body>
</html>