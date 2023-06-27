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
            <h1 style="margin-top:2rem; margin-left: 1rem;">Biblioteca de Series</h1>

        <?php
            require_once('../../controllers/LanguageController.php');

            $idLanguage = $_POST['languageId'];
            $languageDeleted = deleteLanguage($idLanguage);

            if($languageDeleted){
            ?>
            <div class="row" style="margin-top:2rem; margin-left: 1rem">
                <div class="alert alert-success" role="alert">
                    El idioma ha sido eliminada correctamente.
                </div>
            </div>
            <?php
            } else { 
                ?>
                 <div class="row" style="margin-top:2rem; margin-left: 1rem">
                    <div class="alert alert-danger" role="alert">
                      No se ha podido eliminar el idioma. <!DOCTYPE html>
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

        <?php
            require_once('../../controllers/LanguageController.php');

            $idLanguage = $_POST['languageId'];
            $languageDeleted = deleteLanguage($idLanguage);

            if($languageDeleted){
            ?>
            <div class="row" style="margin-top:2rem; margin-left: 1rem">
                <div class="alert alert-success" role="alert">
                    El idioma ha sido eliminada correctamente.
                </div>
            </div>
            <?php
            } else { 
                ?>
                 <div class="row" style="margin-top:2rem; margin-left: 1rem">
                    <div class="alert alert-danger" role="alert">
                      No se ha podido eliminar el idioma. Si alguna serie tiene el idioma asociado no se podrá borrar. 
                    </div>
                </div>
                <?php
            }
        ?>
        <div>
        <div class="col-12" style="margin-top: 1em;">
            <a class="btn btn-outline-primary" style="font-weight: 700; border-width: 3px;" href="../../index.html">Atrás</a>
        </div> 
    </div>
</body>
</html>


                    </div>
                </div>
                <?php
            }
        ?>
        <div>
        <div class="col-12" style="margin-top: 1em;">
            <a class="btn btn-outline-primary" style="font-weight: 700; border-width: 3px;" href="../../index.html">Atrás</a>
        </div> 
    </div>
</body>
</html>

