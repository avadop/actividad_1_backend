<?php
  function initConnectionDb() {
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = 'root';
    $db_db = 'actividad1_backend';

    $mysql = @new mysqli(
      $db_host, $db_user, $db_password, $db_db
    );

    if($mysql->connect_error) {
      die('Error: '.$mysql->connect_error);
    }

    return $mysql;
  }
?>