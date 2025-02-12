<?php
function handleerrors($errors){
    foreach ($errors as $error){
        echo "<p style='color: red;'>$error</p>";
    }
}