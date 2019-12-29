<?php
  require_once ('PHPMailer/PHPMailer-master/src/PHPMailer.php');
  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->SMTPAuth();
  $mail->SMTPSecure ='ssl';
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = '465';
  $mail->isHTML();
  $mail->Username = 'kynguyenkhac28@gmail.com';
  $mail->Password = '2811111299';
  $mail->SetFrom('no-reply@howcode.org');
  $mail->Subject = 'Hello World';
  $mail->Body ='A Test Mail';
  $mail->AddAddress('kynguyekhac99@gmail.com');

  $mail->Send();












 ?>
