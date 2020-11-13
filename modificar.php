<?php
session_start();
include ('conexion.php');
    if(isset($_SESSION['id'])){
     
        if(isset($_POST['modificar'])){
            $id=mysqli_real_escape_string($conexion, $_POST['id']);
            $titulo= mysqli_real_escape_string($conexion, $_POST['titulo']);
            $subtitulo= mysqli_real_escape_string($conexion, $_POST['subtitulo']);
            $parrafo1= mysqli_real_escape_string($conexion, $_POST['parrafo1']);
            $parrafo2= mysqli_real_escape_string($conexion, $_POST['parrafo2']);
            $parrafo3= mysqli_real_escape_string($conexion, $_POST['parrafo3']);


        $upd=mysqli_query($conexion, "UPDATE publicaciones SET titulo='$titulo', subtitulo='$subtitulo', parrafo1='$parrafo1', parrafo2='$parrafo2', parrafo3='$parrafo3' WHERE id='$id' ");
    
            if($upd){
                header("Location: panel-blog.php");
                echo "<script language='javascript'>window.location='panel-blog.php'</script>";
                exit();
            }else {
                echo "Error al intentar modificar";
            }
        }else{ echo "Error en el POST";}



    } else {
        header ("Location: lgn.php");
        echo "<script language='javascript'>window.location='lgn.php'</script>";
           exit();
    }
?>