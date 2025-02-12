<?php
require_once '../config/config.session.php';
require_once '../config/db.php';
require_once '../model/index.model.php';
require_once '../controller/index.controller.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    $hashedpassword = getuserdata($pdo, $username);
    $errors = validatelogin($username, $password, $hashedpassword);
    
    $response = [
        'errors' => [],
        'message' => ''
    ];

    if (empty($errors)) {
        if (verifypassword($username, $password, $hashedpassword)) {
            $_SESSION['username'] = $username;
            $response['message'] = 'Login successful!';
        } else {
            $response['errors'][] = 'Invalid username or password.';
        }
    } else {
        foreach ($errors as $error) {
            $response['errors'][] = $error;
        }
    }
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>