<?php
$servername = "localhost";
$username = "root";
$password = "Lolitos76170604!";
$dbname = "cotizador_carros";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "SELECT * FROM carros WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No se encontró el registro a editar.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edita Cotizacion</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap"
          rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .border-1 {
            display: inline-block; /* Hace que el div se ajuste al contenido */
            text-align: left; /* Alinea el texto a la izquierda dentro del div */
            border: 1px solid #000; /* Añade un borde alrededor del div */
            padding: 10px; /* Añade relleno alrededor del contenido del div */
        }

        .border-1 li {
            list-style-type: disc; /* Añade viñetas a los elementos de lista */
            margin-left: 20px; /* Establece un margen a la izquierda para las viñetas */
        }
    </style>

</head>

<body>
<!-- Spinner Start -->
<div id="spinner"
     class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><i class="fa fa-car me-3"></i>Cotizador y Cuestionarios</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.html" class="nav-item nav-link">Proyectos</a>
            <a href="Ingles.html" class="nav-item nav-link">Ingles</a>
            <a href="Geografia.html" class="nav-item nav-link">Geografia</a>
            <a href="table.php" class="nav-item nav-link">Tabla de cotizaciones</a>
        </div>
    </div>
    <a href="Cotizador.html" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Ir a Cotizador<i
            class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
<!-- Navbar End -->


<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0 fondo-cotizador">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Cotiza tu Carro</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="index.html">Proyectos</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Cotizador</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-xxl py-3">
    <div class="container px-4 px-md-3 py-3" id="configura">

        <h1>Configura los Elementos Principales</h1>
        <br>
        <form action="actualizar.php" method="POST">
            <div class="row justify-content-start">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="col-lg-4">
                    <h2>Transmisión <img src="icons/transmision-icono.png" style="width: 40px; height: 40px;" alt=""></h2>
                    <select class="form-select-lg mb-2 cotizador" data-label="transmision" name="transmision" aria-label="Default select example" id="transmision">
                        <option selected disabled value="0">Transmisión</option>
                        <?php
                        // Opciones de transmisión
                        $transmisionOptions = [
                            "CVT:344900" => "CVT - $344,900 MXN",
                            "Automatica:322900" => "Automatica - $322,900 MXN",
                            "Manual:298900" => "Manual - $298,900 MXN",
                            // Agrega más opciones según sea necesario
                        ];

                        // Valor almacenado en la base de datos para la transmisión
                        $transmisionGuardada = $row['transmision'];

                        // Recorre las opciones y marca la opción almacenada como seleccionada
                        foreach ($transmisionOptions as $value => $label) {
                            list($transmision, $precio) = explode(':', $value);
                            $selected = ($transmisionGuardada === $transmision) ? 'selected' : '';
                            echo "<option value=\"$value\" data-label=\"$value\" $selected>$label</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-4">
                    <h2>Color <img src="icons/carroceria-icono.png" style="width: 40px; height: 40px;" alt=""></h2>
                    <select class="form-select-lg mb-2 cotizador" data-label="color" name="color" aria-label="Default select example" id="color">
                        <option selected disabled value="0">Color</option>
                        <?php
                        // Opciones de color
                        $colorOptions = [
                            "Standard:0" => "Standard - Sin costo adicional",
                            "Bitono:5000" => "Bitono - $5,000 MXN",
                            "Metalizado:10000" => "Metalizado - $10,000 MXN"
                            // Agrega más opciones según sea necesario
                        ];

                        // Valor almacenado en la base de datos para el color
                        $colorGuardado = $row['color'];

                        // Recorre las opciones y marca la opción almacenada como seleccionada
                        foreach ($colorOptions as $value => $label) {
                            list($color, $precio) = explode(':', $value);
                            $selected = ($colorGuardado === $color) ? 'selected' : '';
                            echo "<option value=\"$value\" data-label=\"$value\" $selected>$label</option>";
                        }
                        ?>
                    </select>

                </div>
                <div class="col-lg-4">
                    <h2>Material de Interiores <img src="icons/interiores-icono.png" style="width: 20px; height: 20px;" alt=""></h2>
                    <select class="form-select-lg mb-2 cotizador" data-label="Material de Interiores" name="interiores" aria-label="Default select example" id="interiores">
                        <option selected disabled value="0">Material de Interiores</option>
                        <?php
                        // Opciones de materiales de interiores
                        $interioresOptions = [
                            "Tela:0" => "Tela - Sin costo adicional",
                            "Piel Negra:5000" => "Piel Negra - $5,000 MXN",
                            "Piel con Detalles en Rojo:10000" => "Piel con detalles en Rojo - $10,000 MXN"
                            // Agrega más opciones según sea necesario
                        ];

                        // Valor almacenado en la base de datos para los interiores
                        $interioresGuardado = $row['mat_interiores'];

                        // Recorre las opciones y marca la opción almacenada como seleccionada
                        foreach ($interioresOptions as $value => $label) {
                            list($interiores, $precio) = explode(':', $value);
                            $selected = ($interioresGuardado === $interiores) ? 'selected' : '';
                            echo "<option value=\"$value\" data-label=\"$value\" $selected>$label</option>";
                        }
                        ?>
                    </select>

                </div>
            </div>
            <br>
            <br>
            <div class="row justify-content-start">
                <div class="col-lg-4">
                    <h2>Frenos <img src="icons/frenos-iconos.png" style="width: 40px; height: 40px;" alt=""></h2>
                    <div class="form-check">
                        <input class="form-check-input cotizador" type="radio" name="frenos" id="frenos-serie" value="Serie:0" data-price="0" data-label="Serie:0" <?php echo ($row['frenos'] === 'Serie') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="frenos-serie">
                            Serie - Sin costo adicional
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input cotizador" type="radio" name="frenos" id="frenos-deportivos" value="Deportivos:24000" data-price="24000" data-label="Deportivos:24000" <?php echo ($row['frenos'] === 'Deportivos') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="frenos-deportivos">
                            Deportivos - $24,000 MXN
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input cotizador" type="radio" name="frenos" id="frenos-carreras" value="Derrape:50000" data-price="50000" data-label="Derrape:50000" <?php echo ($row['frenos'] === 'Derrape') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="frenos-carreras">
                            Derrape - $50,000 MXN
                        </label>
                    </div>

                </div>
                <br>
                <div class="col-lg-4">
                    <h2>Rines <img src="icons/rines-icono.png" style="width: 40px; height: 40px;" alt=""></h2>
                    <div class="form-check">
                        <input class="form-check-input cotizador" type="radio" name="rines" id="rines-aluminio" value="Serie:0" data-price="0" data-label="Serie:0" <?php echo ($row['rines'] === 'Serie') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="rines-aluminio">
                            Serie - Sin costo adicional
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input cotizador" type="radio" name="rines" id="rines-acero" value="Aluminio:40000" data-price="40000" data-label="Aluminio:40000" <?php echo ($row['rines'] === 'Aluminio') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="rines-acero">
                            Aluminio - $40,000 MXN
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input cotizador" type="radio" name="rines" id="rines-aleacion" value="Fibra de Carbono:80000" data-price="80000" data-label="Fibra de Carbono:80000" <?php echo ($row['rines'] === 'Fibra de Carbono') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="rines-aleacion">
                            Fibra de Carbono - $80,000 MXN
                        </label>
                    </div>

                </div>
                <br>
                <div class="col-lg-4">
                    <h2>Escape <img src="icons/escape-icono.png" style="width: 40px; height: 40px;" alt=""></h2>
                    <div class="form-check">
                        <input class="form-check-input cotizador" type="radio" name="escape" id="escape-serie" value="Serie:0" data-price="0" data-label="Serie:0" <?php echo ($row['escape'] === 'Serie') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="escape-serie">
                            Serie - Sin costo adicional
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input cotizador" type="radio" name="escape" id="escape-deportivo" value="Deportivos:20000" data-price="20000" data-label="Deportivos:20000" <?php echo ($row['escape'] === 'Deportivos') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="escape-deportivo">
                            Deportivos - $20,000 MXN
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input cotizador" type="radio" name="escape" id="escape-silenciador" value="Silenciador:25000" data-price="25000" data-label="Silenciador:25000" <?php echo ($row['escape'] === 'Silenciador') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="escape-silenciador">
                            Silenciador - $25,000 MXN
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <h1>Agrega mas Elementos</h1>
            <br>
            <div class="row justify-content-start">
                <div class="col-lg-4">
                    <h2>Estribos <img src="icons/estribos-icono.png" style="width: 40px; height: 40px;" alt=""></h2>
                    <div class="form-check">
                        <input class="form-check-input cotizador tipe1" type="checkbox" data-price="0" id="sin-estribos"
                               data-label="Sin estribos:0" name="estribos[]" value="Sin estribos:0" <?php echo (in_array('Sin estribos:0', explode(', ', $row['estribos']))) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="sin-estribos">Sin estribos</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input cotizador tipe1" type="checkbox" data-price="2500"
                               id="estribos-lateral-plastico" data-label="Laterales en Plastico:2500"
                               name="estribos[]" value="Laterales en Plastico:2500" <?php echo (in_array('Laterales en Plastico:2500', explode(', ', $row['estribos']))) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="estribos-lateral-plastico">Laterales en Plastico - $2,500 MXN</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input cotizador tipe1" type="checkbox" data-price="2500"
                               id="estribos-delantero-plastico" data-label="Delanteros en Plastico:2500"
                               name="estribos[]" value="Delanteros en Plastico:2500" <?php echo (in_array('Delanteros en Plastico:2500', explode(', ', $row['estribos']))) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="estribos-delantero-plastico">Delanteros en Plastico - $2,500 MXN</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input cotizador tipe1" type="checkbox" data-price="4000"
                               id="estribos-lateral-carbono" data-label="Laterales en Fibra de Carbono:4000"
                               name="estribos[]" value="Laterales en Fibra de Carbono:4000" <?php echo (in_array('Laterales en Fibra de Carbono:4000', explode(', ', $row['estribos']))) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="estribos-lateral-carbono">Laterales en Fibra de Carbono - $4,000 MXN</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input cotizador tipe1" type="checkbox" data-price="4000"
                               id="estribos-delantero-carbono" data-label="Delanteros en Fibra de Carbono:4000"
                               name="estribos[]" value="Delanteros en Fibra de Carbono:4000" <?php echo (in_array('Delanteros en Fibra de Carbono:4000', explode(', ', $row['estribos']))) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="estribos-delantero-carbono">Delanteros en Fibra de Carbono - $4,000 MXN</label>
                    </div>

                </div>
                <div class="col-lg-4">
                    <h2>Aleron <img src="icons/aleron-icono.png" style="width: 50px; height: 50px;" alt=""></h2>
                    <div class="form-check">
                        <input class="form-check-input cotizador" type="radio" name="aleron" id="sin-aleron" data-price="0" data-label="Sin aleron:0" value="Sin aleron:0" <?php echo ($row['aleron'] === 'Sin aleron') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="sin-aleron">Sin aleron - Sin costo adicional</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input cotizador" type="radio" name="aleron" id="aleron-circuito" data-price="8000" data-label="GT:8000" value="GT:8000" <?php echo ($row['aleron'] === 'GT') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="aleron-circuito">GT - $8,000 MXN</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input cotizador" type="radio" name="aleron" id="aleron-arco" data-price="13000" data-label="Fibra de Carbono:13000" value="Fibra de Carbono:13000" <?php echo ($row['aleron'] === 'Fibra de Carbono') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="aleron-arco">Fibra de Carbono - $13,000 MXN</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="aleron" id="aleron-circuito-carbono" data-price="7800" data-label="En Arco:7800" value="En Arco:7800" <?php echo ($row['aleron'] === 'En Arco') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="aleron-circuito-carbono">En Arco - $7,800 MXN</label>
                    </div>

                </div>
                <div class="col-lg-4">
                    <h2>Luces <img src="icons/luces-icono.png" style="width: 50px; height: 50px;" alt=""></h2>
                    <div class="form-check">
                        <input class="form-check-input cotizador" type="radio" name="luces" id="luces-halogenas" data-price="0" data-label="Luces Halogenas:0" value="Luces Halogenas:0" <?php echo ($row['luces'] === 'Luces Halogenas') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="luces-halogenas">Luces Halogenas - Sin costo adicional</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input cotizador" type="radio" name="luces" id="luces-led" data-price="2000" data-label="Luces Led:2000" value="Luces Led:2000" <?php echo ($row['luces'] === 'Luces Led') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="luces-led">Luces Led - $2,000 MXN</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input cotizador" type="radio" name="luces" id="luces-xenon" data-price="4000" data-label="Luces Xenon:4000" value="Luces Xenon:4000" <?php echo ($row['luces'] === 'Luces Xenon') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="luces-xenon">Luces Xenon - $4,000 MXN</label>
                    </div>


                    <h5>Adicional a las luces</h5>
                    <div class="form-check">
                        <input class="form-check-input cotizador" type="radio" name="luces-adicional"
                               id="luces-antiniebla" data-price="2000" data-label="Luces Antiniebla:2000"
                               value="Luces Antiniebla:2000" <?php echo ($row['adicionales'] === 'Luces Antiniebla') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="luces-antiniebla">Luces Antiniebla - $2,000 MXN</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input cotizador" type="radio" name="luces-adicional"
                               id="sin-luces" data-price="0" data-label="Sin luces:0"
                               value="Sin luces adicionales:0" <?php echo ($row['adicionales'] === 'Sin luces adicionales') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="sin-luces">Sin luces - $0 MXN</label>
                    </div>

                </div>

            </div>
            <br><br>
            <input type="submit" class="btn btn-success" id="calculateButton" value="Editar cotización"/>
            &nbsp;&nbsp;
            <button type="button" class="btn btn-success" id="impTicket">Imprimir ticket</button>
            &nbsp;
            <button type="button" class="btn btn-warning" id="resetButton">Restablecer</button>
            <br> <br>
        </form>
        <div id="selections" style="text-align: center;">
            <span id="totalAmount"></span>

        </div>
    </div>
</div>
<!-- Contact End -->


<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn footer-cotizador" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Cotizador y Cuestionarios</h4>
                <a class="btn btn-link" href="index.html">Proyectos</a>
                <a class="btn btn-link" href="Ingles.html">Ingles</a>
                <a class="btn btn-link" href="Geografia.html">Geografía</a>
                <a class="btn btn-link" href="Cotizador.html">Cotizador</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Cotizador y Questionarios</a>, All Right Reserved Hugo GG
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
<script src="js/cotizador.js"></script>
</body>

</html>
