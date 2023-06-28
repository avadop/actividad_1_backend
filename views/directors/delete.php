<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Biblioteca de Directores</title>
  <!-- Incluye los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  
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
                Borrado de director
            </h3>
            <?php
                require_once('../../controllers/DirectorController.php');
                
                $idDirector = $_POST['directorId'];
                $success = deleteDirector($idDirector);

                if($success) {
            ?>
            <div class="alert alert-success" role="alert" style="margin-top:1rem; font-size:1.25rem;">
              ¡Se ha borrado el Director con id <?php 
              echo $idDirector; 
              ?> con éxito!
            </div>           

            <?php
                } else {
            ?>

            <div class="alert alert-danger" role="alert" style="margin-top:1rem; font-size:1.25rem;">
                No se ha podido borrar el director. Si alguna serie tiene el director asociado no se podrá borrar. 
            </div>
            <?php
                }
            ?>
            <a class="btn btn-outline-primary" style="font-weight: 700; border-width: 3px;" href="showAll.php">Atrás</a>

        </div>
    </div>
</body>
</html>