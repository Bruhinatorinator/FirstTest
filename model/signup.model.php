<?php

    function usernameExists($pdo,$username) {
        $query = "SELECT COUNT(*) FROM accounts WHERE username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    function createUser ($pdo, $name, $username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO accounts (name, username, password) VALUES (:name, :username, :password)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $hashedPassword);
        return $stmt->execute();
    }
