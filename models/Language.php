<?php
  require_once('../../utils/databaseConnection.php');
  
  class Language{    
    private $id;
    private $name;
    private $isoCode;

    public function __construct($idLanguage, $nameLanguage, $isoCodeLanguage)
    {
      $this->id = $idLanguage;
      $this->name = $nameLanguage;
      $this->isoCode = $isoCodeLanguage;
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

    public function getIsoCode()
    {
      return $this->isoCode;
    }

    public function setIsoCode($isoCode)
    {
      $this->isoCode = $isoCode;
    }

    
    public function getItem()
    {
      $mysqli = initConnectionDb();
      $query = $mysqli->query( query: "SELECT * FROM languages WHERE id = " . $this->id);

     foreach($query as $item) {
        $itemObject = new Language($item['id'], $item['name'], $item['iso_code']);
        break;
      }
      
      $mysqli->close();
      return $itemObject;
    }

    public static function getAll()
    {
        $mysqli = initConnectionDb();
        
        $query = $mysqli->query( query: 'SELECT * FROM languages');
        $listData = [];
      
        if ($query) {
            while ($row = $query->fetch_assoc()) {           
                $itemObject = new Language($row['id'], $row['name'], $row['iso_code']);             
                array_push($listData, $itemObject);
            }
        }
        
        $mysqli->close();
        return $listData;
    }   

    public function store()
    {
      $languageCreated = false;
      $mysqli = initConnectionDb();

      $insert = $mysqli->query( query: "INSERT INTO languages (`name`, `iso_code`) VALUES ('$this->name', '$this->isoCode')");
     
      if($insert) {
        $languageCreated = true;
      }

      $mysqli->close();
      return $languageCreated;
    }

    public function update()
    {

      $languageEdited = false;
      $mysqli = initConnectionDb();

      $platform = $this->getItem();
      
      if($platform) {
        $update = $mysqli->query( query: "UPDATE languages SET name = '" . $this->name . "', iso_code = '" . $this->isoCode . "'WHERE id=" . $this->id);

        if($update){
          $languageEdited = true;
        }
      }

      $mysqli->close();
      return $languageEdited;
    }

    public function delete()
    {
      $languageDeleted = false;
      $mysqli = initConnectionDb();

      $language = $this->getItem();

      if($language) {
        try{
          $deleted = $mysqli->query( query: "DELETE FROM languages WHERE id=" . $this->id);

          if($deleted){
            $languageDeleted = true;
          }
        } catch (Exception $e) {
          $languageDeleted = false;
        }
      }

      $mysqli->close();
      return $languageDeleted;
    }

  }
?>