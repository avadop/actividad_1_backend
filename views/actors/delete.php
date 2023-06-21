<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Biblioteca de Actores</title>
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
            <?php
                require_once('../../controllers/ActorController.php');
                
                $idActor = $_POST['actorId'];
                $success = deleteActor($idActor);

                if($success) {
            ?>
            <div class="alert alert-success" role="alert" style="margin-top:1rem; font-size:1.25rem;">
              ¡Se ha borrado el actor con id <?php 
              echo $idActor; 
              ?> con éxito!
            </div>            

            <?php
                } else {
            ?>

            <div class="alert alert-danger" role="alert" style="margin-top:1rem; font-size:1.25rem;">
                No se ha podido borrar el actor. Ha habido algún problema.
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>

