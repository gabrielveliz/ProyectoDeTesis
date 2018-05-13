<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['telephone'];
$message = $_POST['message'];
$formcontent="Correo generado por el formuario de Contactos, por favor no responder \n \n Nombre: $name \n Correo electronico: $email \n Telefono: $phone \n \nMensaje:\n $message \n \n \n Si desea responder esta persona por favor envie un correo a: $email";
$recipient = "gabrielveliz@mueblesveliz.cl";
$subject = "Nuevo contacto de Sitio web";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Mensaje enviado Correctamente" . " " . "<meta http-equiv='refresh' content='0;URL=http://mueblesveliz.cl/enviado.html' />";
?>