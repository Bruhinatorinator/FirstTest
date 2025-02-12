<?php
function getuserdata($pdo, $username){
    $stmt = $pdo->prepare("SELECT password FROM accounts WHERE username = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $hashedPassword = $stmt->fetchColumn();
        return $hashedPassword;
    }
    else{
        return $hashedPassword=null;
    }
}