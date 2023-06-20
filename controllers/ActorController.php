<?php
  require_once('../models/Actor.php');
  require_once('../utils/databaseConnection.php');

  print('holi');


  function getAllActors() {
    $mysql = initConnectionDb();
    $query = $mysql->query("SELECT * FROM actores");

    foreach($query as $item) {
      print('ITEM'.$item['nombre'].' '.$item['apellidos']);
    }
  }

  getAllActors();

?>