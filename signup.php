<?php
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="signup.css">
<title>Sign Up</title>
</head>
<body>
<?php
$errors = [];
$name = $username = $password = $confirmpassword = "";

?>
<div class="signup-container">
<h2> 
<?php 
$title="Sign Up";
echo $title;
?></h2>
<form action="" method="POST">
    <label for="name">Name*</label>
    <input type="text" name="name" value=<?php echo htmlspecialchars($name); ?>>
    <br>
    <label for="username">Username*</label>
    <input type="text" name="username" value=<?php echo htmlspecialchars($username); ?>>
    <br>
    <label for="password">Password*</label>
    <input type="password" name="password" >
    <br>
    <label for="confirmpassword">Confirm Password*</label>
    <input type="password" name="confirmpassword" >
    <button type="submit">Create Account</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirmpassword = htmlspecialchars(trim($_POST['confirmpassword']));

    //no empty
    if (empty($name) || empty($username) || empty($password) || empty($confirmpassword)) {
        $errors[] = "Please fill in all required fields.";
    }

    //not match
    if ($password !== $confirmpassword) {
        $errors[] = "Passwords do not match.";
    }
    //does username exist
    if (empty($errors)) {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM accounts WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetchColumn() > 0) {
            $errors[] = "Username already exists. Please choose another.";
        }
    }
    //check errors and insert
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO accounts (name,username,password) VALUES (:name,:username,:password);";
        $stmt = $pdo ->prepare($query);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":password",$hashedPassword);
        if ($stmt->execute()) {
            echo "<h3>Account created successfully! Proceed to login!</h3>";
        } else {
            echo "<h3>Failed to create account. Please try again.</h3>";
        }
    } else{
        foreach($errors as $error){
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
?>
<p>Have an account?<a href="login.php" class="link">Login here</a></p>
</div>
</body>
</html>