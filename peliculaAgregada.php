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
                      <a href="agregarPelicula.php"><button type="button" >Agregar</button></a>
                  </nav>
              </div>
          </div>
      </header>

    <!-- log base de datos -->
    <?php
        try {
          $new_id = rand(0, 99999);
          $new_nombre = $_POST['nombre'];
          $new_poster = $_POST['poster'];
          $new_genero = $_POST['genero'];
          $new_director = $_POST['director'];
          $new_protagonistas = $_POST['protagonistas'];
          $new_sinopsis = $_POST['sinopsis'];
          $new_duracion = $_POST["duracion"];

          require_once('funciones/bd_conexion.php');
          $sqlInsert = "INSERT INTO `peliculas`(`id_pelicula`, `nombre`, `poster_pelicula`, `genero`, `director`, `protegonistas`, `sinopsis`, `duracion`) VALUES ('$new_id','$new_nombre','$new_poster','$new_genero','$new_director','$new_protagonistas','$new_sinopsis','$new_duracion')";
          $conn->query($sqlInsert);

          $sql = "SELECT poster_pelicula FROM peliculas WHERE nombre='$new_nombre'";
          $resultado = $conn->query($sql);
        } catch (\Exception $e) {
          echo $e->getMessage();
        }
     ?>

    <main class="seccion contenedor">
        <h2 class="fw-300 centrar-texto">'<?php echo $new_nombre; ?>' ha sido agregada!</h2>
        <h3 class="fw-300 centrar-texto">Mirala ahora</h2>
        <div class="contenedor-anuncios">

                <?php
                  while($posters_peliculas = $resultado->fetch_assoc()) { ?>
                    <?php
                      foreach ($posters_peliculas as $poster => $value) {?>
                          <div class="anuncio">

                            <form action="pelicula.php?poster=<?php echo $value ?>" method="post" enctype="multipart/form-data" id="MyUploadForm">
                                  <img src="<?php echo $value; ?>" alt="Poster Pelicula">
                                  <input class="boton-verde" type="submit" value="Ver informacion">
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
