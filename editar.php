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
          $peliculaEditar = $_GET["pelicula"];
          require_once('funciones/bd_conexion.php');
          $sql = "SELECT nombre, poster_pelicula, genero, director, duracion, protegonistas, sinopsis FROM peliculas WHERE nombre='$peliculaEditar' ";
          $resultado = $conn->query($sql);
        } catch (\Exception $e) {
          echo $e->getMessage();
        }
     ?>

    <main class="seccion contenedor">
        <h2 class="fw-300 centrar-texto">Editar Película</h2>

        <?php
          while ($pelicula = $resultado->fetch_assoc()) {
        ?>

        <form action="peliculaActualizada.php?peliculaAct=<?php echo $peliculaEditar; ?>" method="post">
          <fieldset>
            <div>
              <legend>Información de película</legend>
              <label for="nombre">Nombre: </label>
              <input type="text" name="nombre" value="<?php echo $pelicula['nombre'];?>" >

              <label for="poster">Poster: </label>
              <input type="url" name="poster" value="<?php echo $pelicula['poster_pelicula'];?>" >

              <label for="genero">Género: </label>
              <input type="text" name="genero" value="<?php echo $pelicula['genero'];?>" >

              <label for="director">Director: </label>
              <input type="text" name="director" value="<?php echo $pelicula['director'];?>" >

              <label for="duracion">Duración: </label>
              <input id="duracion" type="number" name="duracion" min="0" max="99999" value="<?php echo $pelicula['duracion'];?>" >
            </div>

            <div>
              <label for="protagonistas">Protagonistas: </label>
              <textarea  name="protagonistas"><?php echo $pelicula['protegonistas'];?></textarea>

              <label for="sinopsis">Sinopsis: </label>
              <textarea  name="sinopsis"><?php echo $pelicula['sinopsis'];?></textarea>
            </div>

            </fieldset>

            <input onclick="verificarDuracion()" type="submit" value="Editar" class="boton boton-verde">
        </form>
      <?php } ?>

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
<script type="text/javascript">
  function verificarDuracion() {
    var duracion = document.getElementById('duracion');
    if (duracion < 0) {
      alert()
    }
    else {
      submit
    }
  }
</script>
</html>
