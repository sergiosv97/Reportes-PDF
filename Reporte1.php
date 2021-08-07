<?php 
include('Reportegeneral.php');

$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',18);
$pdf->Cell(120,12,'Reporte 1',0,1,'R',0);

$pdf->SetFont('Arial','',12);
for ($i = 1; $i <=80 ; $i++) {
	$pdf->Cell(120,12, 'Tres tristes tigres tragan trigo en un trigal.',0,1);
}

$pdf->Output();
 ?>