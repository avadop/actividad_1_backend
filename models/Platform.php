<?php

  require_once('../../utils/databaseConnection.php');

  class Platform{
    private $id;
    private $name;

    public function __construct($idPlatform, $namePlatform)
    {
      $this->id = $idPlatform;
      $this->name = $namePlatform;
    }
    
    public function getId()
    {
      return $this->id;
    }

    public function setId($id)
    {
      $this->id = $id;
    }

    public function getName()
    {
      return $this->name;
    }

    public function setName($name)
    {
      $this->name = $name;
    }

    public function getItem()
    {
      $itemObject = null;
      $mysqli = initConnectionDb();
      $query = $mysqli->query( query: "SELECT * FROM platforms WHERE id = " . $this->id);

     foreach($query as $item) {
        $itemObject = new Platform($item['id'], $item['name']);
        break;
      }
      
      $mysqli->close();
      return $itemObject;
    }

    public static function getAll()
    {
        $mysqli = initConnectionDb();
        
        $query = $mysqli->query( query: 'SELECT * FROM platforms');
        $listData = [];
      
        if ($query) {
            while ($row = $query->fetch_assoc()) {           
                $itemObject = new Platform($row['id'], $row['name']);             
                array_push($listData, $itemObject);
            }
        }
        
        $mysqli->close();

        return $listData;
    }   

    public function store()
    {

      $platformCreated = false;
      // Si no hay una plataforma todavía con ese nombre y apellido, lo crea
      if(!$this->platformAlreadyExists()) {
        $mysqli = initConnectionDb();

        if($mysqli->query( query: "INSERT INTO platforms (name) VALUES (' $this->name ')")) {
          $platformCreated = true;
        }

        $mysqli->close();
      }
      return $platformCreated;
    }

    public function update()
    {

      $platformEdited = false;
      $mysqli = initConnectionDb();

      $platform = $this->getItem();
      
      if($platform) {
        $update = $mysqli->query( query: "UPDATE platforms SET name = '" . $this->name . "' WHERE id=" . $this->id);

        if($update){
          $platformEdited = true;
        }
      }

      $mysqli->close();
      return $platformEdited;
    }

    public function delete()
    {
      $platformDeleted = false;
      $mysqli = initConnectionDb();

      $platform = $this->getItem();

      if($platform) {
        try {
          $deleted = $mysqli->query( query: "DELETE FROM platforms WHERE id=" . $this->id);

          if($deleted){
            $platformDeleted = true;
          }
        }
        catch (Exception $e) {
          $platformDeleted = false;
        }
      }

      $mysqli->close();
      return $platformDeleted;
    }

    private function platformAlreadyExists() {
      $mysql = initConnectionDb();

      $query = "SELECT * FROM platforms WHERE name='$this->name';";
      $queryResult = $mysql->query($query);

      $totalElements = mysqli_num_rows( $queryResult);

      $mysql->close();

      return $totalElements > 0;
    }
  }
?>