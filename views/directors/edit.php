<!DOCTYPE html>
<html>
<head>
    <title>Editar Director</title>
    <!-- Incluye los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Editar Director</h1>
        <?php
        require_once('../../models/Director.php');
        require_once('../../utils/databaseConnection.php');


    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Obtener el ID del director a editar desde la URL
        $idDirector = $_GET['id'];

        // Obtener el director a editar
        $director = Director::getSingleDirector($idDirector);

        if ($director) {
            ?>
                <form method="POST" action="edit.php">
                <input type="hidden" name="id" value="<?php echo $director->getId(); ?>">
                <label for="_name">Nombre:</label>
                <input type="text" name="_name" value=""><br><br>
                <label for="last_name">Apellidos:</label>
                <input type="text" name="last_name" value=""><br><br>
                <label for="date_of_birth">Fecha de Nacimiento:</label>
                <input type="date" name="date_of_birth" value=""><br><br>
                <label for="nationality">Nacionalidad:</label>
                <input type="text" name="nationality" value=""><br><br>
                <input type="submit" value="Guardar cambios">
                </form>
            <?php
        } else {
            echo "El director que deseas editar no existe.";
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los valores del formulario
        $idDirector = $_POST['id'];
        $name = $_POST['_name'];
        $lastName = $_POST['last_name'];
        $dateOfBirth = $_POST['date_of_birth'];
        $nationality = $_POST['nationality'];

        // Validar los datos del formulario
        if (empty($name) || empty($lastName)) {
            echo "El nombre y los apellidos son obligatorios.";
        } else {
            // Obtener el director a editar
            $director = Director::getSingleDirector($idDirector);
            if ($director) {
                // Actualizar los datos del director
                $director->setName($name);
                $director->setLastName($lastName);
                $director->setDateOfBirth($dateOfBirth);
                $director->setNationality($nationality);

                // Guardar los cambios en la base de datos
                if ($director->editDirector()) {
                    $message = "Director editado exitosamente.";
                    echo '<div class="alert alert-success" role="alert" style="margin-top: 1rem;">' . $message . '</div>';
                    header( "refresh:1.5;url=showAll.php" );
                } else {
                    $message = "No se ha podido editar el director.";
                    echo '<div class="alert alert-danger" role="alert" style="margin-top: 1rem;">' . $message . '</div>';
                    header( "refresh:1.5;url=showAll.php" );
                }
            } else {
                $message = "El director que deseas editar no existe.";
                echo '<div class="alert alert-danger" role="alert" style="margin-top: 1rem;">' . $message . '</div>';
                header( "refresh:1.5;url=showAll.php" );
            }
        }
    } else {
        echo "Acceso no válido.";
    }
    ?>
</body>
</html>


