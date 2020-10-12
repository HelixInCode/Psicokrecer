<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "psicokrecer";

function conectar()
    {global $host, $user, $pass, $db; 
     $cnx = mysqli_connect ($host, $user, $pass, $db);
     if (mysqli_connect_errno()){
        echo "Conexión fallida" .mysqli_connect_error();
        exit(); } 
    return $cnx;}

$conexion = conectar();
    
?>