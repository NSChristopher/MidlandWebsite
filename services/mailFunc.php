<?php
use PHPMailer\PHPMailer\PHPMailer;

class mailFunc {
  
private function okLength($str, $maxlen) {
    $len = strlen($str);
    return ($len > 0) and ($len <= $maxlen);
}

public function sanitize_and_validate($data) {
	$name = $data['name'];
    $email = $data['email'];
    $subject = $data['subject'];
    $message = $data['message'];
	$error = $data['error'];
	$errors = $data['errors'];

	if (! $this->okLength($name, 100)) {
		$errors['name_length'] = "name over 100 characters";
		$error = true;
	}
	if (! $this->okLength($email, 100)) {
		$errors['email_length'] = "email over 100 characters";
		$error = true;
	}
	if (! $this->okLength($subject, 250)) {
		$errors['subject_length'] = "subject over 250 characters";
		$error = true;
	}
	if (! $this->okLength($message, 2048)) {
		$errors['message_length'] = "message over 2048 characters";
		$error = true;
	}

	$name = trim($name);
	$name = filter_var($name, FILTER_SANITIZE_STRING);
	if (empty($name)) {
		$errors['name_filter'] = "name is empty or invalid";
		$error = true;
	}

	$email = trim($email);
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email_filter'] = "email is empty or invalid";
		$error = true;
	}

	$subject = trim($subject);
	$subject = filter_var($subject, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if (empty($subject)) {
		$errors['subject_filter'] = "subject is empty or invalid";
		$error = true;
	}

	$message = trim($message);
	$message = filter_var($message, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if (empty($message)) {
		$errors['message_filter'] = "message is empty or invalid";
		$error = true;
	}

	return $data = array(
		'name' => $name,
		'email' => $email,
		'subject' => $subject,
		'message' => $message,
		'error' => $error,
		'errors' => $errors,
	);
}

function send_mail($data) {
    require 'vendor/autoload.php';

    $mail = new PHPMailer();

    $name = $data['name'];
    $email = $data['email'];
    $subject = $data['subject'];
    $message = $data['message'];
	$error = $data['error'];
	$errors = $data['errors'];

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
			$error = True;
		} else {
			$msg = "<p>Message sent.</p><p>Thank you! I will get back to you as soon as possible.</p>";
			echo json_encode($msg);
		}
    }
}
}
?>