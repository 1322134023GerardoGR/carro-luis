<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Cotiza tu Carro</title>
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
</head>

<body>


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
<div class="container-fluid page-header mb-3 p-0 fondo-cotizador">
  <div class="container-fluid page-header-inner py-5">
    <div class="container text-center">
      <h1 class="display-3 text-white mb-1 animated slideInDown">Cotizaciones</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center text-uppercase">
          <li class="breadcrumb-item"><a href="index.html">Proyectos</a></li>
          <li class="breadcrumb-item text-white active" aria-current="page">Tabla de cotizaciones</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-xxl py-1">
  <div class="container px-1 px-md-1 py-1" id="configura">
    <div style="text-align: end;">
      <br>
    <a href="Cotizador.html" class="btn btn-primary">Crear</a>  <a href="pdf.php" class="btn btn-primary">Ver cotizaciones pdf</a>
      <br>
    </div>
      <h1>Tabla de cotizaciones de personas</h1>
    <br>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cotizador_carros";
    $conn = new mysqli($servername, $username, $password, $dbname);


    $sql = "SELECT * FROM carros";
    $result = mysqli_query($conn,$sql);

    if ($result->num_rows > 0) {
    echo '<table border="1"  style="font-size: 12px;">
    <tr>
        <th style="background-color: #D81324; color: white ; text-align: center;">ID</th>
        <th style="background-color: #D81324; color: white ; text-align: center;">Transmisión</th>
        <th style="background-color: #D81324; color: white ; text-align: center;">Color</th>
        <th style="background-color: #D81324; color: white ; text-align: center;">Interiores</th>
        <th style="background-color: #D81324; color: white ; text-align: center;">Frenos</th>
        <th style="background-color: #D81324; color: white ; text-align: center;">Rines</th>
        <th style="background-color: #D81324; color: white ; text-align: center;">Escape</th>
        <th style="background-color: #D81324; color: white ; text-align: center;">Estribos</th>
        <th style="background-color: #D81324; color: white ; text-align: center;">Alerón</th>
        <th style="background-color: #D81324; color: white ; text-align: center;">Luces</th>
        <th style="background-color: #D81324; color: white ; text-align: center;">Adicionales</th>
        <th style="background-color: #D81324; color: white ; text-align: center;">Subtotal</th>
        <th style="background-color: #D81324; color: white ; text-align: center;">Iva</th>
        <th style="background-color: #D81324; color: white ; text-align: center;">Total</th>
        <th style="background-color: #D81324; color: white ; text-align: center;">Resumen</th>
        <th style="background-color: #D81324; color: white ; text-align: center;">Acciones</th>
    </tr>';

    while ($row = $result->fetch_assoc()) {
    echo '<tr>
    <td>' . $row['id'] . '</td>
    <td>' . $row['transmision'] . '</td>
    <td>' . $row['color'] . '</td>
    <td>' . $row['mat_interiores'] . '</td>
    <td>' . $row['frenos'] . '</td>
    <td>' . $row['rines'] . '</td>
    <td>' . $row['escape'] . '</td>
    <td>' . $row['estribos'] . '</td>
    <td>' . $row['aleron'] . '</td>
    <td>' . $row['luces'] . '</td>
    <td>' . $row['adicionales'] . '</td>
    <td>' . $row['subtotal'] . '</td>
    <td>' . $row['iva'] . '</td>
    <td>' . $row['total'] . '</td>
    <td >' . $row['resumen'] . '</td>
    <td>
      <a href="update.php?id=' . $row['id'] . '" class="btn btn-primary">Editar</a>
      <br>
      <br>
      <a href="delete.php?id=' . $row['id'] . '" class="btn btn-primary">Eliminar</a>
    </td>
  </tr>';
    }
    echo '</table>';
    } else {
    echo "No hay registros en la tabla de carros.";
    }
    $result->free_result();
    $conn->close();
    ?>

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

</body>

</html>