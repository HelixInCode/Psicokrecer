<?php

    if(isset($_POST['Enviar'])) { // comprobamos que se hayan enviado los datos del formulario

        if(isset($_POST['username'])&& !empty($_POST['username']) && 
        isset($_POST['password']) && !empty($_POST['password'])){ 
            $usuario= mysqli_real_escape_string($conexion,$_POST['username']);
            $clave = mysqli_real_escape_string($conexion,$_POST['password']);
            $clave = crypt($clave,"pass");

            // comprobamos que los datos ingresados en el formulario coincidan con los de la BD
            $sql = mysqli_query($conexion,"SELECT id_user, email, clave FROM userblog WHERE email='$usuario' AND clave='$clave'") or die(mysqli_error($conexion));
            $resultado=mysqli_num_rows($sql);//cuento el número de coincidencias
            $row = mysqli_fetch_array($sql);
            //echo "todavia no entro en el if";
                

                if($resultado==1) {
                    $_SESSION['id_user'] = $row['id_user']; // creamos la sesion "id_user" y le asignamos como valor el campo usuario_id
                    $_SESSION['nombreUser'] = $row['nombreUser']; // creamos la sesion "nombre" y le asignamos como valor el campo 
                    header("Location: index.html");
                    echo "<script language='javascript'>window.location='index.php'</script>";
                }else {
                
 ?>
                <div class="alerta-error">Usuario o contraseña incorrectos</div>                    
                </h1>
                <?php
                }
            
        }else{
          echo "Falta completar campos";
        }
    }

?>