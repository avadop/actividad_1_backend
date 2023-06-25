<?php
     require_once('../../models/Serie.php');

     function listAllSeries()
     {         
        return Serie::getAll();
     }

     function updateSerie($platformId, $platformName)
     {
         $newSerie = new Platform($serieId, $serieTitle, $seriePlatform, $serieActorsList, $serieAudioLanguagesList, $serieSubtitlesLanguagesList);
         $serieCreated = $newSerie->update();
 
         return $serieCreated;
     }

     function getSerieData($idSerie) 
     {
         $serie = new Serie($idSerie, '', '', '', '', '', '');
         $serieObject = $serie->getItem();
 
         return $serieObject;
     }
?>