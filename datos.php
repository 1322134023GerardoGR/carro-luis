<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cotizador_carros";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$transmisionInput = $_POST['transmision'];
$colorInput = $_POST['color'];
$interioresInput = $_POST['interiores'];
$frenosInput = $_POST['frenos'];
$rinesInput = $_POST['rines'];
$escapeInput = $_POST['escape'];
$estribosSelected = $_POST['estribos'];
$aleronInput = $_POST['aleron'];
$lucesInput = $_POST['luces'];
$adicionalesInput = isset($_POST['luces-adicional']) ? $_POST['luces-adicional'] : 'Sin luces adicionales:0';

list($transmisionLabel, $transmisionPrice) = explode(":", $transmisionInput);


list($colorLabel, $colorPrice) = explode(":", $colorInput);
list($interioresLabel, $interioresPrice) = explode(":", $interioresInput);
list($frenosLabel, $frenosPrice) = explode(":", $frenosInput);
list($rinesLabel, $rinesPrice) = explode(":", $rinesInput);
list($escapeLabel, $escapePrice) = explode(":", $escapeInput);

foreach ($estribosSelected as $estribo) {
    list($estriboLabel, $estriboPrice) = explode(":", $estribo);
    $estribosLabels[] = $estriboLabel;
    $estribosPrices[] = $estriboPrice;
}

$serializedEstribosLabels = serialize($estribosLabels);
$serializedEstribosPrices = serialize($estribosPrices);

$deserializedArray = unserialize($serializedEstribosLabels);
$deserializedArrayPrices = unserialize($serializedEstribosPrices);

$valorPrice=0;

//list($estribosLabel, $estribosPrice) = explode(":", $estribosInput);
list($aleronLabel, $aleronPrice) = explode(":", $aleronInput);
list($lucesLabel, $lucesPrice) = explode(":", $lucesInput);
list($lucesAdicionalLabel, $lucesAdicionalPrice) = explode(":", $adicionalesInput);

$priceVariables = [
    $transmisionPrice,
    $colorPrice,
    $interioresPrice,
    $frenosPrice,
    $rinesPrice,
    $escapePrice,
    $aleronPrice,
    $lucesAdicionalPrice,
    $lucesPrice
];
$fecha = date('Y-m-d');
$hora = date(' H:i:s');

$palabra = "";
foreach ($deserializedArray as $word) {
    $palabra .= $word . ', ';
}

$palabra = rtrim($palabra, '+');

foreach ($priceVariables as $price) {
    $valorPrice += intval($price);
}

foreach ($deserializedArrayPrices as $price) {
    $valorPrice += intval($price);
}

$iva=$valorPrice*0.16;
$total=$valorPrice+$iva;

$resumen="Se cotizo un carro con $transmisionLabel de color $colorLabel con interiores $interioresLabel, frenos $frenosLabel y rines $rinesLabel con escape $escapeLabel, conjunto de $palabra, aleron $aleronLabel, con $lucesLabel y $lucesAdicionalLabel";



$sql = "INSERT INTO carros (transmision, color, mat_interiores, frenos, rines, escape, estribos, aleron, luces, adicionales, subtotal, iva, total, fecha, hora, resumen)
        VALUES ('$transmisionLabel', '$colorLabel', '$interioresLabel', '$frenosLabel', '$rinesLabel', '$escapeLabel', '$palabra', '$aleronLabel', '$lucesLabel', '$lucesAdicionalLabel','$valorPrice','$iva','$total','$fecha','$hora', '$resumen')";

if ($conn->query($sql) === TRUE) {

    echo "Cotización guardada correctamente.";
    header("Location: table.php");
} else {
    echo "Error al guardar la cotización: " . $conn->error;
}

// Cerrar la conexión
$conn->close();

