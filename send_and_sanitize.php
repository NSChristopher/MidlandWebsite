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

echo json_encode($data);
?>