<?php include 'conexion.php'; ?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <title>Certificados HCD Posadas</title>
  <!-- Bootstrap core CSS -->
  <link href="dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />


</head>

<body>

  <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">

        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <p></a></a></p>
        </form>
      </div>
    </nav>
  </header>

  <!-- Begin page content -->

  <div class="container">
    <h4 class="mt-5">Buscar Certificados de participación</h4>
    <hr>

    <div class="row">
      <div class="col-12 col-md-12">
        <!-- Contenido -->



        <ul class="list-group">
          <li class="list-group-item">
            <form method="post">
              <div class="form-row align-items-center">
                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInput">Curso</label>
                  <input required name="Nombre" type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Ingrese su nombre" size="25">
                  <input required name="Apellido" type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Ingrese su apellido" size="25">
                  <input name="buscar" type="hidden" class="form-control mb-2" id="inlineFormInput" value="v">

                  <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                </div>
              </div>
            </form>
          </li>

        </ul>


        <?php

        if (!empty($_POST)) {
          $aKeyword = explode(" ", $_POST['Apellido']);
          $bKeyword = explode(" ", $_POST['Nombre']);
          //echo "Variable: ".$aKeyword;
          $query = "SELECT * FROM persona WHERE UPPER(apellido) LIKE UPPER('%$aKeyword[0]%') AND UPPER(nombre) LIKE UPPER('%$bKeyword[0]%')";

          $result = $db->query($query);
          echo "<br>Has buscado :<b> " . $_POST['Nombre'] . ' ' . $_POST['Apellido'] . "</b>";

          if (mysqli_num_rows($result) > 0) {
            $row_count = 0;
            echo "<br><br>Resultados encontrados: ";
            echo "<br><table class='table table-striped'>";
            while ($row = $result->fetch_assoc()) {
              $row_count++;
              echo "<tr><td>ID</td><td>Participante</td><td>Descargar</td></tr>";
              echo "<tr><td>" . $row_count . " </td><td>" . ucwords(mb_strtolower($row['nombre'])) . ' ' . ucwords(mb_strtolower($row['apellido'])) . "</td><td><a href='descarga.php?dni=" . $row['dni'] . "&nombre=" . $row['nombre'] . " &apellido=" . $row['apellido'] . " '><img src=img/pdf.png width='30'></td></tr>";
            }
            echo "</table>";
          } else {
            echo "<br>Resultados encontrados: Ninguno";
          }
        }

        ?>




        <!-- Fin Contenido -->
      </div>
    </div><!-- Fin row -->
  </div><!-- Fin container -->
  <footer class="footer">
    <div class="container">
      <span class="text-muted"></span>
    </div>
  </footer>
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="assets/js/vendor/popper.min.js"></script>
  <script src="dist/js/bootstrap.min.js"></script>
</body>

</html>