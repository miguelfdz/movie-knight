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
          $poster = $_GET['poster'];
          require_once('funciones/bd_conexion.php');

          $sql_nombre = "SELECT nombre, genero, director, protegonistas, duracion, sinopsis FROM peliculas WHERE poster_pelicula = '$poster'";
          $resultado= $conn->query($sql_nombre);

        } catch (\Exception $e) {
          echo $e->getMessage();
        }
     ?>

    <main class="seccion contenedor">
      <?php
        while ($pelicula = $resultado->fetch_assoc()) {
      ?>
        <h2 class="fw-300 centrar-texto"><?php echo $pelicula['nombre']; ?> by: <?php echo $pelicula['director']; ?></h2>
        <div class="clearfix">
            <div class="pelicula-container">

              <title>Movie Knight - <?php echo $pelicula['nombre']; ?></title>
              <img src="<?php echo $poster; ?>" alt="poster de pelicula" style="width:30%">
              <div class="testimoniales">
                  <div class="testimonial">
                      <blockquote>
                        <div>
                            Protagonistas: ‏‏‎ ‏‏‎<?php echo $pelicula['protegonistas']; ?>
                        </div>
                      </blockquote>
                      <blockquote>
                      <span>Género: ‏‏‎<?php echo $pelicula['genero']; ?> ‏‏‎ ‏‏‎ ‏‏‎ ‏‏‎ ‏‏‎ ‏‏‎ ‏‏‎ ‏‏‎ ‏‏‎ ‏‏‎ ‏‏‎ ‏‏‎</span> <span>Duración: ‏‏‎<?php echo $pelicula['duracion']; ?> ‏‏‎minutos</span>
                      </blockquote>
                      <p><?php echo $pelicula['sinopsis']; ?></p>
                  </div>
              </div>
            </div>
            <div class="pelicula-container">
              <form class="" action="editar.php" method="get">
                  <button class="boton" name="pelicula" value="<?php echo $pelicula['nombre'];?>" type="submit">EDITAR ‏</button>
              </form>
                <?php } ?>
                <button onclick="borrarPelicula()" class="boton">BORRAR</button>
            </div>
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
<script type="text/javascript">
var txt;
      function borrarPelicula() {
            var r = confirm("¡¿SEGURO QUE QUIERES BORRAR LA PELICULA!? una vez eliminada esta no podra ser recuperada");
            if (r == true) {
              window.location.href = "eliminarPelicula.php?eliminarPelicula=<?php echo $poster ?>";
            }
      }
</script>
</html>
