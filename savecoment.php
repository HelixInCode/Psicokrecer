<?php
session_start();
include ('conexion.php');
    if(isset($_SESSION['id'])){


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Psicokrecer</title>
 
  <!-- icono de la pestaña -->
  <link rel="icon" href="../dist/img/logo-icon.png"> 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Google Fonts Ubuntu bold-->
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../dist/css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="../dist/css/style.css">
</head>
<body>
  <?php
  if (isset($_POST['Crear'])) {
      $id= $_SESSION['id'];
      $admin = $_SESSION['user'];
      $comentario = mysqli_real_escape_string($conexion,$_POST['comentario']);

      $guardar = mysqli_query($conexion, "INSERT INTO comentarios (comentario, user, id_user) VALUES ('$comentario', '$admin', '$id')") or die(mysqli_error($conexion));

      
        if ($guardar){
           header("location: articulo-slide.php");
           echo "<script language='javascript'>window.location='blog.php'</script>";
               echo '<div class="alert alert-success" role="alert">Articulo creado correctamente</div>';
             } else { echo "error al guardar los datos"; }
           }
         
        
  ?>
  <div class="contenedor-inferior">
    © 2020 Copyright:
    <a href="#"> </a>
  </div>
</footer>
<!-- jQuery -->
<script type="text/javascript" src="../dist/js/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../dist/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../dist/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../dist/js/mdb.min.js"></script>
<!-- Your custom scripts (optional) -->
</body>
</html>
<?php
    }  else {
        header ("Location: articulo-slide.php");
    }
?>