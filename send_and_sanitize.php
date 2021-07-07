<?php
include 'mailFunc.php';
header('Content-type: application/json');
$response['success'] = true;
$response['error'] = null;

$data = array(
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'subject' => $_POST['subject'],
    'message' => $_POST['message'],
    'error' => false,
    'errors' => [],
);

$func = new mailFunc();

$data = $func->sanitize_and_validate($data);

if (!($data['error'])) {
    $data = $func->send_mail($data);
}

echo json_encode($data);
?>