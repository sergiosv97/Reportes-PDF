<?php
require('fpdf/fpdf.php');
$pdf = new FPDF(); //instanciamos la clase fpdf/horizontal o vertical, medida cm, in, mm, tamaño  'P','mm','A4'
$pdf->AddPage();//añade una nueva pagina al documento, tambien puede recibir parametros(orientacion,tamaño, rotacion) 'L','letter',0
$pdf->SetFont('Arial','B',18);//establece la fuente que se va a usar(fuente, estilo de fuente,tamaño)
$pdf->Cell(0,12, 'Hola mundo',1,1,'C',0);//ancho, alto, contenido texto, con o sin borde LRBT', continuar o siguiente linea, alineacion,color 
$pdf->Cell(0,12, 'desde el pdf',1,1,'C');
$pdf->Output(); //envia el documento a un destino 'D','Primer-Reporte.pdf'


?>