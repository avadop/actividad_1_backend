<?php
require_once('../../utils/databaseConnection.php');
class Director{
    private $id;
    private $name;
    private $lastName;
    private $dateOfBirth;
    private $nationality;

    public function __construct($directorId, $directorName, $directorLastName, $directorDateOfBirth, $directorNationality) {
        $this->id = $directorId;
        $this->name = $directorName;
        $this->lastName = $directorLastName;
        $this->dateOfBirth = $directorDateOfBirth;
        $this->nationality = $directorNationality;
    }

    public function getId() {
        return $this->id;
    }
    
    public function setId($newId) {
        $this->id = $newId;
    }

    public function getName() {
        return $this->name;
    }
    
    public function setName($newName) {
        $this->name = $newName;
    }

    public function getLastName() {
        return $this->lastName;
    }
    
    public function setLastName($newLastName) {
        $this->lastName = $newLastName;
    }

    public function getDateOfBirth() {
        return $this->dateOfBirth;
    }
    
    public function setDateOfBirth($newDateOfBirth) {
        $this->dateOfBirth = $newDateOfBirth;
    }

    public function getNationality() {
        return $this->nationality;
    }
    
    public function setNationality($newNationality) {
        $this->nationality = $newNationality;
    }

    public static function getAllDirector() {
        $mysql = initConnectionDb();
        $query = $mysql->query("SELECT * FROM directors");

        $directorList = [];

        foreach($query as $item) {
            $director = new Director($item['id'], $item['_name'], $item['last_name'], $item['date_of_birth'], $item['nationality']);
            array_push($directorList, $director);
        }

        $mysql->close();

        return $directorList;
    }

    public static function deleteDirector($id) {
        $mysql = initConnectionDb();

        $isSuccess = false;
        // Nos aseguramos de que el actor existe para intentar borrar
      if(Director:: getSingleDirector($id)){
        //Hacemos try catch, en caso de que se quiera borrar y tenga una serie asociada, salta una excepción.
        try { 
            $query = $mysql->query("DELETE FROM directors WHERE id=".$id);

          $isSuccess = $query === TRUE;
        }
        catch (Exception $e) {
          $isSuccess = false;
        }
      }

        $mysql->close();

        return $isSuccess;
    }

    public static function getSingleDirector($directorId) {
        $director = null;
        $mysql = initConnectionDb();

        $query = $mysql->query("SELECT * FROM directors WHERE id=".$directorId);

        foreach($query as $item) {
            $director = new Director($item['id'], $item['_name'], $item['last_name'], $item['date_of_birth'], $item['nationality']);
            break;
        }

        $mysql->close();

        return $director;
    }

    public function editDirector() {
        $isSuccess = false;

        // Check if an object with that id exists
        if (Director::getSingleDirector($this->id)) {
            $mysql = initConnectionDb();
            $dateOfBirthCheck = $this->dateOfBirth ? "'$this->dateOfBirth'" : 'NULL';
            $nationalityCheck = $this->nationality ? "'$this->nationality'" : 'NULL';

            $query = "UPDATE directors SET _name='$this->name', last_name='$this->lastName', date_of_birth=$dateOfBirthCheck, nationality=$nationalityCheck WHERE id=$this->id";
            $queryResult = $mysql->query($query);

            $isSuccess = $queryResult === TRUE;
            $mysql->close();
        }


        return $isSuccess;
    }

    private function directorAlreadyExists() {
        $mysql = initConnectionDb();

        $query = "SELECT * FROM directors WHERE _name='$this->name' AND last_name='$this->lastName';";
        $queryResult = $mysql->query($query);

        $totalElements = mysqli_num_rows($queryResult);

        $mysql->close();

        return $totalElements > 0;
    }

    public function createDirector() {
        $mysql = initConnectionDb();
        $isSuccess = false;

        // If there is no director with that name and last name yet, create it
        if (!$this->directorAlreadyExists()) {
            $dateOfBirthCheck = $this->dateOfBirth ? "'$this->dateOfBirth'" : 'NULL';
            $nationalityCheck = $this->nationality ? "'$this->nationality'" : 'NULL';

            $query = "INSERT INTO directors (_name, last_name, date_of_birth, nationality) VALUES ('$this->name', '$this->lastName', $dateOfBirthCheck, $nationalityCheck);";
            $queryResult = $mysql->query($query);

            $isSuccess = $queryResult === TRUE;
        }

        $mysql->close();

        return $isSuccess;
    }
}
?>
