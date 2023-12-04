<?php

include 'plantilla.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cotizador_carros";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM carros ORDER BY total DESC LIMIT 5;";
$result = mysqli_query($conn, $sql);
$pdf = new PDF();

//5 cotizaciones mas altas

$pdf->AddPage('L',[216,600]);
$pdf->SetFillColor(219,36,16);
$pdf->SetFont('Courier','B','10');
$pdf->setTextColor(255,255,255);
$pdf->Cell(10,6,'ID',1,0,'C',1);
$pdf->Cell(30,6,'Transmision',1,0,'C',1);
$pdf->Cell(25,6,'Color',1,0,'C',1);
$pdf->Cell(55,6,'Interiores',1,0,'C',1);
$pdf->Cell(30,6,'Frenos',1,0,'C',1);
$pdf->Cell(40,6,'Rines',1,0,'C',1);
$pdf->Cell(30,6,'Escape',1,0,'C',1);
$pdf->Cell(140,6,'Estribos',1,0,'C',1);
$pdf->Cell(40,6,'Aleron',1,0,'C',1);
$pdf->Cell(30,6,'Luces',1,0,'C',1);
$pdf->Cell(40,6,'Subtotal',1,0,'C',1);
$pdf->Cell(30,6,'Iva',1,0,'C',1);
$pdf->Cell(30,6,'Total',1,1,'C',1);
$pdf->setTextColor(0,0,0);
while($row = $result->fetch_assoc())
{
    $pdf->Cell(10,6,$row['id'] ,1,0,'C');
    $pdf->Cell(30,6,$row['transmision'],1,0,'C');
    $pdf->Cell(25,6,$row['color'],1,0,'C');
    $pdf->Cell(55,6,$row['mat_interiores'],1,0,'C');
    $pdf->Cell(30,6,$row['frenos'],1,0,'C');
    $pdf->Cell(40,6,$row['rines'],1,0,'C');
    $pdf->Cell(30,6,$row['escape'],1,0,'C');
    $pdf->Cell(140,6,$row['estribos'],1,0,'C');
    $pdf->Cell(40,6,$row['aleron'],1,0,'C');
    $pdf->Cell(30,6,$row['luces'],1,0,'C');
    $pdf->Cell(40,6,$row['subtotal'],1,0,'C');
    $pdf->Cell(30,6,$row['iva'],1,0,'C');
    $pdf->Cell(30,6,$row['total'],1,1,'C');

}
$pdf->Output();

?>