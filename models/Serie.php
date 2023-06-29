<?php
require_once('../../utils/databaseConnection.php');

  class Serie{
    private $id;
    private $title;
    private $platform;
    private $director;
    private $actorsList;
    private $audioLanguagesList;
    private $subtitlesLanguagesList;

    public function __construct($serieId, $serieTitle, $seriePlatform, $serieDirector, $serieActorsList, $serieAudioLanguagesList, $serieSubtitlesLanguagesList) {
      $this->id = $serieId;
      $this->title = $serieTitle;
      $this->platform = $seriePlatform;
      $this->director = $serieDirector;
      $this->actorsList = $serieActorsList;
      $this->audioLanguagesList = $serieAudioLanguagesList;
      $this->subtitlesLanguagesList = $serieSubtitlesLanguagesList;
    }

    public function getId() {
      return $this->id;
    }
    
    public function setId($newId) {
      $this->id = $newId;
    }

    public function getTitle() {
      return $this->title;
    }
    
    public function setTitle($newTitle) {
      $this->title = $newTitle;
    }

    public function getPlatform() {
      return $this->platform;
    }
    
    public function setPlatform($newPlatform) {
      $this->platform = $newPlatform;
    }
    
    public function getDirector() {
      return $this->director;
    }
    
    public function setDirector($newDirector) {
      $this->director = $newDirector;
    }

    public function getActorsList() {
      return $this->actorsList;
    }
    
    public function setActorsList($newActorsList) {
      $this->actorsList = $newActorsList;
    }

    public function getAudioLanguagesList() {
      return $this->audioLanguagesList;
    }
    
    public function setAudioLanguagesList($newAudioLanguagesList) {
      $this->audioLanguagesList = $newAudioLanguagesList;
    }

    public function getSubtitlesLanguagesList() {
      return $this->subtitlesLanguagesList;
    }
    
    public function setSubtitlesLanguagesList($newSubtitlesLanguagesList) {
      $this->subtitlesLanguagesList = $newSubtitlesLanguagesList;
    }
	
	public static function getSerieId($serieTitle, $seriePlatform, $serieDirector, $serieAudioLanguagesList, $serieSubtitlesLanguagesList) {
		$mysqli = initConnectionDb();
		$query = $mysqli->query(query: "SELECT id FROM series WHERE title = '$serieTitle' and platform = '$seriePlatform' and director = '$serieDirector' and audio_language = '$serieAudioLanguagesList' and subtitles_language = '$serieSubtitlesLanguagesList'");
		
		 if ($query && $query->num_rows > 0) {
			$row = $query->fetch_assoc();
			$serieId = $row['id'];
			return $serieId;
		}
    
		return false;
	}


    public function getItem()
    {
      $mysqli = initConnectionDb();
      $query = $mysqli->query("SELECT * FROM series WHERE id = " . $this->id);


     foreach($query as $item) {
        $itemObject = new Serie($item['id'], $item['title'], $item['platform'], $item['director'], '', $item['audio_language'], $item['subtitles_language']);
        break;
      }
      
      $mysqli->close();
      return $itemObject;
    }

    public static function getAll()
    {
        $mysqli = initConnectionDb();
        
        $query = $mysqli->query( query: "SELECT DISTINCT s.id as id, s.title as titulo, p.name as plataforma, CONCAT(d._name,' ', d.last_name) as director, '' as actor, la.name as idioma_audio, ls.name as idioma_subtitulos from series s INNER JOIN platforms p on p.id=s.platform INNER JOIN directors d on d.id=s.director INNER JOIN languages la on la.id=s.audio_language INNER JOIN languages ls on ls.id=s.subtitles_language;");
        $listData = [];
      
        if ($query) {
            while ($row = $query->fetch_assoc()) {           
                $itemObject = new Serie($row['id'], $row['titulo'], $row['plataforma'], $row['director'], $row['actor'], $row['idioma_audio'], $row['idioma_subtitulos']);
                array_push($listData, $itemObject);
            }
        }
        
        $mysqli->close();
        return $listData;
    }   

    public function update()
    {

      $serieEdited = false;
      $mysqli = initConnectionDb();

      $serie = $this->getItem();
      
      if($serie) {
        $update = $mysqli->query("UPDATE series SET title = '" . $this->title . "', platform = '" . $this->platform . "', director = '" . $this->director . "', actors = '" . $this->actors . "', audio_language = '" . $this->audio_language . "', subtitles_language = '" . $this->subtitles_language . "' WHERE id=" . $this->id);

        if($update){
          $serieEdited = true;
        }
      }

      $mysqli->close();
      return $serieEdited;
    }

    public static function deleteSerie($id) {
      $mysql = initConnectionDb();
      $query = $mysql->query("DELETE FROM series WHERE id=".$id);

      $isSuccess = $query === TRUE;

      $mysql->close();

      return $isSuccess;
    }
    public static function saveSeries($serieTitle, $seriePlatform, $serieDirector, $serieActorsList, $serieAudioLanguagesList, $serieSubtitlesLanguagesList)
    {
      $serieCreated = false;
  
      $mysqli = initConnectionDb();

      $query = "INSERT INTO series (title, platform, director, audio_language, subtitles_language ) VALUES ('$serieTitle', '$seriePlatform', '$serieDirector', '$serieAudioLanguagesList','$serieSubtitlesLanguagesList')";

      if($mysqli->query($query)) {
        $serieCreated = true;
      }

      $mysqli->close();
  
      return $serieCreated;
    }
  }
?>