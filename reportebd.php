<?php
include('Reportegeneral.php');
include('BD/conexionbd.php');

$ID = $_GET['idCat'];

$sqlproductos = "SELECT p.CodigoP, p.NombreP, p.Precio, c.IdCategoria FROM productos AS p INNER JOIN categorias AS c ON p.IdCategoria = c.IdCategoria WHERE c.IdCategoria = '$ID' ";

          $resultadoproductos = $conexion->query($sqlproductos);

$pdf = new PDF('L','mm','letter');
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(250,12,'LISTA DE PRODUCTOS',0,1,'C');
$pdf->Ln(10);
//encabezado de la tabla
$pdf->SetFillColor(232,232,230);
$pdf->SetFont('Times','B',14);
$pdf->Cell(40,12,'CODIGO',1,0,'C',1);
$pdf->Cell(190,12,'PRODUCTO',1,0,'C',1);
$pdf->Cell(30,12,'PRECIO',1,1,'C',1);
//cuerpo de la tabla
$pdf->SetFont('Arial','',12);
while ($registro = $resultadoproductos->fetch_array(MYSQLI_BOTH)){
		$pdf->Cell(40,12,$registro['CodigoP'],1,0,'L');
		$pdf->Cell(190,12,$registro['NombreP'],1,0,'L');
		$pdf->Cell(30,12,$registro['Precio'],1,1,'R');
}


$pdf->Output();

  ?>