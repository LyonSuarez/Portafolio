<?php
  // Establecer variables para los datos del formulario
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $asunto = isset($_POST['asunto']) ? $_POST['asunto'] : "Mensaje del formulario de contacto";
  $mensaje = $_POST['mensaje'];

  // Establecer la dirección de correo electrónico a la que se enviará el mensaje
  $destinatario = "lyoncs2000@gmail.com";

  // Establecer el asunto del mensaje
  $asunto_email = "Nuevo mensaje de tu sitio web: ".$asunto;

  // Construir el mensaje de correo electrónico
  $mensaje_email = "Nombre: ".$nombre."\n\n";
  $mensaje_email .= "Correo electrónico: ".$email."\n\n";
  $mensaje_email .= "Mensaje:\n".$mensaje."\n\n";

  // Establecer las cabeceras del correo electrónico
  $headers = "From: ".$email."\r\n";
  $headers .= "Reply-To: ".$email."\r\n";
  $headers .= "X-Mailer: PHP/".phpversion();

  // Enviar el correo electrónico
  if(mail($destinatario, $asunto_email, $mensaje_email, $headers)) {
    // Si el correo electrónico se envió correctamente, redirigir al usuario a una página de confirmación
    header("Location: confirmacion.html");
  } else {
    // Si el correo electrónico no se pudo enviar, mostrar un mensaje de error
    echo "Lo siento, no se pudo enviar tu mensaje.";
  }
?>

