<?php
session_start();
include ('conexion.php');
    if(isset($_SESSION['id'])){

    $ad=$_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Psicokrecer</title>
  
  <!-- Icono de la pestaña -->
  <link rel="icon" href="dist/img/Psico-logo.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Google Fonts Nunitp -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap">
  <!--Google Fonts Allura-->
  <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
  <!--Google Fonts Jullius-->
  <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&display=swap" rel="stylesheet">
  <!--Google fonts Kaushan-->
  <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
  <!--Google fonts Sacramento-->
  <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="dist/css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="dist/css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="dist/css/styles.css">
  <link rel="stylesheet" href="dist/css/blog.css">
  <link rel="stylesheet" href="dist/css/panel.css">
</head>
<body>
<?php 
$selector=$_GET['public'];

$admin=mysqli_query($conexion, "SELECT * FROM administrador WHERE id='$ad'");
$adm=mysqli_fetch_array($admin);

$precarga1=mysqli_query($conexion, "SELECT * FROM publicaciones WHERE id='$selector'");
$posteo=mysqli_fetch_array($precarga1);


?>

  <header>
    <nav class="navbar navbar-dark">
      <a class="navbar-brand" href="panel-blog.php" style="font-family:'Kaushan Script', cursive; color: #f1f1f1;">
      <img src="./dist/img/psicokrecer-logo-oscuro-sin-fondo.png" height="30" class="d-inline-block align-top"
          alt="mdb logo"> Administrador
      </a>
      <div>
          <ul id="menu" class="navbar-nav">
              <li class="nav-item">
                  <a href="" class="nav-link">Hola! <?php echo $adm['nombre']; ?></a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">Cerrar sesión</a>
              </li>
          </ul>

      </div>
  </nav>
  </header>
    
  <main>
    <section id="articulo">
      <div class="contenedor-principal">
        <div class="inicial-img">
            <img src="./dist/img/Psico-logo.png" alt="">
            <h3>Artículo</h3>
        </div>

        <h3><?php echo $posteo['titulo']; ?></h3>

        <p>
            <?php echo $posteo['subtitulo']; ?></p>
        
        <div class="img-container">
          <img src="./dist/images/<?php echo $posteo['imagen1']; ?>" alt="">
        </div>
        <p>
        <?php echo $posteo['parrafo1']; ?>
        </p>

        <div class="img-container">
          <img src="./dist/images/<?php echo $posteo['imagen2']; ?>" alt="">
        </div>
        <p>
        <?php echo $posteo['parrafo2']; ?>      
        </p>

        <div class="img-container">
          <img src="./dist/images/<?php echo $posteo['imagen3']; ?>" alt="">
        </div>
        <p>
        <?php echo $posteo['parrafo3']; ?>
        </p>


        <div class="datos-clave">
            <p>01/03/2020</p>
            <p>Categoría</p>
        </div>
        <div class="regreso">
            <a href="blog.html">Volver a lista de artículos</a>
        </div>


      </div>
    </section>
  </main>

  <footer>
    <div class="contenedor-general">
      <div class="contenedor-especifico">
        <div class="contenedor-imagen">
          <img src="./dist/img/psicokrecer-logo-oscuro-sin-fondo respaldo.png" alt="">
        </div>
        <div class="contenedor-info">
          <div class="links">
            <a href="index.php">Inicio</a>
            <a href="nosotros.html">Quienes Somos</a>
            <a href="index.php#servicios">Servicios</a>
            <a href="blog.php">Blog</a>
            <a href="contacto.html">Contacto</a>
          </div>
          <div class="separador">

          </div>
          <div class="redes">
            <p>Visita nuestro <a href="blog.php">Blog</a> y síguenos en nuestras redes sociales.</p>
            <div class="redes-icons">
              <a href="https://instagram.com/psicokrecer?igshid=eog2rfo8jsak"><img src="./dist/img/instagram-logo.png" alt=""></a>
              <a href="https://wa.me/56948972401"><img src="./dist/img/whatsapp.png" alt=""></a>
            </div>
          </div>
        </div>

      </div>
      <div class="pie-footer">
        <p>© 2020 Copyright: <a>psicokrecer.com</a></p>
      </div>
    </div>
  </footer>

  <!-- jQuery -->
  <script type="text/javascript" src="dist/js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="dist/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="dist/js/mdb.min.js"></script>
  <!--Typing Script-->
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
  <!-- Particles - js -->
  <!-- <script type="text/javascript" src="src/particles/js/particles.js"></script>
  <script type="text/javascript" src="src/particles/js/lib/stats.js"></script>
  <script type="text/javascript" src="src/particles/js/app.js"></script> -->
  <!-- Your custom scripts (optional) -->
  <!-- <script type="text/javascript" src="src/js/navBar.js"></script> -->
  <script type="text/javascript" src="src/js/tipeo.js"></script>
  <script type="text/javascript" src="src/js/hamburger.js"></script>
</body>
</html>

<?php
    }  else {
        header ("Location: lgn.php");
        echo "<script language='javascript'>window.location='lgn.php'</script>";
           exit();
    }
?>