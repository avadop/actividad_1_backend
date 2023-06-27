<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Crear Director</title>
  <!-- Incluye los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="col-12">
            <h3 style="margin-top:1.5em;">Crear nuevo director</h3>
            <?php
                require_once('../../controllers/DirectorController.php');

                // Verificar si se recibió el formulario
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Verificar si se recibieron los datos del formulario
                    if (isset($_POST['_name']) && isset($_POST['last_name']) && isset($_POST['date_of_birth']) && isset($_POST['nationality'])) {
                        $name = $_POST['_name'];
                        $lastName = $_POST['last_name'];
                        $dateOfBirth = $_POST['date_of_birth'];
                        $nationality = $_POST['nationality'];

                        // Llamar a la función saveDirector() del controlador para guardar el nuevo director
                        saveDirector($name, $lastName, $dateOfBirth, $nationality);

                        // Mostrar el mensaje de éxito en un cuadro verde
                        $message = "Director guardado exitosamente.";
                        echo '<div class="alert alert-success" role="alert" style="margin-top: 1rem;">' . $message . '</div>';
                        header( "refresh:1.5;url=showAll.php" );
                    }
                }
            ?>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="_name" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="_name" name="_name" required>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Apellidos:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">Fecha de nacimiento:</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                </div>
                <div class="mb-3">
                    <label for="nationality" class="form-label">Nacionalidad:</label>
                    <input type="text" class="form-control" id="nationality" name="nationality" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a class="btn btn-secondary" href="../../index.html">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>
