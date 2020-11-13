<?php
session_start();
include ('conexion.php');
    if(isset($_SESSION['id'])){
     
    $selector=$_GET['public'];
    $borrar = mysqli_query($conexion, "DELETE FROM publicaciones WHERE id = '$selector'") or die(mysqli_error($conexion));
     if ($borrar){
         header("location: panel-blog.php");
         echo "<script language='javascript'>window.location='panel-blog.php'</script>";
         exit();
         echo '<div class="alert alert-success" role="alert">Publicacion eliminada correctamente</div>';
       }
       else{
         echo "Error al borrar publicacion";
      }
?>
<?php
    } else {
        header ("Location: lgn.php");
        echo "<script language='javascript'>window.location='lgn.php'</script>";
           exit();
    }
?>