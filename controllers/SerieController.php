<?php
     require_once('../../models/Serie.php');

     function listAllSeries()
     {         
        return Serie::getAll();
     }

     function updateSerie($serieId, $serieTitle, $seriePlatform, $seriesDirector, $serieActorsList, $serieAudioLanguagesList, $serieSubtitlesLanguagesList)
     {
         $newSerie = new Serie($serieId, $serieTitle, $seriePlatform, $seriesDirector, $serieActorsList, $serieAudioLanguagesList, $serieSubtitlesLanguagesList);
         $serieCreated = $newSerie->update();
 
         return $serieCreated;
     }

     function getSerieData($idSerie) 
     {
         $serie = new Serie($idSerie, '', '', '', '', '', '', '');
         $serieObject = $serie->getItem();
 
         return $serieObject;
     }

     function deleteSerie($id) {
        return Serie::deleteSerie($id);
    }
?>