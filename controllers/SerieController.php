<?php
     require_once('../../models/Serie.php');
	 require_once('SeriesActorsController.php');

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
		 // Eliminar los registros relacionados en la tabla series_actors
		$seriesActorsList = listActorsBySerie($id);
		foreach ($seriesActorsList as $seriesActor) {
			deleteSerieActor($seriesActor->getId());
		}
		 
        return Serie::deleteSerie($id);
    }
    function saveSeries($serieTitle, $seriePlatform, $serieDirector, $serieActorsList, $serieAudioLanguagesList, $serieSubtitlesLanguagesList) {		
        $serieCreated = Serie::saveSeries($serieTitle, $seriePlatform, $serieDirector, $serieActorsList, $serieAudioLanguagesList, $serieSubtitlesLanguagesList);
		
		if($serieCreated) {
			// Insertar los registros relacionados en la tabla series_actors
			$serieId = Serie::getSerieId($serieTitle, $seriePlatform, $serieDirector, $serieAudioLanguagesList, $serieSubtitlesLanguagesList);
			
			if($serieId !== false) {
				foreach($serieActorsList as $serieActor) {
					storeSerieActor($serieId, $seriesActor->getId());
				}
			}
		}
		
		return $serieCreated;
    }
?>