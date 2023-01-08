<?php

use PHPMailer\PHPMailer\PHPMailer;

// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require 'vendor/phpmailer/phpmailer/src/Exception.php';
// require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/autoload.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

// $mail->SMTPSecure = "ssl";
// $mail->Host = 'smtp.gmail.com';
// $mail->Port = '465';
// $mail->Username   = 'vitalikruspashnev1@gmail.com'; // SMTP account username
// $mail->Password   = '';
// $mail->SMTPKeepAlive = true;
// $mail->Mailer = "smtp";
// $mail->IsSMTP(); // telling the class to use SMTP
// $mail->SMTPAuth   = true;                  // enable SMTP authentication
// $mail->CharSet = 'utf-8';
// $mail->SMTPDebug  = 0;
$mail->SMTPSecure = "ssl";
$mail->Host = 'smtp.mail.ru';
$mail->Port = '465';
$mail->Username   = 'Vitalik_91rus@mail.ru'; // SMTP account username
$mail->Password   = '';
$mail->SMTPKeepAlive = true;
$mail->Mailer = "smtp";
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->CharSet = 'utf-8';
$mail->SMTPDebug  = 0;


$mail->setFrom('Vitalik_91rus@mail.ru', 'Письмо с сайта!');
$mail->addAddress('vitalikruspashnev1@gmail.com');     //Add a recipient
// yulia.spesivceva@mail.ru
$mail->isHTML(true);
$mail->Subject = 'Обратная связь';


$body = '<h1>Встречайте письмо!</h1>';

if (trim(!empty($_POST['name']))) {
    $body .= '<p><strong>Имя:</strong> ' . $_POST['name'] . '</p>';
}
if (trim(!empty($_POST['email']))) {
    $body .= '<p><strong>E-mail:</strong> ' . $_POST['email'] . '</p>';
}
if (trim(!empty($_POST['phone']))) {
    $body .= '<p><strong>Телефон:</strong> ' . $_POST['phone'] . '</p>';
}
if (trim(!empty($_POST['message']))) {
    $body .= '<p><strong>Сообщение:</strong> ' . $_POST['message'] . '</p>';
}

$mail->Body = $body;

if (!$mail->send()) {
    $message = 'Ошибка';
} else {
    $message = 'Данные отправлены!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
