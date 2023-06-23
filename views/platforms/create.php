<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Biblioteca de Series</title>
  <!-- Incluye los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  
  <!-- Incluye los scripts de Bootstrap y tu código JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="col-12">
            <h1 style="margin-top:2rem; margin-left: 1rem;">Biblioteca de Series</h1>

            <h3 style="margin-top:2rem; margin-left: 1rem">Crear nueva plataformas</h3>
        </div>  

        <div class="col-12" style="margin-top:2rem; margin-left: 1rem">
            <form name="create_platform" action="" method="POST">
                <div class="mb-3">
                    <label for="platformName" class="form-label">Nombre plataforma</label>
                    <input id="platformName" name="platformName" type="text" placeholder="Introduce el nombre de la plataforma" class="form-control" require/>
                </div>

                <button type="submit" value="Crear" class="btn btn-success" name="createBtn" style="float: right;">Crear</button>
            </form>         
        </div>        

        <?php
            require_once('../../controllers/PlatformController.php');

            $sendData = false;
            $platformCreated = false;

            if(isset($_POST['createBtn'])){
                $sendData = true;
            }

            if($sendData) {
                if(isset($_POST['platformName'])){
                    $platformCreated = storePlatform($_POST['platformName']);
                }
            }

            if($platformCreated) {
            ?>
            <div class="row" style="margin-top:2rem; margin-left: 1rem">
                <div class="alert alert-success" role="alert">
                    La plataforma ha sido creada correctamente.
                </div>
            </div>
            <?php
            } elseif ($sendData) { 
                ?>
                 <div class="row" style="margin-top:2rem; margin-left: 1rem">
                    <div class="alert alert-danger" role="alert">
                      No se ha podido crear la plataforma.
                    </div>
                </div>
                <?php
            }
        ?>

        <div class="col-12" style="margin-top:2rem; margin-left: 1rem">
            <a class="btn btn-outline-primary" style="font-weight: 700; border-width: 3px;" href="../../index.html">Atrás</a>
        </div> 
    </div>
</body>
</html>

