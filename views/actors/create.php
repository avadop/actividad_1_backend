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

            <h3 style="margin-top:2rem; margin-left: 1rem">
                <i class="bi bi-plus-square-fill"></i>
                Añadir un nuevo actor
            </h3>
        </div>  

        <div class="col-12" style="margin-top:2rem; margin-left: 1rem;">
            <form name="create_actor" action="" method="POST">
                <div class="mb-3">
                    <label for="actorName" class="form-label">Nombre actor</label>
                    <input id="actorName" name="actorName" type="text" placeholder="Introduce el nombre del actor" class="form-control" required/>
                </div>

                <div class="mb-3">
                    <label for="actorSurname" class="form-label">Apellidos del actor</label>
                    <input id="actorSurname" name="actorSurname" type="text" placeholder="Introduce el o los apellidos del actor" class="form-control" required/>
                </div>

                <div class="mb-3">
                    <label for="actorBirthDate" class="form-label">Fecha de nacimiento del actor</label>
                    <input id="actorBirthDate" name="actorBirthDate" type="date" placeholder="Introduce la fecha de nacimiento del actor" class="form-control"/>
                </div>

                <div class="mb-3">
                    <label for="actorNacionality" class="form-label">Nacionalidad del actor</label>
                    <input id="actorNacionality" name="actorNacionality" type="text" placeholder="Introduce la nacionalidad del actor" class="form-control"/>
                </div>

                <button type="submit" value="Crear" class="btn btn-success" name="createActorBtn" style="float: right; margin-top: 1rem;">Crear</button>
            </form>         
        </div>
        
        <?php
            require_once('../../controllers/ActorController.php');

            $sendData = false;
            $platformCreated = false;

            if(isset($_POST['createActorBtn'])){
                $sendData = true;
            }

            if($sendData) {
                if(isset($_POST['actorName']) && isset($_POST['actorSurname'])){
                    $actorCreated = createActor($_POST['actorName'], $_POST['actorSurname'], $_POST['actorBirthDate'], $_POST['actorNacionality']);
                }

            if($actorCreated) {
            ?>
            <div class="row" style="margin-top:2rem; width: 65rem;">
                <div class="alert alert-success" role="alert">
                    El actor ha sido creada correctamente.
                </div>
            </div>
            <?php
            } else { 
                ?>
                 <div class="row" style="margin-top:2rem; width: 65rem;">
                    <div class="alert alert-danger" role="alert">
                      No se ha podido crear el actor. Compruebe que no exista ya un actor con el mismo nombre y apellido deseado.
                    </div>
                </div>
                <?php
            }
          }
        ?>

        <div class="col-12"style="margin-top:2rem; margin-left: 1rem;">
            <a class="btn btn-outline-primary" style="font-weight: 700; border-width: 3px;" href="javascript:history.back()">Atrás</a>
        </div> 
    </div>
</body>
</html>

