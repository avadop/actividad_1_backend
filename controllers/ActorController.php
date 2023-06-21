<?php
  require_once('../../models/Actor.php');

  function listAllActors() {
    return Actor::getAllActors();
  }

?>