<?php
function send_mail($from_add,$to_add,$subject,$msg){
date_default_timezone_set('Asia/Calcutta');
$d = date("Y-m-d");
require_once('class.phpmailer.php');
$mail = new PHPMailer();
$mail->Body = $msg;
$mail->IsHTML(true);
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
//$mail->SMTPDebug  = 0;   // 1 = errors and messages    // 2 = messages only
$mail->Host       = "smtp.gmail.com"; // sets the SMTP server
$mail->Port       = "587";                    // set the SMTP port for the GMAIL server
//$mail->SMTPAuth = false;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Username = "pazhaniappanarul2001@gmail.com";
$mail->Password = "xtpdlmjbabjlgqdo";
$mail->CharSet = 'UTF-8';
$mail->SetFrom($from_add, "Geotagging"); 
$mail->AddReplyTo($from_add, "Geotagging");
$mail->Subject    = $subject;
$mail->AddAddress($to_add);



if(!$mail->Send()) {
  error_log("Mailer Error: " . $mail->ErrorInfo);
                return 0;
} else {
                return 1;
}

}
?>