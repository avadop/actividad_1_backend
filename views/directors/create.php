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
                    if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['fechaNacimiento']) && isset($_POST['nacionalidad'])) {
                        $nombre = $_POST['nombre'];
                        $apellidos = $_POST['apellidos'];
                        $fechaNacimiento = $_POST['fechaNacimiento'];
                        $nacionalidad = $_POST['nacionalidad'];

                        // Llamar a la función saveDirector() del controlador para guardar el nuevo director
                        saveDirector($nombre, $apellidos, $fechaNacimiento, $nacionalidad);

                        // Mostrar el mensaje de éxito en un cuadro verde
                        $message = "Director guardado exitosamente.";
                        echo '<div class="alert alert-success" role="alert" style="margin-top: 1rem;">' . $message . '</div>';
                    }
                }
            ?>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos:</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                </div>
                <div class="mb-3">
                    <label for="fechaNacimiento" class="form-label">Fecha de nacimiento:</label>
                    <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
                </div>
                <div class="mb-3">
                    <label for="nacionalidad" class="form-label">Nacionalidad:</label>
                    <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a class="btn btn-secondary" href="../../index.html">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>
