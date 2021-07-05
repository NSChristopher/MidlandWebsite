<?php
include 'mail_func.php';
header('Content-type: application/json');
$response['success'] = true;
$response['error'] = null;

$func = new mail_func();

try {
    $func->sanitize_and_validate();
    $func->send_mail();
}
catch (\Error $e) {
    $response['success'] = false;
    $response['error'] = $e->getMessage();
}
echo json_encode($response);
?>