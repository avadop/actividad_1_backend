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

            <?php
                require_once('../../controllers/PlatformController.php');

                $idPlatform = $_GET['id'];
                $platformObject = getPlatformData($idPlatform, '');
            ?>

        <div class="col-12">
            <h1 style="margin-top:2rem; margin-left: 1rem;">Biblioteca de Series</h1>

            <h3 style="margin-top:1.5em;">Editar plataforma</h3>
        </div>  

        <div class="col-12">
            <form name="edit_platform" action="" method="POST">
                <div class="mb-3">
                    <label for="platformName" class="form-label">Nombre plataforma</label>
                    <input id="platformName" name="platformName" type="text" placeholder="Introduce el nombre de la plataforma" class="form-control" require value="<?php if(isset($platformObject)) echo $platformObject->getName(); ?>"/>
                    <input type="hidden" name="platformId" value="<?php echo $idPlatform; ?>"/>
                </div>

                <button type="submit" value="Editar" class="btn btn-success" name="editBtn" style="float: right;">Editar</button>
            </form>         
        </div>        

       
        <?php
            $sendData = false;
            $platformEdited = false;

            if(isset($_POST['editBtn'])){
                $sendData = true;
            }

            if($sendData) {
                if(isset($_POST['platformName'])){
                    $platformEdited = updatePlatform($_POST['platformId'], $_POST['platformName']);
                }
            }

            if($platformEdited) {
            ?>
            <div class="row">
                <div class="alert alert-success" role="alert">
                    La plataforma ha sido editada correctamente.
                </div>
            </div>
            <?php


            } elseif ($sendData) { 
                ?>
                 <div class="row">
                    <div class="alert alert-danger" role="alert">
                      No se ha podido editar la plataforma.
                    </div>
                </div>
                <?php
            }
        ?>

        <div class="col-12" style="margin-top: 1em;">
            <a class="btn btn-outline-primary" style="font-weight: 700; border-width: 3px;" href="javascript:history.back()">Atrás</a>
        </div> 
    </div>
</body>
</html>

