<?php
    require_once('../../models/Platform.php');
   
    function listAllPlatforms()
    {
        $platformList = Platform::getAll();
        $platformObjectArray = [];

        foreach($platformList as $platformItem)
        {
            $platformObject = new Platform($platformItem->getId(), $platformItem->getName());
            array_push($platformObjectArray, $platformObject);
        }
        
        return $platformObjectArray;
    }

   function storePlatform($platformName)
    {
        $newPlatform = new Platform(null, $platformName);
        $platformCreated = $newPlatform->store();

        return $platformCreated;
    }

    function updatePlatform($platformId, $platformName)
    {
        $newPlatform = new Platform($platformId, $platformName);
        $platformCreated = $newPlatform->update();

        return $platformCreated;
    }

    function getPlatformData($idPlatform) 
    {
        $platform = new Platform($idPlatform, '');
        $platformObject = $platform->getItem();

        return $platformObject;
    }

    function deletePlatform($idPlatform)
    {
        $platform = new Platform($idPlatform, '');
        $platformObject = $platform->delete();

        return $platformObject;
    }
?>
