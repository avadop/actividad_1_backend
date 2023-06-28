<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Biblioteca de Seriees</title>
  <!-- Incluye los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- Bootstrap Font Icon CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- Incluye los scripts de Bootstrap y tu código JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    th {text-align: center;}
    td {text-align: center;}
  </style>
</head>
<body>
    <div class="container">
        <div class="col-12">
			<h1 style="margin-top:2rem; margin-left: 1rem;">
                <a class="text-decoration-none" href="../../index.html">
                    <i class="bi bi-collection-play"></i>    
                    Biblioteca de Series
                </a>
             </h1>

            <h3 style="margin-top:2rem; margin-left: 1rem;">
                <i class="bi bi-trash3-fill"></i>
                Borrado de serie
            </h3>
            <?php
                require_once('../../controllers/SerieController.php');
                
                $idSerie = $_POST['serieId'];
                $success = deleteSerie($idSerie);

                if($success) {
            ?>
            <div class="alert alert-success" role="alert" style="margin-top:1rem; font-size:1.25rem;">
              ¡Se ha borrado la serie con id <?php 
              echo $idSerie; 
              ?> con éxito!
            </div>           

            <?php
                } else {
            ?>

            <div class="alert alert-danger" role="alert" style="margin-top:1rem; font-size:1.25rem;">
                No se ha podido borrar la serie. Ha habido algún problema.
            </div>
            <?php
                }
            ?>
            <a class="btn btn-outline-primary" style="font-weight: 700; border-width: 3px;" href="../../index.html">Atrás</a>

        </div>
    </div>
</body>
</html>


