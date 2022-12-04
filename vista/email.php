<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'apstigrupofenix@gmail.com';                     //SMTP username
    $mail->Password   = 'ymwtxyflybiszsoo';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('apstigrupofenix@gmail.com', 'Los escritos del Fenix');
    
    $mail->addAddress($_POST['email'], $_POST['nombre']);     //Add a recipient
    /*$mail->addAddress('weed200201@gmail.com', 'Daymer');     //Add a recipient
    $mail->addAddress('luismariososaarteaga@gmail.com', 'Luis Mario');     //Add a recipient
    /*$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');
    */

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Gracias por registrarte';
    $mail->Body    = '<h1>Hola <b>'.$_POST['nombre'].'</b>,</h1> 
    <h3>Tu código de verificación es:</h3>
    <h2>'.$_POST['codigo'].'</h2>
    <h3>Completa tu registro haciendo click en el siguiente enlace</h3>
    <a href="http://localhost/ventas/?ctrl=CtrlCliente&accion=Confirmar&email='.$_POST['email'].'"> Verificar Cuenta </a>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    // href="http://localhost:8080/ventas/?ctrl=CtrlCliente&accion=Confirmar&email='.$_POST['email'].'"> Verificar Cuenta </a>

$enviado=false;
if ($mail->send()) {
    $enviado=true;
}
     
} catch (Exception $e) {
    echo "No se puedo enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
}