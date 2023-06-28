<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Crear Director</title>
  <!-- Incluye los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  
  <!-- Bootstrap Font Icon CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- Incluye los scripts de Bootstrap y tu código JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="col-12">
        <h1 style="margin-top:2rem; margin-left: 1rem;">
              <a class="text-decoration-none" href="../../index.html">
                    <i class="bi bi-collection-play"></i>    
                    Biblioteca de Series
                </a>
            </h1>

            <h3 style="margin-top:2rem; margin-left: 1rem;">
                <i class="bi bi-table"></i>
                Listado de todos los directores
            </h3>
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
                        $creationSuccess = saveDirector($name, $lastName, $dateOfBirth, $nationality);

                        // Mostrar el mensaje de éxito en un cuadro verde
                        if($creationSuccess){
                            $message = "Director guardado exitosamente.";
                            echo '<div class="alert alert-success" role="alert" style="margin-top: 1rem;">' . $message . '</div>';
                        }
                        else {
                            $message = "Hubo algún problema al crear el director, compruebe que no existe otro director con el mismo nombre y apellido";
                            echo '<div class="alert alert-danger" role="alert" style="margin-top: 1rem;">' . $message . '</div>';
                        }
                    }
                }
            ?>
            <form action="" method="POST" style="margin-left: 1rem;">
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
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" >
                </div>
                <div class="mb-3">
                    <label for="nationality" class="form-label">Nacionalidad:</label>
                    <input type="text" class="form-control" id="nationality" name="nationality" >
                </div>
                <button type="submit" value="Crear" class="btn btn-success" name="createDirectorBtn" style="float: right; margin-top: 1rem;">Crear</button>
            </form>
        </div>
        <div class="col-12" style="margin-top:2rem; margin-left: 1rem">
            <a class="btn btn-outline-primary" style="font-weight: 700; border-width: 3px;" href="javascript:history.back()">Atrás</a>
        </div> 
    </div>
</body>
</html>
