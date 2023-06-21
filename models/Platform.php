<?php

  require_once('../../utils/databaseConnection.php');

  class Platform{
    private $id;
    private $name;

    public function __construct($idPlatform = null, $namePlatform = null)
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

    public function getAll()
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
      $mysqli = $this->initConecctionDb();

      if($resultInsert = $mysql->query( query: "INSERT INTO platforms (name) VALUES (' $this->name ')")) {
        $platformCreated = true;
      }

      $mysqli->close();
      return $platformCreated;
    }
  }
?>