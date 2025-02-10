<?php
require_once 'db.php';
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<div class="login-container">
<?php
$errors = [];
 $username = $password = "";

?>
    <h2><?php echo 'Login'; ?></h2>
    <form action="" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username" value=<?php echo htmlspecialchars($username); ?>>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>
    <br>
    <p>Don't have an account?<a href="signup.php" class="link">Signup here</a></p>
    <?php
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = htmlspecialchars(trim($_POST['username']));
        $password = htmlspecialchars(trim($_POST['password']));

        if (empty($username) || empty($password)) {
            $errors[] = "Please fill in all required fields.";
            foreach ($errors as $error){
                echo "<p style='color: red;'>$error</p>";
            }
        }

        if (empty($errors)) {
            $stmt = $pdo->prepare("SELECT password FROM accounts WHERE username = :username");
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $hashedPassword = $stmt->fetchColumn();

                // Debugging: Output the hashed password
                // Uncomment the following lines to see the hashed password
                 echo "Hashed Password from DB: " . $hashedPassword . "<br>";
                 echo "Password entered: " . $password . "<br>";

                if (password_verify($password, $hashedPassword)) {
                    session_start();
                    $_SESSION['username'] = $username;
                    header("Location: hometest.php");
                    exit(); // Make sure to exit after header redirection
                } else {
                    $errors[] = "Invalid password.";
                    foreach ($errors as $error){
                        echo "<p style='color: red;'>$error</p>";
                    }
                }
            } else {
                $errors[] = "Invalid username.";
                foreach ($errors as $error){
                    echo "<p style='color: red;'>$error</p>";
                }
            }
        }
    }
    ?>
</div>
</body>
</html>
