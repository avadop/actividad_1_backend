<?php
require_once('../../models/Director.php');
require_once('../../utils/databaseConnection.php');

function listAllDirector() {
    $directorList = Director::getAllDirector();

    foreach($directorList as $director) {
        if($director->getFechaNacimiento()){
            $director->setFechaNacimiento(date_format(date_create($director->getFechaNacimiento()), 'd/m/Y'));
        }
    }
  
    return $directorList;
}

function deleteDirector($id) {
    return Director::deleteDirector($id);
}

function saveDirector($nombre, $apellidos, $fechaNacimiento, $nacionalidad) {
    $mysql = initConnectionDb();

    // Escapar los valores para evitar inyección de SQL
    $nombre = $mysql->real_escape_string($nombre);
    $apellidos = $mysql->real_escape_string($apellidos);
    $fechaNacimiento = $mysql->real_escape_string($fechaNacimiento);
    $nacionalidad = $mysql->real_escape_string($nacionalidad);

    // Construir y ejecutar la consulta INSERT
    $query = "INSERT INTO directores (nombre, apellidos, fecha_nacimiento, nacionalidad) VALUES ('$nombre', '$apellidos', '$fechaNacimiento', '$nacionalidad')";
    $result = $mysql->query($query);

    if ($result) {
        // El director se guardó correctamente
        echo "Director guardado exitosamente.";
    } else {
        // Ocurrió un error al guardar el director
        echo "Error al guardar el director: " . $mysql->error;
    }

    $mysql->close();
}
?>

    


    
?>