<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Knight</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

  <header class="site-header inicio">
      <div class="contenedor contenido-header">
          <div class="barra">
              <a href="index.php"><img src="img/movieknight.png" alt="Logotipo de MovieKnigth"> </a>

              <div class="mobile-menu">
                <form action="buscarPelicula.php" method="get">
                    <input class="search-bar" type="text" name="busqueda" placeholder="Buscar Película">
                    <button type="submit">Buscar</button>
                  </form>
                  <button type="button" >Agregar</button>
              </div>

              <nav id="navegacion" class="navegacion">
                <form action="buscarPelicula.php" method="get">
                    <input class="search-bar" type="text" name="busqueda" placeholder="Buscar Película">
                    <button type="submit">Buscar</button>
                  </form>
                  <button type="button" >Agregar</button>
              </nav>
          </div>
      </div>

  </header>

    <!-- log base de datos -->
    <?php
        try {
          $eliminarPelicula = $_GET['eliminarPelicula'];
          require_once('funciones/bd_conexion.php');
          $sql_eliminar = "DELETE FROM `peliculas` WHERE poster_pelicula='$eliminarPelicula'";
          $sql = "SELECT nombre, poster_pelicula FROM peliculas WHERE poster_pelicula='$eliminarPelicula'";

          $resultado = $conn->query($sql);

          $conn->query($sql_eliminar);
        } catch (\Exception $e) {
          echo $e->getMessage();
        }
     ?>

    <main class="seccion contenedor">
      <?php
        while($pelicula_eliminada = $resultado->fetch_assoc()) { ?>
        <h2 class="fw-300 centrar-texto">La pelicula <?php echo $pelicula_eliminada['nombre']; ?> fue eliminada con exito</h2>

        <div class="contenedor-anuncios">

                    <?php
                      foreach ($posters_peliculas as $poster => $value) {?>
                          <div class="anuncio">
                            <form action="pelicula.php?poster=<?php echo $value ?>" method="post" enctype="multipart/form-data" id="MyUploadForm">
                                  <img src="<?php echo $pelicula_eliminada['poster_pelicula']; ?>" alt="Poster Pelicula">
                              </form>
                          </div>
                    <?php  }?>
                <?php } ?>
        </div>

        <?php
          $conn->close();
        ?>
    </main>

    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
            <p class="copyright">Todos los Derechos Reservados 2019 &copy; </p>
        </div>
    </footer>
</body>
</html>
