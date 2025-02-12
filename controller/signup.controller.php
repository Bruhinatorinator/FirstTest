<?php
function validateInput($pdo, $name, $username, $password, $confirmpassword) {
    $errors = [];
    if (empty($name) || empty($username) || empty($password) || empty($confirmpassword)) {
        $errors[] = "Please fill in all required fields.";
    }
    if ($password !== $confirmpassword) {
        $errors[] = "Passwords do not match.";
    }
    if (usernameExists($pdo,$username) > 0){
        $errors[] = "Username already exists.";
    }
    return $errors;
}

