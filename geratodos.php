<title>RELATORIO ENTRADA E SAIDA POLO TEXTIL INHUMAS</title>
<?php

// variáveis para conexão em LOCALHOST
  $conexao = mysqli_connect('localhost', 'root', '', 'polo');
 
   if (mysqli_connect_errno()){
      echo "falha ao conectar: ". mysqli_connect_error();
   die();
   }

// Nome do Arquivo do Excel que será gerado
$arquivo = 'relatorio_entsai.xls';

// Criamos uma tabela HTML com o formato da planilha para excel
$tabela .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$tabela = '<table border="1">';
$tabela .= '<tr>';
$tabela .= '<td colspan="2">RELATORIO ENTRADA E SAIDA POLO TEXTIL INHUMAS</tr>';
$tabela .= '</tr>';
$tabela .= '<tr>';
$tabela .= '<td><b>Mat</b></td>';
$tabela .= '<td><b>Nome</b></td>';
$tabela .= '<td><b>Tipo</b></td>';
$tabela .= '<td><b>Placa</b></td>';
$tabela .= '<td><b>Veiculo</b></td>';
$tabela .= '<td><b>Cidade</b></td>';
$tabela .= '<td><b>Uf</b></td>';
$tabela .= '<td><b>Empresa</b></td>';
$tabela .= '<td><b>Entrada</b></td>';
$tabela .= '<td><b>Entrada</b></td>';
$tabela .= '<td><b>Saida</b></td>';
$tabela .= '</tr>';

// Puxando dados do Banco de dados
$sql = 'SELECT * FROM tb_backupentrada';

$resultado = mysqli_query($conexao, $sql);

while($dados = mysqli_fetch_array($resultado))
{
$tabela .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';	
$tabela .= '<tr>';
$tabela .= '<td>'.$dados['matricula'].'</td>';
$tabela .= '<td>'.$dados['nome'].'</td>';
$tabela .= '<td>'.$dados['tipo'].'</td>';
$tabela .= '<td>'.$dados['placa'].'</td>';
$tabela .= '<td>'.$dados['veiculo'].'</td>';
$tabela .= '<td>'.$dados['cidade'].'</td>';
$tabela .= '<td>'.$dados['uf'].'</td>';
$tabela .= '<td>'.$dados['empresa'].'</td>';
$tabela .= '<td>'.$dados['dataentrada'].'</td>';
$tabela .= '<td>'.$dados['horaentrada'].'</td>';
$tabela .= '<td>'.$dados['horasaida'].'</td>';
$tabela .= '</tr>';
}

$tabela .= '</table>';

// Força o Download do Arquivo Gerado
header ('Cache-Control: no-cache, must-revalidate');
header ('Pragma: no-cache');
header('Content-Type: application/x-msexcel');
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
echo $tabela;
?>


 