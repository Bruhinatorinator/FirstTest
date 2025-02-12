<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="view/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

<div class="login-container">
    <h2><?php echo 'Login'; ?></h2>
    <form id="login-form" method="POST">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit">Login</button>
    </form>
    <div id="error-message" style="color: red; text-align: center"></div>
    <div>
        <p>Don't have an account?<a href="signup.php" class="link">Signup here</a></p>
    </div>
</div>

<script>
    $(() => {
        $('#login-form').submit(function(event) {
            event.preventDefault();
            $('#error-message').html('');
            $.ajax({
                url: 'inc/login.inc.php',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.errors.length > 0) {
                     $('#error-message').html(response.errors[0]);
                    } else {
                     alert(response.message);
                    window.location.href = "hometest.php";
                    }
                },
                error: function() {
                    $('#error-message').html('<p style="color:red;">Error Submitting Form.</p>');
                }
            });
        });
    });
</script>

</body>
</html>