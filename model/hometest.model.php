<?php
function getName($pdo){
$username = $_SESSION['username'];
$stmt = $pdo->prepare("SELECT name FROM accounts WHERE username = :username");
$stmt->bindParam(":username", $username);
$name = $stmt->execute();
$name = $stmt->fetchColumn();
return $name;
}
function fetchAccounts($pdo) {
    $stmt = $pdo->prepare("SELECT id, username, name FROM accounts");
    $stmt->execute();
    $accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $accounts;
}