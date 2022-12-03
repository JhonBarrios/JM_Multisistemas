<?php
include("Administrador/db.php");
if(isset($_POST['submit_form'])){
  if(isset($_POST['invalidCheck3'])) {

    $sendmail="SELECT * FROM contacto";
    $mailenviar=mysqli_query($connexion,$sendmail);

    while($asignarmail=mysqli_fetch_array($mailenviar)){
      $to = $asignarmail['Correo_Autorizado']; 
    }

    $from = $_POST['nombre'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $texto = $_POST['mensaje'];

    $subject = "Mensaje enviado de: " . $from . " desde el correo: " . $email;
    $message = $from ." escribió lo siguiente:" . "\n\n" . $_POST['mensaje'] ."\n\n" . "Los datos de contacto son: " ."\n" . "Nombre: " . $from ."\n" . "Correo: " . $email . "\n" . "Número de teléfono: " . $numero . "\n\n" .
      "Este es un mensaje automático de la página web https://www.jmmultisistemas.com/" . "\n\n" . "Feliz Día";

    $headers = "From: " . $email;
    mail($to,$subject,$message,$headers);
    echo "<script> alert('Mensaje enviado con exito. nos pondremos en contacto lo antes posible.'); window.location='index.php' </script>";
  } else {
    echo "<script> alert('Debe aceptar las condiciones de uso y privacidad'); window.location='contacto.php' </script>";
  }
}
