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

            <?php
                require_once('../../controllers/LanguageController.php');

                $idLanguage = $_GET['id'];
                $languageObject = getLanguageData($idLanguage);
            ?>

        <div class="col-12">
            <h1 style="margin-top:2rem; margin-left: 1rem;">
                <a class="text-decoration-none" href="../../index.html">
                    <i class="bi bi-collection-play"></i>    
                    Biblioteca de Series
                </a>
            </h1>

            <h3 style="margin-top:2rem; margin-left: 1rem;">
                <i class="bi bi-table"></i>
                Editar un idioma
            </h3>
        </div>  
        <?php
                if($languageObject) {
            ?>
        <div class="col-12" style="margin-left: 1rem;">
            <form name="edit_idioma" action="" method="POST">
                <div class="mb-3">
                    <label for="languageName" class="form-label">Nombre idioma</label>
                    <input id="languageName" name="languageName" type="text" placeholder="Introduce el nombre del idioma" class="form-control" require value="<?php if(isset($languageObject)) echo $languageObject->getName(); ?>"/>
                </div>
                <div class="mb-3">
                    <label for="languageIsoCode" class="form-label">Código ISO</label>
                    <input id="languageIsoCode" name="languageIsoCode" type="text" placeholder="Introduce el código ISO del idioma" class="form-control" require value="<?php if(isset($languageObject)) echo $languageObject->getIsoCode(); ?>"/>
                </div>
                
                <input type="hidden" name="languageId" value="<?php echo $idLanguage; ?>"/>
                <button type="submit" value="Editar" class="btn btn-success" name="editBtn" style="float: right;">Editar</button>
            </form>       

        <?php
            $sendData = false;
            $languageEdited = false;

            if(isset($_POST['editBtn'])){
                $sendData = true;
            }

            if($sendData) {
                if(isset($_POST['languageName']) && isset($_POST['languageIsoCode'])){
                    $languageEdited = updateLanguage($_POST['languageId'], $_POST['languageName'], $_POST['languageIsoCode']);
                }
            }

            if($languageEdited) {
                header( "refresh:1.5;url=showAll.php" );
            ?>
            <div class="row" style="margin-top:2rem; margin-left: 1rem; width: 65rem;">
                <div class="alert alert-success" role="alert">
                    El idioma ha sido editado correctamente.
                </div>
            </div>
            <?php


            } elseif ($sendData) { 
                ?>
                 <div class="row" style="margin-top:2rem; margin-left: 1rem; width: 65rem;">
                    <div class="alert alert-danger" role="alert">
                      No se ha podido editar el idioma.
                    </div>
                </div>
                <?php
            }
        ?>
         
         </div>
         <?php
                }
                else {
                $message = "El actor que deseas editar no existe.";
                echo '<div class="alert alert-danger" role="alert" style="margin-top: 1rem;">' . $message . '</div>';
            }
        ?>

        <div class="col-12" style="margin-top: 1em; margin-left: 1rem;">
            <a class="btn btn-outline-primary" style="font-weight: 700; border-width: 3px;" href="showAll.php">Atrás</a>
        </div> 
    </div>
</body>
</html>

