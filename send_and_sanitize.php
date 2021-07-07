<?php
include 'mailFunc.php';
header('Content-type: application/json');

$data = array(
    'name' => $_POST['name'],
    'business' => $_POST['business'],
    'email' => $_POST['email'],
    'volume' => $_POST['volume'],
    'message' => $_POST['message'],
    'success' => true,
    'errors' => [],
    'msg',
);

$func = new mailFunc();

$data = $func->sanitize_and_validate($data);

if ($data['success']) {
    $data = $func->send_mail($data);
    echo json_encode($data);
}

echo json_encode($data);
?>