<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Biblioteca de Series</title>
  <!-- Incluye los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
   <!-- Bootstrap Font Icon CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- Incluye los scripts de Bootstrap y tu código JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
                Borrado de plataforma
            </h3>

        <?php
            require_once('../../controllers/PlatformController.php');

            $idPlatform = $_POST['platformId'];
            $platformDeleted = deletePlatform($idPlatform);

            if($platformDeleted){
            ?>
            <div class="row">
                <div class="alert alert-success" style="margin-top:2rem; margin-left: 1rem" role="alert">
                    La plataforma ha sido eliminada correctamente.
                </div>
            </div>
            <?php
            } else { 
                ?>
                 <div class="row">
                    <div class="alert alert-danger" style="margin-top:2rem; margin-left: 1rem" role="alert">
                      No se ha podido eliminar la plataforma. Si alguna serie tiene la plataforma asociada no se podrá borrar. 
                    </div>
                </div>
                <?php
            }
        ?>
        <div>
        <div class="col-12" style="margin-top: 1em; margin-left: 1rem;">
            <a class="btn btn-outline-primary" style="font-weight: 700; border-width: 3px;" href="../../index.html">Atrás</a>
        </div> 
    </div>
</body>
</html>

