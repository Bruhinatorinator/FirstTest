<?php
function handleErrors($errors) {
    foreach ($errors as $error) {
        echo "<p style='color: red;'>$error</p>";
    }
}

function registerSuccess(){
    echo "<h3 style='color: green; text-align: center;'>Registration successful! Proceed to Login.</h3>";
}

function registerFail(){
    echo "<h3 style='color: red; text-align: center;' >Registration failed! Please Try Again.</h3>";
}