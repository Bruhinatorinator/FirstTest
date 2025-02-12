<?php
require_once '../config/config.session.php';
require_once '../config/db.php';
require_once '../model/signup.model.php';
require_once '../controller/signup.controller.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirmpassword = htmlspecialchars(trim($_POST['confirmpassword']));
    
    $response = [
        'errors' => [],
        'message' => ''
    ];

    // Validate input
    $errors = validateInput($pdo, $name, $username, $password, $confirmpassword);
    
    if (empty($errors)) {
        // Attempt to create the user
        if (createUser ($pdo, $name, $username, $password)) {
            $response['message'] = 'Registration successful!';
        } else {
            $response['errors'][] = 'Registration failed. Please try again.';
        }
    } else {
        // Add validation errors to the response
        foreach ($errors as $error) {
            $response['errors'][] = $error;
        }
    }

    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>