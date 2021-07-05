<?php

use PHPMailer\PHPMailer\PHPMailer;

function getItem($array, $key, $default = "") {
    return isset($array[$key]) ? $array[$key] : $default;
}
  
function okLength($str, $maxlen) {
    $len = strlen($str);
    return ($len > 0) and ($len <= $maxlen);
}

function sanitize_and_validate($data_in) {
	$data = json_decode($data_in);

	$errors = [];

	if (! okLength($data['name'], 100)) {
		$errors['name_length'] = "<p>name over 100 characters</p>";
		$errors['has_error'] = true;
	}
	if (! okLength($data['email'], 100)) {
		$errors['email_length'] = "<p>email over 100 characters</p>";
		$errors['has_error'] = true;
	}
	if (! okLength($data['subject'], 250)) {
		$errors['subject_length'] = "<p>subject over 250 characters</p>";
		$errors['has_error'] = true;
	}
	if (! okLength($data['message'], 2048)) {
		$errors['message_length'] = "<p>message over 2048 characters</p>";
		$errors['has_error'] = true;
	}

	$data['name'] = trim($data['name']);
	$data['name'] = filter_var($data['name'], FILTER_SANITIZE_STRING);
	if (empty($data['name'])) {
		$errors['name_filter'] = "<p>name is empty or invalid</p>";
		$errors['has_error'] = true;
	}

	$data['email'] = trim($data['email']);
	$data['email'] = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
	if (! filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email_filter'] = "<p>email is empty or invalid</p>";
		$errors['has_error'] = true;
	}

	$data['subject'] = trim($data['subject']);
	$data['subject'] = filter_var($data['subject'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if (empty($data['subject'])) {
		$errors['subject_filter'] = "<p>subject is empty or invalid</p>";
		$errors['has_error'] = true;
	}

	$data['message'] = trim($data['message']);
	$data['message'] = filter_var($data['message'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if (empty($data['message'])) {
		$errors['message_filter'] = "<p>message is empty or invalid</p>";
		$errors['has-error'] = true;
	}

	echo json_encode($data);
}

function send_mail($data) {
    require 'vendor/autoload.php';

    $mail = new PHPMailer();

	$name = getItem($data, 'name');
	$email = getItem($data, 'email');
	$message = getItem($data, 'message');
	$subject = getItem($data, 'subject');

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
    if ($mail->addReplyTo($email, $name)) {
        $mail->Subject = $subject . ' | Website Contact';
        $mail->isHTML(false);
        $mail->Body = <<<EOT
        Email: {$email}
        Name: {$name}
        Message: {$message}
        EOT;
		if (!$mail->send()) {
			echo json_encode("<p>Mailer Error: " . $mail->ErrorInfo . "</p>");
			return False;
		} else {
			echo json_encode("<p>Message sent.</p><p>Thank you! I will get back to you as soon as possible.</p>");
			return True;
		}
    }
}
?>