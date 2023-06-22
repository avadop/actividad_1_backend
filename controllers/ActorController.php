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

?>