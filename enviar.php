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

define("RECAPTCHA_V3_SECRET_KEY", '6LfmUuMZAAAAALmyVzs1coD12sRZyX1JtYfluGd_');

$token = $_POST['token'];
$action = $_POST['action'];

// call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$arrResponse = json_decode($response, true);

mail($para, $asunto, utf8_decode($mensaje), $header);



// verificar la respuesta
if ($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {


    // Si entra aqui, es un humano, puedes procesar el formulario
    $envio = mail($para, $asunto, utf8_decode($mensaje), $header);
    //header("Location:./index");
    header("Location: contacto.html");
    exit;
} else {
    // Si entra aqui, es un robot....
    //echo "Lo siento, parece que eres un Robot";
    header("Location: contacto.html");
    exit;
}
