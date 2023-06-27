<?php
    require_once('../../models/SeriesActors.php');

    function listActorsBySerie($serieId)
    {
        $seriesActorsList = SeriesActors::getActorsBySerieId($serieId);
        $seriesActorsObjectArray = [];

        foreach($seriesActorsList as $seriesActorsItem)
        {
        $seriesActorsObject = new SeriesActors($seriesActorsItem->getId(), $seriesActorsItem->getSerie(), $seriesActorsItem->getActor(), $seriesActorsItem->getActorName());
        array_push($seriesActorsObjectArray, $seriesActorsObject);
        }

        return $seriesActorsObjectArray;
    }

    function storeSerieActor($serieId, $actorId)
    {
        $newSerieActor = new SeriesActors(null, $serieId, $actorId, null);
        $serieActorCreated = $newSerieActor->store();

        return $serieActorCreated;
    }

    function updateSerieActor($serieId, $actorId)
    {
        $newSerieActor = new SeriesActors(null, $serieId, $actorId, null);
        $serieActorCreated = $newSerieActor->update();

        return $serieActorCreated;
    }

    function deleteSerieActor($idSerieActor)
    {
        $serieActor = new SeriesActors($idSerieActor, '', '', '');
        $serieActorObject = $serieActor->delete();

        return $serieActorObject;
    }

?>