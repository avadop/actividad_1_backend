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
    .delete-button {background:none; border: none; color: white; padding: 0;}
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
            <a class="btn btn-primary" style="margin-top:1em;" href="./create.php">Añadir nuevo actor</a>
            <table class="table" style="margin-top:2rem;">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha de nacimiento</th>
                    <th>Nacionalidad</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php
                        foreach($actorList as $actor)
                        {
                    ?>
                    <tr>
                        <td><?php echo $actor->getId();?> </td>
                        <td><?php echo $actor->getName();?> </td>
                        <td><?php echo $actor->getSurnames();?> </td>
                        <td><?php echo $actor->getBirthDate();?> </td>
                        <td><?php echo $actor->getNacionality();?> </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-success" href="edit.php?id=<?php echo $actor->getId();?>">Editar</a>
                                <form name="delete_actor" action="delete.php" method="POST" class="btn btn-danger">
                                    <input type="hidden"  name="actorId" value="<?php echo $actor->getId();?>" />
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
            <a class="btn btn-outline-primary" style="font-weight: 700; border-width: 3px;" href="../../index.html">Atrás</a>
        

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


