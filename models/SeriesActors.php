<?php
    require_once('../../utils/databaseConnection.php');

    class SeriesActors {
        private $id;
        private $serie;
        private $actor;
        private $actorName;

        public function __construct($seriesActorsId, $seriesActorsSerie, $seriesActorsActor, $seriesActorsName) {
            $this->id = $seriesActorsId;
            $this->serie = $seriesActorsSerie;
            $this->actor = $seriesActorsActor;
            $this->actorName = $seriesActorsName;
        }

        public function getId() {
            return $this->id;
        }
        
        public function setId($newId) {
            $this->id = $newId;
        }

        public function getSerie() {
            return $this->serie;
        }

        public function setSerie($newSerie) {
            $this->serie = $newSerie;
        }

        public function getActor() {
            return $this->actor;
        }

        public function setActor($newActor) {
            $this->actor = $newActor;
        }

        public function getActorname() {
            return $this->actorName;
        }

        public function setActorName($newActorName) {
            $this->actorName = $newActorName;
        }
    
        public function getItem()
        {
          $mysqli = initConnectionDb();
          $query = $mysqli->query( query: "SELECT * FROM series_actors WHERE id = " . $this->id);
    
         foreach($query as $item) {
            $itemObject = new SeriesActors($item['id'], $item['serie'], $item['actor'], '');
            break;
          }
          
          $mysqli->close();
          return $itemObject;
        }

        public static function getActorsBySerieId($serieId)
        {
            $mysqli = initConnectionDb();
            
            $query = $mysqli->query( query: "SELECT sa.id, s.id as id_serie, a.id as id_actor, CONCAT(a.name, ' ', a.surnames) as actor from series_actors sa INNER JOIN series s on s.id=sa.serie INNER JOIN actors a on a.id=sa.actor where sa.serie=" . $serieId);
            $listData = [];
        
            if ($query) {
                while ($row = $query->fetch_assoc()) {  
                    
                    $itemObject = new SeriesActors($row['id'], $row['id_serie'], $row['id_actor'], $row['actor']);             
                    array_push($listData, $itemObject);
                }
            }
            
            $mysqli->close();
            return $listData;
        } 

        public function store()
        {
    
          $serieActorCreated = false;
          $mysqli = initConnectionDb();
    
          if($resultInsert = $mysqli->query( query: "INSERT INTO series_actors (serie, actor) VALUES (' $this->serie ', ' $this->actor ')")) {
            $serieActorCreated = true;
          }
    
          $mysqli->close();
          return $serieActorCreated;
        }

        public function update()
        {
    
          $serieActorEdited = false;
          $mysqli = initConnectionDb();
    
          $platform = $this->getItem();
          
          if($platform) {
            $update = $mysqli->query( query: "UPDATE series_actors SET serie = '" . $this->serie . "' actor = '" . $this->actor . "' WHERE id=" . $this->id);
    
            if($update){
              $serieActorEdited = true;
            }
          }
    
          $mysqli->close();
          return $serieActorEdited;
        }

        public function delete()
        {
          $serieActorDeleted = false;
          $mysqli = initConnectionDb();
    
          $serieActor = $this->getItem();
    
          if($serieActor) {
            $deleted = $mysqli->query( query: "DELETE FROM series_actors WHERE id=" . $this->id);
    
            if($deleted){
              $serieActorDeleted = true;
            }
          }
    
          $mysqli->close();
          return $serieActorDeleted;
        }
    }
?>