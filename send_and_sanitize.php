<?php
include 'mail_func.php';

$errors = [];
$data = [
    $name = $_POST['name'],
    $email = $_POST['email'],
    $subject = $_POST['subject'],
    $message = $_POST['message'],
    $msg = 'hello',
];

$data = sanitize_and_validate($data);

$errors[] = $data['errors'];

if (!($errors['has_errors'])) {
    send_mail($data);    
}

echo $data;
?>