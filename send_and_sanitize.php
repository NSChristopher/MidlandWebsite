<?php

$errors = [];
$data = [
    $name = $_POST['name'],
    $email = $_POST['email'],
    $subject = $_POST['subject'],
    $message = $_POST['message'],
];

$process = new mail_func();

$data = $process->sanitize_and_validate($data);

$errors[] = $data['errors'];

echo $msg = "yoyo";

if (!($errors['has_errors'])) {
    $process->send_mail($data);    
}

return $data;
?>