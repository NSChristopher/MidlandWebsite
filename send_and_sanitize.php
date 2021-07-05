<?php
include 'mail_func.php';
header('Content-type: application/json');
$response['success'] = true;
$response['error'] = null;

$errors = [];

global $data;
$data = [
    $name = $_POST['name'],
    $email = $_POST['email'],
    $subject = $_POST['subject'],
    $message = $_POST['message'],
    $errors = [],
];

try {
    sanitize_and_validate($data);

    send_mail($data);

    echo json_encode($data);
}
catch (\Error $e) {
    $response['success'] = false;
    $response['error'] = $e->getMessage();
}
echo json_encode($response);
?>