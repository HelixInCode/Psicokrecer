<?php
session_start();
include ('conexion.php');
    if(isset($_SESSION['id_user'])){
        $usuario=$_SESSION['user'];
        $id=$_SESSION['id_user'];
        
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
  <link rel="stylesheet" href="dist/css/panel.css">
  <link rel="stylesheet" href="dist/css/panel-user.css">
</head>
<body>
<?php
$datos=mysqli_query($conexion, "SELECT * FROM userblog WHERE id_user='$id'");
$D=mysqli_fetch_array($datos);




?>
    <header>
        <nav class="navbar navbar-dark">
            <a class="navbar-brand" href="#" style="font-family:'Kaushan Script', cursive; color: #f1f1f1;">
            <img src="./dist/img/psicokrecer-logo-oscuro-sin-fondo.png" height="30" class="d-inline-block align-top"
                alt="mdb logo">
            </a>
            <div>
                <ul id="menu-user" class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link">Hola! <?php echo $usuario; ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Volver a Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="close.php" class="nav-link">Cerrar sesión</a>
                    </li>
                </ul>

            </div>
        </nav>
    </header>
    <main>
    
        <section id="panel-usuario">
            <h3 class="text-center">Panel de Usuario</h3>
            <div class="contenedor-usuario">
                <div class="contenedor-info">
                    <div class="item">
                        <p>Nombre</p>
                        <p><?php echo $D['nombreUser']; ?></p>
                    </div>
                   
                    <div class="item">
                        <p>Correo Electrónico</p>
                        <p><?php echo $D['email']; ?></p>
                    </div>
                    

                </div>
                <div class="contenedor-img">
                    <img src="data:image/jpg;base64,<?php echo base64_encode($D['imagen']);?>" alt="">
                    <a href="">Cambiar Foto</a>
                </div>

            </div>

        </section>

    </main>
    <footer>
        <div class="contenedor-general">  
          <div class="pie-footer">
            <p>© 2020 Copyright: <a href="#"  style="color: #f1f1f1; font-weight: 700;">psicokrecer.com</a></p>
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
      <script type="text/javascript" src="src/js/panel-panel.js"></script>
      <script type="text/javascript" src="src/js/mostrar-diseno.js"></script>
    </body>
</html>
<?php
    }  else {
        header ("Location: login.php");
    }
?>