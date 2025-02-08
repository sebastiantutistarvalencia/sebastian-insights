<?php
  // Reemplaza 'contact@example.com' con tu dirección de correo real
  $receiving_email_address = 'sebastian.tutistar@correounivalle.edu.co';

  if( file_exists($php_email_form = 'assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( '¡No se pudo cargar la biblioteca "PHP Email Form"! ');
  }

  // Configuración del objeto de formulario de correo electrónico
  $contact = new PHP_Email_Form;
  $contact->ajax = true;

  // Configuración del destinatario y el remitente
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Descomentar este bloque si quieres enviar el correo usando SMTP:
  /*
  $contact->smtp = array(
    'host' => 'smtp.tu-servidor.com',
    'username' => 'tu-usuario',
    'password' => 'tu-contraseña',
    'port' => '587'
  );
  */

  // Agrega los mensajes al correo
  $contact->add_message($_POST['name'], 'Nombre');
  $contact->add_message($_POST['email'], 'Correo');
  $contact->add_message($_POST['message'], 'Mensaje', 10);

  // Envía el correo y devuelve el resultado
  echo $contact->send();
?>


