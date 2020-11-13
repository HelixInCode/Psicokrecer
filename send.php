<?php

$email = $_REQUEST['email'];

$header = 'From: ' . $email . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Email: " . $email . ",\r\n";

$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = 'helixincode@gmail.com';
$asunto = 'Mensaje enviado desde la página Psicokrecer';

mail($para, $asunto, utf8_decode($mensaje), $header);

echo "Mensaje enviado correctamente";
header("Location: contacto.html");
echo "<script language='javascript'>window.location='contacto.html'</script>";
exit();

?>

