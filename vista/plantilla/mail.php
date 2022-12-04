<?php
// Varios destinatarios
$para  = $email . ', '; // atención a la coma
//$para .= 'wez@example.com';

// título
$título = 'Gracias por registrarte';

//ALEATORIO
$codigo = rand(1000,9999);

// mensaje
$mensaje = '
<html>
<head>
    <meta charset="utf-8"/>
  <title>Antes de terminar </title>
</head>
<body>
  <p>Tu código de verificación es:</p>
  <p><a href="?ctrl=CtrlPrincipal&accion=Confirmar?email='.$email.'">Verificar Cuenta</a></p>
  <h2>'.global $codigo.'</h2>
</body>
</html>
';


// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
/*$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";*/

// Enviarlo
$enviado=false;
if (mail($para, $título, $mensaje, $cabeceras)) {
  $enviado=true;
}
?>