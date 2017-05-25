<?php
	require '../modelo/class.phpmailer.php';

	$correo = $_POST['correo'];
	$exito = null;

	$mail = new PHPMailer;

	$mail->PluginDir = "includes/";
	$mail->Mailer = "smtp";
	$mail->Host = "smtp.hotpop.com";
	$mail->SMTPAuth = true;
	$mail->Username = "santmjoy@gmail.com"; 
  	$mail->Password = "barcelona@fibby_1994jordy:3";
  	$mail->From = "santmjoy@gmail.com";
  	$mail->FromName = "Prueba";
  	$mail->Timeout= 30;

  	$mail->AddAddress($correo);
  	$mail->Subject = "Prueba de phpmailer";
  	$mail->Body = "<b>Mensaje de prueba mandado con phpmailer en formato html</b>";
  	$mail->AltBody = "Mensaje de prueba mandado con phpmailer en formato solo texto";

  	$intentos=1; 
  	while ((!$exito) && ($intentos < 5)) {
		sleep(5);
     	$exito = $mail->Send();
     	$intentos++;	
   	}
 
		
   	if(!$exito) {
		  echo "Problemas enviando correo electrónico a ".$valor."<br/>".$mail->ErrorInfo;	
   	} else {
		  echo "Mensaje enviado correctamente";
   	} 
?>