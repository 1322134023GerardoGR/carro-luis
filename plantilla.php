<?php
require 'fpdf.php';
class PDF extends FPDF
{
	
	function Header(): void
    {

	$this->Image("img/logo.png",10 ,-5, 30);
	$this->SetFont('Arial','B',15);
	$this->Cell(30);
	$this->Cell(200,10, 'Reporte de Cotizaciones',0,0,'C');
	$this->Ln(20);
	}

	function Footer(): void
    {
	$this->SetY(20);
	$this->SetFont('Arial','I',10);
    $this->Ln(20);
	}

}


?>