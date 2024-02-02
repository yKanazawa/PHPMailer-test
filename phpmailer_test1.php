<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer();

$mail->SMTPDebug = 2;
$mail->isMail();
$mail->Host = '127.0.0.1';
$mail->Encoding = "7bit";
$mail->CharSet = 'ISO-2022-JP';

$mail->setFrom('test_from@example.com', mb_encode_mimeheader('ＦＵＬＬＷ－ＦＲＯＭ'));
$mail->Subject = mb_encode_mimeheader('ＦＵＬＬＷ－ＳＵＢＪＥＣＴ');
$mail->Body = 'ＦＵＬＬＷ－ＢＯＤＹ';

$mail->addAddress('test_to@example.com');

$mail->isHTML(false);
$mail->send();
