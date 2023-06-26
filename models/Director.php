<?php
  require_once('../../utils/databaseConnection.php');
  class Director{
    private $id;
    private $nombre;
    private $apellidos;
    private $fechaNacimiento;
    private $nacionalidad;

    public function __construct($idDirector, $nombreDirector, $apellidosDirector, $fechaNacimientoDirector, $nacionalidadDirector) {
      $this->id = $idDirector;
      $this->nombre = $nombreDirector;
      $this->apellidos = $apellidosDirector;
      $this->fechaNacimiento = $fechaNacimientoDirector;
      $this->nacionalidad = $nacionalidadDirector;
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

    public static function getAllDirector() {
      $mysql = initConnectionDb();
      $query = $mysql->query("SELECT * FROM directores");

      $directorList = [];
  
      foreach($query as $item) {
        $director = new Director($item['id'], $item['nombre'], $item['apellidos'], $item['fecha_nacimiento'], $item['nacionalidad']);
        array_push($directorList, $director);
      }

      $mysql->close();

      return $directorList;
    }

    public static function deleteDirector($id) {
      $mysql = initConnectionDb();
      $query = $mysql->query("DELETE FROM directores WHERE id=".$id);

      $isSuccess = $query === TRUE;

      $mysql->close();

      return $isSuccess;
    }
    }
?>