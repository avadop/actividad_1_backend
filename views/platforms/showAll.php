<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Biblioteca de Series</title>
  <!-- Incluye los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- Bootstrap Font Icon CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- Incluye los scripts de Bootstrap y tu código JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .delete-button {background:none; border: none; color: white; padding: 0;}
  </style>
</head>
<body>
    <div class="container">
        <div class="col-12">
            <?php
                require_once('../../controllers/PlatformController.php');

                $platformList = listAllPlatforms();

                if(count($platformList) > 0) {
            ?>
            <h1 style="margin-top:2rem; margin-left: 1rem;">
              <a class="text-decoration-none" href="../../index.html">
                    <i class="bi bi-collection-play"></i>    
                    Biblioteca de Series
                </a>
            </h1>

            <h3 style="margin-top:2rem; margin-left: 1rem;">
                <i class="bi bi-table"></i>
                Listado de todas las plataformas
            </h3>

            <a class="btn btn-primary"style="margin-top:2rem; margin-left: 1rem;" href="./create.php">Añadir nueva plataforma</a>

            <table class="table text-center " style="margin-top:2rem; margin-left: 1rem;">
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

                                <form name="delete_platform" action="delete.php" method="POST" class="btn btn-danger">
                                    <input type="hidden"  name="platformId" value="<?php echo $platform->getId();?>" />
                                    <button type="submit" class="delete-button">Borrar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <div class="col-12" style="margin-top:2rem; margin-left: 1rem">
                <a class="btn btn-outline-primary" style="font-weight: 700; border-width: 3px;" href="../../index.html">Atrás</a>
            </div>              

            <?php
                } else {
            ?>

            <div class="alert alert-warning" style="margin-top:2rem;  font-size:1.25rem;" role="alert">
                Aún no existen plataformas.
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>


