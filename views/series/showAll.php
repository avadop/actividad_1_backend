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
                require_once('../../controllers/SerieController.php');

                $serieList = listAllSeries();

                if(count($serieList) > 0) {
            ?>
            <h1 style="margin-top:2rem;">Biblioteca de Series</h1>

            <h3 style="margin-top:2rem;">Listado de todas las series</h3>

            <table class="table text-center" style="margin-top:2rem;">
                <thead>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Plataforma</th>
                    <th>Director</th>
                    <th>Actores</th>
                    <th>Idioma audio</th>
                    <th>Idioma subtítulos</th>
                    <th>Acciones</th>                    
                </thead>
                <tbody>
                    <?php
                        foreach($serieList as $serie)
                        {
                    ?>
                    <tr>
                        <td><?php echo $serie->getId();?> </td>
                        <td><?php echo $serie->getTitle();?> </td>
                        <td><?php echo $serie->getPlatform();?> </td>
                        <td><?php echo $serie->getDirector();?> </td>
                        <td><?php echo $serie->getActorsList();?> </td>
                        <td><?php echo $serie->getAudioLanguagesList();?> </td>
                        <td><?php echo $serie->getSubtitlesLanguagesList();?> </td>
                        <td>
                            <div class="btn-group" role="group"`aria-label="Basic example">
                                <a class="btn btn-success" href="edit.php?id=<?php echo $serie->getId();?>">Editar</a>

                                <form name="delete_serie" action="delete.php" method="POST" class="btn btn-danger">
                                    <input type="hidden"  name="serieId" value="<?php echo $serie->getId();?>" />
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
                Aún no existen series.
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>


