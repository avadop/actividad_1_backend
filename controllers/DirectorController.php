<?php
require_once('../../models/Director.php');

function listAllDirector() {
    $directorList = Director::getAllDirector();

    foreach($directorList as $director) {
        if($director->getDateOfBirth()){
            $director->setDateOfBirth(date_format(date_create($director->getDateOfBirth()), 'd/m/Y'));
        }
    }
  
    return $directorList;
}

function deleteDirector($id) {
    return Director::deleteDirector($id);
}

function saveDirector($name, $lastName, $dateOfBirth, $nationality) {
    $creationSuccess = false;

    // Comprobamos que al menos tenga los campos obligatorios
    if($name && $lastName){
        $newDirector = new Director(null,$name, $lastName, $dateOfBirth, $nationality);
        $creationSuccess = $newDirector->createDirector();
    }
    return $creationSuccess;
}

function getDirectorById($idDirector) {
    return Director::getSingleDirector($idDirector);
  }

  function editDirector($id,$name, $lastName, $birthDate, $nacionality){
    $editSuccess = false;

    if($name && $lastName) {
      $newActor = new Director($id,$name, $lastName, $birthDate, $nacionality);
      $editSuccess = $newActor->editDirector();
    }

    return $editSuccess;
  }
  
?>

    


    