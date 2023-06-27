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
    return Director::saveDirector($name, $lastName, $dateOfBirth, $nationality);
}

function getDirectorById($idDirector) {
    return Director::getSingleDirector($idDirector);
  }


  
?>

    


    