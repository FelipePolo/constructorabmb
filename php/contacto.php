<?php

use PHPMailer\PHPMailer\PHPMailer;

include "./mailer/PHPMailer.php";
include "./mailer/SMTP.php";
include "./mailer/Exception.php";

try {
  /// BOT BMB MAILER ///
    $fromemail = "constructorabmbBOT@hotmail.com";
    $fromname = "Constructora BMB";
    $host = "smtp.live.com";
    $port = "587";
    $SMTPAuth = "login";
    $_SMTPSecure = "tls";
    $password = "bmb_BOT4864";
  ///

  // INFORMATION MAILER FOR THE BOT //
    $username = isset($_POST['nombre']) ? $_POST['nombre'] : "No Digito Su Nombre";
    $userphone = isset($_POST['celular']) ? $_POST['celular'] : "No Digito Su CELULAR";
    $useremail = isset($_POST['email']) ? $_POST['email'] : "No Digito Su EMAIL";
    $usercountry = isset($_POST['pais']) ? $_POST['pais'] : "No Digito Su PAIS";
    $usercity = isset($_POST['ciudad']) ? $_POST['ciudad'] : "No Digito Su CIUDAD";
    $asesora = isset($_POST['asesora']) ? $_POST['asesora'] : "Ingrith Emily Polo Prada";
  //


  //mailer
  $mail = new PHPMailer();
  $mail->isSMTP();

  $mail->Mailer = "smtp";
  $mail->CharSet = 'UTF-8';
  $mail->SMTPDebug = 0;
  $mail->Host = $host;
  $mail->Port = $port;
  $mail->SMTPAuth = $SMTPAuth;
  $mail->SMTPSecure = $_SMTPSecure;
  
  $mail->Username = $fromemail;
  $mail->Password = $password;

  $mail->setFrom($fromemail,$fromname);
  $mail->addAddress("constructorabmb@gmail.com");

  $mail->isHTML(true);
  $mail->Subject = "Contacto de BOT BMB";
  $mail->Body = "ESTE USUARIO SE HA REGISTRADO EN LA PAGINA Y QUIERE UNA ASESORIA </br>
  
    NOMBRE: <strong>$username</strong> ,</br>
    EMAIL: <strong>$useremail</strong> ,</br>
    CELULAR: <strong>$userphone</strong> ,</br>
    PAIS: <strong>$usercountry</strong> ,</br>
    CIUDAD: <strong>$usercity</strong> ,</br>

    ESTE USUARIO LLEGO A LA PAGINA POR EL ASES@R : <strong> $asesora</strong></br>

    <strong>
      ATT: Constructorabmb_BOT. </br>
      scheduled by:  Ernesto Felipe Polo Prada
    </strong>
  ";

  if(!$mail->send()){
    error_log("MAILER: NO SE PUDO ENVIAR EL CORREO");
  }else{
    echo '<h1>SE HA ENVIADO CORRECTAMENTE TU INFORMACION</h1>';
    echo '<p>TE ENVIARE A LA PAGINA DE INICIO AHORA.</p>';
    header("location:../");
  }
} catch (\Throwable $th) {
  //throw $th;
}
?>