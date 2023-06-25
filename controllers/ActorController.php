<?php
  require_once('../../models/Actor.php');

  function listAllActors() {
    $actorsList = Actor::getAllActors();
    
    foreach($actorsList as $actor) {
      $birthDate = $actor->getBirthDate();
      if($birthDate){
        $actor->setBirthDate(date_format(date_create($birthDate), 'd/m/Y'));
      }
    }

    return $actorsList;
  }

  function deleteActor($id) {
    return Actor::deleteActor($id);
  }

  function createActor($name, $surnames, $date, $nacionality) {
    $createSuccess = false;

    if($name && $surnames) {
      $newActor = new Actor(null,$name, $surnames, $date, $nacionality);
      $createSuccess = $newActor->createActor();
    }

    return $createSuccess;
  }

?>