<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Directors Library</title>
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
                require_once('../../controllers/DirectorController.php');

                $directorList = listAllDirector();

                if(count($directorList) > 0) {
            ?>
            <h3 style="margin-top:1.5em;">Lista de todos los Directores</h3>
            <table class="table" style="margin-top:2rem;">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha de nacimiento</th>
                    <th>Nationalidad</th>
                </thead>
                <tbody>
                    <?php
                        foreach($directorList as $director)
                        {
                    ?>
                    <tr>
                        <td><?php echo $director->getId();?></td>
                        <td><?php echo $director->getName();?></td>
                        <td><?php echo $director->getLastName();?></td>
                        <td><?php echo $director->getDateOfBirth();?></td>
                        <td><?php echo $director->getNationality();?></td>
                    <td>
                        <div class="btn-group" role="group">
                        <a class="btn btn-success" href="edit.php?id=<?php echo $director->getId();?>">Editar</a>
                        <form name="delete_director" action="delete.php" method="POST">
                        <input type="hidden" name="directorId" value="<?php echo $director->getId();?>" />
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
                <a class="btn btn-primary" href="../../index.html">Atras</a>
            </div>              

            <?php
                } else {
            ?>

            <div class="alert alert-warning" role="alert" style="margin-top:1rem; font-size:1.25rem;">
                There are no directors yet.
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>
