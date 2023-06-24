<?php
     require_once('../../models/Serie.php');

     function listAllSeries()
     {
         $serieList = Serie::getAll();
         $serieObjectArray = [];
 
         foreach($serieList as $serieItem)
         {
             $serieObject = new Serie($serieItem->getId(), $serieItem->getTitle(), $serieItem->getPlatform(), $serieItem->getDirector(), $serieItem->getActorsList(), $serieItem->getAudioLanguagesList(), $serieItem->getSubtitlesLanguagesList());
             array_push($serieObjectArray, $serieObject);
         }
         
         return $serieObjectArray;
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