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
                
                require_once('../../controllers/SerieController.php');
                require_once('../../controllers/PlatformController.php');
                require_once('../../controllers/DirectorController.php');
                require_once('../../controllers/ActorController.php');
                require_once('../../controllers/LanguageController.php');

                $platformList = listAllPlatforms();
                $directorList = listAllDirector();
                $actorList = listAllActors();
                $languageList = listAllLanguages();
                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                {
                    if (isset($_POST['serieTitle']) && isset($_POST['seriePlatform']) && isset($_POST['serieDirector'])&& isset($_POST['serieActores'])  && isset($_POST['serieLanguageAudio'])&& isset($_POST['serieLanguageSubtitles'])) {
                        $serieTitle = $_POST['serieTitle'];
                        $seriePlatform = $_POST['seriePlatform'];
                        $serieDirector = $_POST['serieDirector'];
                        $serieActores = $_POST['serieActores'];
                        $serieLanguageAudio = $_POST['serieLanguageAudio'];
                        $serieLanguageSubtitles = $_POST['serieLanguageSubtitles'];

                        saveSeries($serieTitle, $seriePlatform, $serieDirector, $serieActores, $serieLanguageAudio, $serieLanguageSubtitles );

                        $message = "Serie añadida correctamente.";
                        echo '<div class="alert alert-success" role="alert" style="margin-top: 1rem;">' . $message . '</div>';
                        header( "refresh:1.5;url=showAll.php" );
                    }
                } 
                
    ?>

        <div class="col-12">
            <h1 style="margin-top:2rem; margin-left: 1rem;">
                <a class="text-decoration-none" href="../..index.html">
                    <i class="bi bi-collection-play"></i>    
                    Biblioteca de Series
                </a>
             </h1>

            <h3 style="margin-top:2rem; margin-left: 1rem;">
                <i class="bi bi-pencil-fill"></i>
                Añadir nueva Serie
            </h3>
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
                                $nombreDirector = $director->getName().' '.$director->getLastName();
                        ?>
                        <option value="<?php echo $director->getId();?> "><?php echo $nombreDirector;?> </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="serieActor" class="form-label">Actores</label>
                    <div id="serieActores" class="checkbox-list">
                    <?php
                    foreach ($actorList as $actor) {
                                               
                        $nombreActor = $actor->getName() . ' ' . $actor->getSurnames();
                        $isChecked = false;

                        foreach ($actorsBySerieList as $actorBySerie) {
             
                            if ($actorBySerie->getActor() === $actor->getId()) {
                                $isChecked = true;
                                break;
                            }
                        }
                    ?>
                        <div class="checkbox-item">
                            <input type="checkbox" id="actor_<?php echo $actor->getId(); ?>" name="serieActores[]" value="<?php echo $actor->getId(); ?>" <?php if ($isChecked) echo "checked"; ?>>
                            <label for="actor_<?php echo $actor->getId(); ?>"><?php echo $nombreActor; ?></label>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="mb-3">
                    <label for="serieLanguageAudio" class="form-label">Idiomas disponibles audio</label>
                    <select id="serieLanguageAudio" name="serieLanguageAudio" class="form-select" aria-label="Select language audio">
                        
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
                    <select id="serieLanguageSubtitles" name="serieLanguageSubtitles" class="form-select" aria-label="Select language subtitles">
                        
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
                <button type="submit" value="Añadir" class="btn btn-success" name="editBtn" style="float: right;">Añadir</button>
            </form>         
        </div>        

       
        <?php
            
         ?>
           
        

        <div class="col-12" style="margin-top:2rem; margin-left: 1rem;">
            <a class="btn btn-outline-primary" style="font-weight: 700; border-width: 3px;" href="showAll.php">Atrás</a>
        </div> 
    </div>
</body>
</html>