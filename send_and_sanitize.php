<?php
use mail_func;
include 'mail_func.php';
header('Content-type: application/json');
$response['success'] = true;
$response['error'] = null;

$func = new mail_func();

$errors = [];
$data = [
    $name = $_POST['name'],
    $email = $_POST['email'],
    $subject = $_POST['subject'],
    $message = $_POST['message'],
    $error = false,
    $errors = [],
];

try {
    $func->sanitize_and_validate($data);

    $func->send_mail($data);

    echo json_encode($data);
}
catch (\Error $e) {
    $response['success'] = false;
    $response['error'] = $e->getMessage();
}
echo json_encode($response);
?>