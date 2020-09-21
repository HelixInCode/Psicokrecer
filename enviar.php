<?php

$nombre = $_REQUEST['nombre'];
$telefono = $_REQUEST['telefono'];
$email = $_REQUEST['email'];
$asunto = $_REQUEST['asunto'];
$mensaje3 = $_REQUEST['mensaje'];


$header = 'From: ' . $email . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Nombre de Cliente: " . $nombre . ",\r\n";
$mensaje .= "Telefono: " . $telefono . ",\r\n";
$mensaje .= "Mensaje: " . $mensaje3 . ",\r\n";
$mensaje .= "Asunto" . $asunto . ",\r\n";

$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = 'helixincode@gmail.com';
$asunto = 'Mensaje enviado desde la página Psicokrecer';

mail($para, $asunto, utf8_decode($mensaje), $header);

header("Location: contacto.html");
?>

