<?php
$errors = [];
$data = [];

if (empty($_POST['name'])) {
    $errors['name'] = 'Name is required.';
}

if (empty($_POST['email'])) {
    $errors['email'] = 'Email is required.';
}

if (empty($_POST['subject'])) {
    $errors['subject'] = 'Subject is required.';
}

if (empty($_POST['message'])) {
    $errors['message'] = 'message is required.';
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Email sent!';
}

echo json_encode($data);
?>