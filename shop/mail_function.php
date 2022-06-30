<?php
function sendOTP($email,$otp) {
require'PHPMailerAutoload.php';
$mail = new PHPMailer;
$message_body = "One Time Password for PHP login authentication is:" . $otp;
//$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "yuvisingh2001cs17@gmail.com";                 // SMTP username
$mail->Password = "yuvi@2001cs17";                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('yuvisingh2001cs17@gmail.com', 'yuvi singh');
$mail->addAddress($email);  
$mail->addReplyTo('yuvisingh2001cs17@gmail.com');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'otp to login';
$mail->Body    = $message_body;
//$mail->AltBody = $message_body;

$result = $mail->Send();
		return $result;
	
}