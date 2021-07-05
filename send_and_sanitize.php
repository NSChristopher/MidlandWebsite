<?php
include 'mail_func.php';

$errors = [];
$data = [
    $name = $_POST['name'],
    $email = $_POST['email'],
    $subject = $_POST['subject'],
    $message = $_POST['message'],
    $msg = 'hello', // testing
];

$data = sanitize_and_validate($data);

$errors[] = $data['errors'];

send_mail($data);

echo json_encode($data);
?>