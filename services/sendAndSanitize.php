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

try {
    $data = $func->sanitize_and_validate($data);

    try {
    if (!($data['error'])) {
        $func->send_mail($data);
    }
    else {
        echo json_encode("mail not sent");
    }
    }
    catch (\Error $e){
        echo json_encode($e->getMessage());
    }
    
}
catch (\Error $e) {
    $response['success'] = false;
    $response['error'] = $e->getMessage();
}
echo json_encode($response);
echo json_encode($data);
?>