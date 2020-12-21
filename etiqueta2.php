<?
define('FPDF_FONTPATH', 'fpdf/font/');
require('fpdf/fpdf.php');
 include("conexao2.php");
 $query_etiqueta = "SELECT * FROM tb_cadastro";
 $pdf =  new FPDF();
 $pdf -> Open();
 $pdf -> AddPage();
 $pdf -> SetFont('Arial', 'B', '10');
 $pdf -> Cell(40, 5, 'Matricula');
 $pdf -> SetX(35);
 $pdf -> Cell(40, 5, 'Nome');
 while ($resultado = msql_fetch_row($query_etiqueta)){$pdf->Ln();
 $pdf ->Cell(40, 5, $resultado['matricula']);
 $pdf ->SetX(35);
 $pdf ->Cell(60, 5, $resultado['nome'] );
 }
 $pdf->Output(); 
 ?>