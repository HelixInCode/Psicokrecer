<?php
session_start();
include ('conexion.php');
    if(isset($_SESSION['id'])){
   

   
       $publicacion=$_GET['com'];  
       
       $borrar = mysqli_query($conexion, "DELETE FROM comentarios WHERE idComentario = '$publicacion'") or die(mysqli_error($conexion));
        if ($borrar){
           header("location: blog.php");
           echo "<script language='javascript'>window.location='blog.php'</script>";
           exit();
           echo '<div class="alert alert-success" role="alert">Comentario eliminado correctamente</div>';
          }
        else{
           echo "Error al borrar comentario";
         }
      
?>
<?php
    } else {
        header ("Location: panel-blog.php");
        echo "<script language='javascript'>window.location='blog.php'</script>";
           exit();
    }
?>