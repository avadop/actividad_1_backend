<?php
  require_once('../../models/Actor.php');

  function listAllActors() {
    $actorsList = Actor::getAllActors();
    
    foreach($actorsList as $actor) {
      if($actor->getFechaNacimiento()){
        $actor->setFechaNacimiento(date_format(date_create($actor->getFechaNacimiento()), 'd/m/Y'));
      }
    }

    return $actorsList;
  }

  function deleteActor($id) {
    return Actor::deleteActor($id);
  }

?>