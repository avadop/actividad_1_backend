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
                Añadir un nuevo idioma
            </h3>
        </div>  

        <div class="col-12" style="margin-top:2rem; margin-left: 1rem">
            <form name="create_language" action="" method="POST">
                <div class="mb-3">
                    <label for="languageName" class="form-label">Nombre Idioma</label>
                    <input id="languageName" name="languageName" type="text" placeholder="Introduce el nombre del idioma" class="form-control" required/>
                </div>
                <div class="mb-3">
                    <label for="languageIsoCode" class="form-label">Código ISO</label>
                    <input id="languageIsoCode" name="languageIsoCode" type="text" placeholder="Introduce el código ISO del idioma" class="form-control" required/>
                </div>

                <button type="submit" value="Crear" class="btn btn-success" name="createBtn" style="float: right;">Crear</button>
            </form>         
        </div>        

        <?php
            require_once('../../controllers/LanguageController.php');

            $sendData = false;
            $languageCreated = false;

            if(isset($_POST['createBtn'])){        
                $sendData = true;
            }

            if($sendData) {          
                if(isset($_POST['languageName']) && isset($_POST['languageIsoCode'])){
                    $languageCreated = storeLanguage($_POST['languageName'], $_POST['languageIsoCode']);
                }
            }

            if($languageCreated) {
            ?>
            <div class="row" style="margin-top:2rem; margin-left: 1rem">
                <div class="alert alert-success" role="alert">
                    El idioma ha sido creado correctamente.
                </div>
            </div>
            <?php
            } elseif ($sendData) { 
                ?>
                 <div class="row" style="margin-top:2rem; margin-left: 1rem">
                    <div class="alert alert-danger" role="alert">
                      No se ha podido crear el idioma.
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

