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
                require_once('../../controllers/SerieController.php');
                require_once('../../controllers/PlatformController.php');
                require_once('../../controllers/DirectorController.php');
                require_once('../../controllers/ActorController.php');
                require_once('../../controllers/LanguageController.php');

                $platformList = listAllPlatforms();
                $directorList = listAllDirectors();
                $actorList = listAllActors();
                $languageList = listAllLanguages();


                $idserie = $_GET['id'];
                $serieObject = getSerieData($idserie);
            ?>

        <div class="col-12">
            <h1 style="margin-top:2rem; margin-left: 1rem;">Biblioteca de Series</h1>

            <h3 style="margin-top:2rem; margin-left: 1rem;">Editar serie</h3>
        </div>  

        <div class="col-12" style="margin-top:2rem; margin-left: 1rem;">
            <form name="edit_serie" action="" method="POST">
                
                <div class="mb-3">
                    <label for="serieTitle" class="form-label">Título serie</label>
                    <input id="serieTitle" name="serieTitle" type="text" placeholder="Introduce el título de la serie" class="form-control" require value="<?php if(isset($serieObject)) echo $serieObject->getTitle(); ?>"/>
                </div>

                <div class="mb-3">
                    <label for="seriePlatform" class="form-label">Plataforma</label>
                    <select id="seriePlatform" name="seriePlatform" class="form-select" aria-label="Select platforms">
                        
                        <?php
                            foreach($platformList as $platform)
                            {
                        ?>
                        <option value="<?php echo $platform->getId();?> "><?php echo $platform->getName();?> </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="serieDirector" class="form-label">Director</label>
                    <select id="serieDirector" name="serieDirector" class="form-select" aria-label="Select directors">
                        
                        <?php
                            foreach($directorList as $director)
                            {
                                $nombreDirector = $director->getName().' '.$director->getSurnames();
                        ?>
                        <option value="<?php echo $director->getId();?> "><?php echo $nombreDirector;?> </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="serieActor" class="form-label">Actores</label>
                    <select id="serieActor" name="serieActor" class="form-select" aria-label="Select actores" multiple>
                        
                        <?php
                            foreach($actorList as $actor)
                            {
                                $nombreActor = $actor->getName().' '.$actor->getSurnames();
                        ?>
                        <option value="<?php echo $actor->getId();?> "><?php echo $nombreActor;?> </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="serieLanguageAudio" class="form-label">Idiomas disponibles audio</label>
                    <select id="serieLanguageAudio" name="serieLanguageAudio" class="form-select" aria-label="Select language audio" multiple>
                        
                        <?php
                            foreach($languageList as $language)
                            {
                                $lang = $language->getName().' - '.$language->getIsoCode();
                        ?>
                        <option value="<?php echo $language->getId();?> "><?php echo $lang;?> </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="serieLanguageSubtitles" class="form-label">Idiomas disponibles subtítulos</label>
                    <select id="serieLanguageSubtitles" name="serieLanguageSubtitles" class="form-select" aria-label="Select language subtitles" multiple>
                        
                        <?php
                            foreach($languageList as $language)
                            {
                                $lang = $language->getName().' - '.$language->getIsoCode();
                        ?>
                        <option value="<?php echo $language->getId();?> "><?php echo $lang;?> </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>               
               
                <input type="hidden" name="serieId" value="<?php echo $idserie; ?>"/>
                <button type="submit" value="Editar" class="btn btn-success" name="editBtn" style="float: right;">Editar</button>
            </form>         
        </div>        

       
        <?php
            $sendData = false;
            $serieEdited = false;

            if(isset($_POST['editBtn'])){
                $sendData = true;
            }

            if($sendData) {
                if(isset($_POST['serieTitle']) && isset($_POST['seriePlatform']) && isset($_POST['serieDirector']) && isset($_POST['serieActor']) && isset($_POST['serieLanguageAudio']) && isset($_POST['serieLanguageSubtitles'])){
                    $serieEdited = updateSerie($_POST['serieId'], $_POST['serieTitle'], $_POST['seriePlatform'], $_POST['serieDirector'], $_POST['serieActor'], $_POST['serieLanguageAudio'], $_POST['serieLanguageSubtitles']);
                }
            }

            if($serieEdited) {
            ?>
            <div class="row" style="margin-top:2rem; margin-left: 1rem;">
                <div class="alert alert-success" role="alert">
                    La serie se ha sido editado correctamente.
                </div>
            </div>
            <?php


            } elseif ($sendData) { 
                ?>
                 <div class="row" style="margin-top:2rem; margin-left: 1rem;">
                    <div class="alert alert-danger" role="alert">
                      No se ha podido editar la serie.
                    </div>
                </div>
                <?php
            }
        ?>

        <div class="col-12" style="margin-top:2rem; margin-left: 1rem;">
            <a class="btn btn-outline-primary" style="font-weight: 700; border-width: 3px;" href="javascript:history.back()">Atrás</a>
        </div> 
    </div>
</body>
</html>

