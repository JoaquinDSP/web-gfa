<?php
  // Dirección de correo donde recibirás los mensajes
  $receiving_email_address = 'joaspretz@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_tel = $_POST['tel'];
  $contact->subject = $_POST['subject'];

  // Agregar los mensajes correctamente
  $contact->add_message( $_POST['name'], 'Nombre');
  $contact->add_message( $_POST['tel'], 'Teléfono');
  $contact->add_message( $_POST['subject'], 'Asunto');
  $contact->add_message( $_POST['message'], 'Mensaje', 10);

  echo $contact->send();
?>
