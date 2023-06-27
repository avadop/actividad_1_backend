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
            <?php
                require_once('../../controllers/DirectorController.php');

                $idDirector = $_GET['id'];
                $directorObject = getDirectorById($idDirector);
            ?>

            <h1 style="margin-top:2rem; margin-left: 1rem;">
                <a class="text-decoration-none" href="../../index.html">
                    <i class="bi bi-collection-play"></i>    
                    Biblioteca de Series
                </a>
            </h1>

            <h3 style="margin-top:2rem; margin-left: 1rem;">
                <i class="bi bi-table"></i>
                Editar un director
            </h3>
        </div>  
        <?php
                if($directorObject) {
            ?>
        <div class="col-12" style="margin-top:2rem; margin-left: 1rem;">
            
            <form name="edit_director" action="" method="POST">
                <div class="mb-3">
                    <label for="directorName" class="form-label">Nombre director</label>
                    <input id="directorName" name="directorName" type="text" placeholder="Introduce el nombre del director" class="form-control" required value="<?php 
                      if(isset($directorObject)) echo $directorObject->getName();
                    ?>"/>
                </div>

                <div class="mb-3">
                    <label for="directorLastName" class="form-label">Apellidos del director</label>
                    <input id="directorLastName" name="directorLastName" type="text" placeholder="Introduce el o los apellidos del director" class="form-control" required value="<?php 
                      if(isset($directorObject)) echo $directorObject->getLastName();
                    ?>"/>
                </div>

                <div class="mb-3">
                    <label for="directorBirthDate" class="form-label">Fecha de nacimiento del director</label>
                    <input id="directorBirthDate" name="directorBirthDate" type="date" placeholder="Introduce la fecha de nacimiento del director" class="form-control" value="<?php 
                      if(isset($directorObject)) echo $directorObject->getDateOfBirth();
                    ?>"/>
                </div>

                <div class="mb-3">
                    <label for="directorNacionality" class="form-label">Nacionalidad del director</label>
                    <input id="directorNacionality" name="directorNacionality" type="text" placeholder="Introduce la nacionalidad del director" class="form-control" value="<?php 
                      if(isset($directorObject)) echo $directorObject->getNationality();
                    ?>"/>
                </div>

                <button type="submit" value="Editar" class="btn btn-success" name="editDirectorBtn" style="float: right; margin-top: 1rem;">Editar</button>
            </form>        
        
        <?php
            require_once('../../controllers/DirectorController.php');

            $sendData = false;
            $platformCreated = false;

            if(isset($_POST['editDirectorBtn'])){
                $sendData = true;
            }

            if($sendData) {
                if(isset($_POST['directorName']) && isset($_POST['directorLastName'])){
                    $directorEdited = editDirector($directorObject->getId(), $_POST['directorName'], $_POST['directorLastName'], $_POST['directorBirthDate'], $_POST['directorNacionality']);
                }

            if($directorEdited) {
              header( "refresh:1.5;url=showAll.php" );
            ?>
            <div class="row" style="margin-top:2rem; width: 65rem;">
                <div class="alert alert-success" role="alert">
                    El director ha sido editado correctamente.
                </div>
            </div>
            <?php
            } else { 
                ?>
                 <div class="row" style="margin-top:2rem; width: 65rem;">
                    <div class="alert alert-danger" role="alert">
                      No se ha podido editar el director. Compruebe que el director que desee editar exista ya.
                    </div>
                </div>
                <?php
            }
          }
        ?>
         
         </div>
         <?php
                }
                else {
                $message = "El director que deseas editar no existe.";
                echo '<div class="alert alert-danger" role="alert" style="margin-top: 1rem;">' . $message . '</div>';
            }
        ?>

        <div class="col-12" style="margin-top:2rem; margin-left: 1rem;">
            <a class="btn btn-outline-primary" style="font-weight: 700; border-width: 3px;" href="showAll.php">Atrás</a>
        </div> 
    </div>
</body>
</html>

