<?php 

include 'plantilla.php';
require 'conexion.php';
$sql = "select * from usuarios";  
$result = mysqli_query($con, $sql);  
$pdf = new PDF();

$pdf->AddPage();
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Courier','B','10');
$pdf->Cell(40,6,'Usuario',1,0,'C',1);
$pdf->Cell(50,6,'Password',1,1,'C',1);

while($row = $result->fetch_assoc())
{
$pdf->Cell(40,6,$row['n_usuario'],1,0,'C');
$pdf->Cell(50,6,$row['contrasena'],1,1,'C');


}
$pdf->Output();

?>