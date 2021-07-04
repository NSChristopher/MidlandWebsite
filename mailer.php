<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';

    $data = [];
    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAutoTLS = false;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;

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
            $data['message'] = 'Sorry there was an issue. please try again later.';
        } else {
            $data['message']  = 'Message sent! Thanks for contacting us.';
        }
    } else {
        $data['message'] = 'Share it with us!';
    }


    echo json_encode($data);
?>