<?php
session_start();
include('conexion.php');
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Psicokrecer</title>
    <!-- Icono de la pestaña -->
    <link rel="icon" href="dist/img/Psico-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/lgn.css">
    <link rel="stylesheet" href="./src/css/arreglos.css">
</head>

<body>

    <?php

    if (isset($_POST['Enviar'])) { // comprobamos que se hayan enviado los datos del formulario

        if (
            isset($_POST['username']) && !empty($_POST['username']) &&
            isset($_POST['password']) && !empty($_POST['password'])
        ) {
            $usuario = mysqli_real_escape_string($conexion, $_POST['username']);
            $clave = mysqli_real_escape_string($conexion, $_POST['password']);
            $clave = crypt($clave, "pass");

            // comprobamos que los datos ingresados en el formulario coincidan con los de la BD
            $sql = mysqli_query($conexion, "SELECT * FROM userblog WHERE email='$usuario' AND clave='$clave'") or die(mysqli_error($conexion));
            $resultado = mysqli_num_rows($sql); //cuento el número de coincidencias
            $row = mysqli_fetch_array($sql);
            //echo "todavia no entro en el if";


            if ($resultado == 1) {
                $_SESSION['id_user'] = $row['id_user']; // creamos la sesion "id_user" y le asignamos como valor el campo usuario_id
                $_SESSION['user'] = $row['nombreUser']; // creamos la sesion "nombre" y le asignamos como valor el campo 
                header("Location:" . $_SERVER['HTTP_REFERER']);
                echo "<script language='javascript'>window.location='index.php'</script>";
            } else {

    ?>
                <div class="alerta-error text-white text-center">Usuario o contraseña incorrectos</div>
                </h1>
    <?php
            }
        } else {
            echo "Falta completar campos";
        }
    }

    ?>

    <div id="login">
        <h3 class="text-center letra pt-5 text-info">Psicokrecer</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-white">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-white">Usuario:</label><br>
                                <input type="email" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-white">Contraseña:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">

                                <input type="submit" name="Enviar" class="btn btn-light btn-md" value="Enviar">
                            </div>

                        </form>

                        <div class="enlace">
                            <a href="registro.php" class="font-weight-bold">Aun no te has registrado?</a>
                            <i class="fas fa-angle-down" style="transition: 1s;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>