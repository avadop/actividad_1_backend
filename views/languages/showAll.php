<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Biblioteca de Series</title>
  <!-- Incluye los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  
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
                require_once('../../controllers/LanguageController.php');

                $languageList = listAllLanguages();

                if(count($languageList) > 0) {
            ?>
            <h1 style="margin-top:2rem; margin-left: 1rem;">Biblioteca de Series</h1>

            <h3 style="margin-top:2rem; margin-left: 1rem;">Listado de todas los idiomas</h3>

            <table class="table text-center" style="margin-top:2rem; margin-left: 1rem;">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Código ISO</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php
                        foreach($languageList as $language)
                        {
                    ?>
                    <tr>
                        <td><?php echo $language->getId();?> </td>
                        <td><?php echo $language->getName();?> </td>
                        <td><?php echo $language->getIsoCode();?> </td>
                        <td>
                            <div class="btn-group" role="group"`aria-label="Basic example">
                                <a class="btn btn-success" href="edit.php?id=<?php echo $language->getId();?>">Editar</a>

                                <form name="delete_language" action="delete.php" method="POST" class="btn btn-danger">
                                    <input type="hidden"  name="languageId" value="<?php echo $language->getId();?>" />
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

            <div class="alert alert-warning" role="alert">
                Aún no existen idiomas.
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>


