<?php
require_once('../utils/databaseConnection.php');

  class Actor{
    private $id;
    private $nombre;
    private $apellidos;
    private $fechaNacimiento;
    private $nacionalidad;

    public function __construct($idActor, $nombreActor, $apellidosActor, $fechaNacimientoActor, $nacionalidadActor) {
      $this->id = $idActor;
      $this->nombre = $nombreActor;
      $this->apellidos = $apellidosActor;
      $this->fechaNacimiento = $fechaNacimientoActor;
      $this->nacionalidad = $nacionalidadActor;
    }

    public function getId() {
      return $this->id;
    }
    
    public function setId($newId) {
      $this->id = $newId;
    }

    public function getNombre() {
      return $this->nombre;
    }
    
    public function setNombre($newNombre) {
      $this->nombre = $newNombre;
    }

    public function getApellidos() {
      return $this->apellidos;
    }
    
    public function setApellidos($newApellidos) {
      $this->apellidos = $newApellidos;
    }

    public function getFechaNacimiento() {
      return $this->fechaNacimiento;
    }
    
    public function setFechaNacimiento($newFechaNacimiento) {
      $this->fechaNacimiento = $newFechaNacimiento;
    }

    public function getNacionalidad() {
      return $this->nacionalidad;
    }
    
    public function setNacionalidad($newNacionalidad) {
      $this->nacionalidad = $newNacionalidad;
    }

    public static function getAllActors() {
      $mysql = initConnectionDb();
      $query = $mysql->query("SELECT * FROM actores");

      $actorList = [];
  
      foreach($query as $item) {
        $actor = new Actor($item['id'], $item['nombre'], $item['apellidos'], $item['fecha_nacimiento'], $item['nacionalidad']);
        array_push($actorList, $actor);
      }

      $mysql->close();

      return $actorList;
    }
  }
?>