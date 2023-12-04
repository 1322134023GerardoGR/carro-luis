<?php
$servername = "127.0.0.1";
$username = "root";
$password = "Lolitos76170604!";
$dbname = "cotizador_carros";

// Crea una conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>
