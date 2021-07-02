<?php

use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAutoTLS = false;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;

$errors = [];
$data = [];

if (empty($_POST['name'])) {
    $errors['name'] = 'Name is required.';
}

if (empty($_POST['email'])) {
    $errors['email'] = 'Email is required.';
}

if (empty($_POST['subject'])) {
    $errors['subject'] = 'Subject is required.';
}

if (empty($_POST['message'])) {
    $errors['message'] = 'message is required.';
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Email sent!';
}

$mail->Username = 'platinumpayrol@gmail.com';
$mail->Password = 'uetsnvrihifjbdcc';
$mail->setFrom('noah@cardpaymentsolutions.com', 'Gus Prentzas');
$mail->addAddress('noahschristopher250@gmail.com', 'Receiver Name');
if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
    $mail->Subject = $_POST['subject'] . ' | Website Contact';
    $mail->isHTML(false);
    $mail->Body = <<<EOT
    Email: {$_POST['email']}
    Name: {$_POST['name']}
    Message: {$_POST['message']}
    EOT;
    if (!$mail->send()) {
        $data['mailer-msg'] = 'Sorry there was an issue. please try again later.';
    } else {
        $data['mailer-msg'] = 'Message sent! Thanks for contacting us.';
    }
} else {
    $data['mailer-msg'] = 'Share it with us!';
}

echo json_encode($data);
?>