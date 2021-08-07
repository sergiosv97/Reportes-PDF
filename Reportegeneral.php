<?php
require('fpdf/fpdf.php');

class PDF extends FPDF {

	function Header()
	{
		$this->AddLink();
		$this->Image('img/images.jpg',10,10,55,0,'','www.facebook.com');
		$this->SetFont('Arial','B',18);
		$this->Cell(80);
		$this->Cell(30,10,'Sergio Sanchez',0,1,'C');
		$this->SetFont('Arial','B',14);
		$this->Cell(80);
		$this->Cell(30,10,'Estudiante',0,1,'C');
		$this->Ln(10);
	}

	function Footer()
	{
		$this->SetY(-18);
		$this->SetFont('Arial','I',12);
		$this->AddLink();
		$this->Cell(5,10,'Sergio Sanchez',0,0,'L');
		$this->SetFont('Arial','I',10);
		$this->Cell(0,10,utf8_decode('Página ').$this->PageNo( ).' de {nb}',0,0,'C');
	}
}


 ?>