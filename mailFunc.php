<?php
use PHPMailer\PHPMailer\PHPMailer;

class mailFunc {
  
private function okLength($str, $maxlen) {
    $len = strlen($str);
    return $len <= $maxlen;
}

public function sanitize_and_validate($data) {

	if (! $this->okLength($data['name'], 100)) {
		$data['errors']['name_msg'] = "name over 100 characters";
		$data['success'] = false;
	}
	if (! $this->okLength($data['name'], 100)) {
		$data['errors']['business'] = "business over 100 characters";
		$data['success'] = false;
	}
	if (! $this->okLength($data['email'], 100)) {
		$data['errors']['email_msg'] = "email over 100 characters";
		$data['success'] = false;
	}
	if (! $this->okLength($data['volume'], 25)) {
		$data['success'] = false;
	}
	if (! $this->okLength($data['message'], 2048)) {
		$data['errors']['message_msg'] = "message over 2048 characters";
		$data['success'] = false;
	}

	$data['name'] = trim($data['name']);
	$data['name'] = filter_var($data['name'], FILTER_SANITIZE_STRING);
	if (empty($data['name'])) {
		$data['errors']['name_msg'] = "name is empty or invalid";
		$data['success'] = false;
	}

	$data['business'] = trim($data['business']);
	$data['business'] = filter_var($data['business'], FILTER_SANITIZE_STRING);
	if (empty($data['business'])) {
		$data['errors']['business_msg'] = "business name is empty or invalid";
		$data['success'] = false;
	}

	$data['email'] = trim($data['email']);
	$data['email'] = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
	if (! filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
		$data['errors']['email_msg'] = "email is empty or invalid";
		$data['success'] = false;
	}

	$data['volume'] = trim($data['volume']);
	$data['volume'] = filter_var($data['volume'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

	$data['message'] = trim($data['message']);
	$data['message'] = filter_var($data['message'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if (empty($data['message'])) {
		$data['errors']['message_msg'] = "message is empty or invalid";
		$data['success'] = false;
	}

	return $data;
}

function send_mail($data) {
    require 'vendor/autoload.php';

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

    $mail->setFrom('midlandpaymentservices@gmail.com', 'Gus Prentzas');
    $mail->addAddress('midlandpaymentservices@gmail.com', 'Gus Prentzas');
    if ($mail->addReplyTo($data['email'], $data['name'])) {
        $mail->Subject = $data['business'] . ' | Midland Web Inquiry';
        $mail->isHTML(false);
        $mail->Body = <<<EOT
		Email: {$data['email']}
		Name: {$data['name']}
		Business: {$data['business']}
		Volume: {$data['volume']}
		Message: {$data['message']}
		EOT;
		if (!$mail->send()) {
			$data['msg'] = "<p>Mailer Error: " . $mail->ErrorInfo . "</p>";
			$data['success'] = false;
		} else {
			$data['msg'] = "<p>Message sent.</p><p>Thank you! I will get back to you as soon as possible.</p>";
			$data['success'] = true;
		}
    }
	return $data;
}
}