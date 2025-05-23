<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';


$mail = new PHPMailer(true);
$json = file_get_contents('php://input');
$data = json_decode($json,true);
if(isset($data['submit'])){
  $name = $data['name'];
  $phone = $data['phone'];
  $email = $data['email'];
  $message = $data['message'];


  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'plpprojectehs@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'sirx rrvb itad odqj'; // Gmail address Password
    $mail->SMTPSecure = 'tls';
    $mail->Port = '587';

    $mail->setFrom('plpprojectehs@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('mutaifred13@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'PLP Project EHS (Contact Page)';
    $mail->Body = "<h3>Name : $name <br>Phone: $phone <br>Email : $email <br>Message : </h3>$message";

    $mail->send();
    echo 'Message Sent Successfully! Thank You!';
    } catch (Exception $e){
     echo 'Message Failed! Please try again.';
    }
 
}
?>
