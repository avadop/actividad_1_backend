<?php
    require_once('../../models/Platform.php');
   
    function listAllPlatforms()
    {
        $model = new Platform();
        $platformList = $model->getAll();
        $platformObjectArray = [];

        foreach($platformList as $platformItem)
        {
            $platformObject = new Platform($platformItem->getId(), $platformItem->getName());
            array_push($platformObjectArray, $platformObject);
        }
        
        return $platformObjectArray;
    }

   /* function storePlatform($platformName)
    {
        $newPlatform = new Platform(idPlatform: null, $platformName);
        $platformCreated = $newPlatform->store();

        return $platformCreated;
    }*/
?>
