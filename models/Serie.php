<?php
require_once('../../utils/databaseConnection.php');

  class Serie{
    private $id;
    private $title;
    private $platform;
    private $actorsList;
    private $audioLanguagesList;
    private $subtitlesLanguagesList;

    public function __construct($serieId, $serieTitle, $seriePlatform, $serieActorsList, $serieAudioLanguagesList, $serieSubtitlesLanguagesList) {
      $this->id = $serieId;
      $this->title = $serieTitle;
      $this->platform = $seriePlatform;
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
  }
?>