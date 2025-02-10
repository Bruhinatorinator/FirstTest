<?php
require_once 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="hometest.css">
</head>
<body>
<form action="login.php">
<button type="submit">Logout</button>
</form>
<h1>
<?php
$username = $_SESSION['username'];
$stmt = $pdo->prepare("SELECT name FROM accounts WHERE username = :username");
$stmt->bindParam(":username", $username);
echo "<h2> Welcome , $username!</h2>";
?>    
</h1>
</body>
</html>