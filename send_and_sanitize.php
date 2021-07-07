<?php
include 'mailFunc.php';
header('Content-type: application/json');

$data = array(
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'subject' => $_POST['subject'],
    'message' => $_POST['message'],
    'success' => true,
    'errors' => [],
    'msg' => '',
);

$func = new mailFunc();

$data = $func->sanitize_and_validate($data);

if (!($data['success'])) {
    $data = $func->send_mail($data);
}

echo json_encode($data);
?>