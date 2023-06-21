<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Biblioteca de Series</title>
  <!-- Incluye los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  
  <!-- Incluye los scripts de Bootstrap y tu código JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="col-12">
            <?php
                require_once('../../controllers/PlatformController.php');

                $platformList = listAllPlatforms();

                if(count($platformList) > 0) {
            ?>
            <h3 style="margin-top:1.5em;">>Listado de todas las plataformas</h3>
            <table class="table" style="margin-top:2rem;">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php
                        foreach($platformList as $platform)
                        {
                    ?>
                    <tr>
                        <td><?php echo $platform->getId();?> </td>
                        <td><?php echo $platform->getName();?> </td>
                        <td>
                            <div class="btn-group" role="group"`aria-label="Basic example">
                                <a class="btn btn-success" href="edit.php?id=<?php echo $platform->getId();?>">Editar</a>
                                <form name="delete_platform" action="delete.php" method="POST">
                                    <input type="hidden"  name="platformId" value="<?php echo $platform->getId();?>" />
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <div>
                <a class="btn btn-primary" href="../../index.html">Atrás</a>
            </div>              

            <?php
                } else {
            ?>

            <div class="alert alert-warning" role="alert">
                Aún no existen plataformas.
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>


