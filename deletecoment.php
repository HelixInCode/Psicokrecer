<?php
session_start();
include ('conexion.php');
    if(isset($_SESSION['id'])){
   

    if(isset($_POST['Enviar'])) { 
       $publicacion=$_GET['publicacion'];  
       $borrarcoment = mysql_real_escape_string($conexion, $_POST['comentario']);
       $borrar = mysqli_query($conexion, "DELETE FROM comentarios WHERE idComentario = '$publicacion'") or die(mysqli_error($conexion));
        if ($borrar){
           header("location: blog.php");
           echo '<div class="alert alert-success" role="alert">Comentario eliminado correctamente</div>';
          }
        else{
           echo "Error al borrar comentario";
         }
      }
?>
<?php
    } else {
        header ("Location: blog.php");
    }
?>