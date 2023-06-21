<?php
  require_once('../models/Actor.php');

  function listActors() {
    return Actor::getAllActors();
  }

?>