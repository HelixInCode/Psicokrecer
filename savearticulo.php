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
      $admin=$_SESSION['Nombre'];
      $diseno=mysqli_real_escape_string($conexion,$_POST['diseno']);
      $categoria=mysqli_real_escape_string($conexion,$_POST['categoria']);
      $titulo = mysqli_real_escape_string($conexion, $_POST['titulo']);
      $subtitulo = mysqli_real_escape_string($conexion, $_POST['subtitulo']);
      $texto = mysqli_real_escape_string($conexion, $_POST['texto']);
      $texto2=mysqli_real_escape_string($conexion, $_POST['texto2']);
      $texto3=mysqli_real_escape_string($conexion, $_POST['texto3']);
      $img1= addslashes(file_get_contents($_FILES['imagen1']['tmp_name']));
      $img2= addslashes(file_get_contents($_FILES['imagen2']['tmp_name']));
      $img3= addslashes(file_get_contents($_FILES['imagen3']['tmp_name']));
      $ruta1= $_FILES['imagen1']['name'];
      $tipo1= $_FILES['imagen1']['type'];
      $ruta2= $_FILES['imagen2']['name'];
      $tipo2= $_FILES['imagen2']['type'];
      $ruta3= $_FILES['imagen3']['name'];
      $tipo3= $_FILES['imagen3']['type'];
      
      if ($img1 == !NULL & $img2 == !NULL & $img3 == !NULL){

        $limite_kb = 2384;
        $fechaactual  = date("dHi");
        $nAleatorio  = rand(10, 99);

        $fecha=date("d-m-Y");

        $ruta1= $nAleatorio.$fechaactual.$ruta1;
        $ruta2= $nAleatorio.$fechaactual.$ruta2;
        $ruta3= $nAleatorio.$fechaactual.$ruta3;

        $extension_correcta1 = ($tipo1 == 'image/jpeg' or $tipo1 == 'image/jpg' or $tipo1 == 'image/png' or $tipo1 == 'image/gif');
        $extension_correcta2 = ($tipo2 == 'image/jpeg' or $tipo2 == 'image/jpg' or $tipo2 == 'image/png' or $tipo2 == 'image/gif');
        $extension_correcta3 = ($tipo3 == 'image/jpeg' or $tipo3 == 'image/jpg' or $tipo3 == 'image/png' or $tipo3 == 'image/gif');

        if($extension_correcta1 && $extension_correcta2 && $extension_correcta3){

            if($_FILES['imagen1']['size']<= $limite_kb * 1024 && $_FILES['imagen2']['size']<= $limite_kb * 1024 && $_FILES['imagen3']['size']<= $limite_kb * 1024){

      $guardar = mysqli_query($conexion, "INSERT INTO publicaciones (categoria, diseno, titulo, subtitulo, parrafo1, parrafo2, parrafo3, imagen1, imagen2, imagen3,adminis, fecha) VALUES ('$categoria','$diseno','$titulo','$subtitulo','$texto','$texto2','$texto3','$ruta1','$ruta2','$ruta3','$admin', '$fecha')") or die(mysqli_error($conexion));

      
        if ($guardar){
           $move= move_uploaded_file($_FILES['imagen1']['tmp_name'], "dist/images/".$ruta1);
           $move2= move_uploaded_file($_FILES['imagen2']['tmp_name'], "dist/images/".$ruta2);
           $move3= move_uploaded_file($_FILES['imagen3']['tmp_name'], "dist/images/".$ruta3);
           header("location: panel-blog.php");
           echo "<script language='javascript'>window.location='panel-blog.php'</script>";
           exit();
           echo '<div class="alert alert-success" role="alert">Articulo creado correctamente</div>';
             } else { echo "error al guardar los datos"; }
          } else { echo "El tamaño de las imagenes son demaciado grande"; }
        } 
        else {
          echo "La extensión de la imagen no es de las permitidas";
        }

      }else{ echo "Error con las imagenes null";}
    }else{ echo "Error en el post";}
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
        header ("Location: lgn.php");
    }
?>