<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Biblioteca de Actores</title>
  <!-- Incluye los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  
  <!-- Incluye los scripts de Bootstrap y tu código JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    th {text-align: center;}
    td {text-align: center;}
  </style>
</head>
<body>
    <div class="container">
        <div class="col-12">
            <?php
                require_once('../../controllers/ActorController.php');

                $actorList = listAllActors();

                if(count($actorList) > 0) {
            ?>
            <h3 style="margin-top:1.5em;">Listado de todos los actores</h3>
            <table class="table" style="margin-top:2rem;">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha de nacimiento</th>
                    <th>Nacionalidad</th>
                </thead>
                <tbody>
                    <?php
                        foreach($actorList as $actor)
                        {
                    ?>
                    <tr>
                        <td><?php echo $actor->getId();?> </td>
                        <td><?php echo $actor->getNombre();?> </td>
                        <td><?php echo $actor->getApellidos();?> </td>
                        <td><?php echo $actor->getFechaNacimiento();?> </td>
                        <td><?php echo $actor->getNacionalidad();?> </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-success" href="edit.php?id=<?php echo $actor->getId();?>">Editar</a>
                                <form name="delete_actor" action="delete.php" method="POST">
                                    <input type="hidden"  name="actorId" value="<?php echo $actor->getId();?>" />
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

            <div class="alert alert-warning" role="alert" style="margin-top:1rem; font-size:1.25rem;">
                Aún no existen actores.
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>


