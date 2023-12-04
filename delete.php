<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $servername = "localhost";
    $username = "root";
    $password = "Lolitos76170604!";
    $dbname = "cotizador_carros";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "DELETE FROM carros WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado correctamente.";
        header("Location: table.php");
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID no proporcionado o no válido.";
}
?>