<?php
function validatelogin($username,$password,$hashedpassword){
    $errors= [];
    if (empty($username) || empty($password)) {
        $errors[] = "Please fill in all required fields.";
    }
     if($hashedpassword==null){
        $errors[] = "Invalid Username.";
    } if($hashedpassword!=null && !password_verify($password,$hashedpassword)){
        $errors[] = "Invalid Password.";
    }
    return $errors;
}
function verifypassword($username, $password, $hashedPassword) {
    return $hashedPassword != null && password_verify($password, $hashedPassword);
}