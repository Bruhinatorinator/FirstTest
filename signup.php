<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="view/signup.css">
    <title>Sign Up</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
<div class="signup-container">
    <h2> 
        <?php 
        $title = "Sign Up";
        echo $title;
        ?>
    </h2>
    <form id="signup-form" method="POST">
        <div>
            <label for="name">Name*</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label for="username">Username*</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label for="password">Password*</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label for="confirmpassword">Confirm Password*</label>
            <input type="password" name="confirmpassword" required>
        </div>
        <button type="submit">Create Account</button>
    </form>
    <p>Have an account?<a href="index.php" class="link">Login here</a></p>
    <div id="error-message" style="color: red; text-align: center"></div>
    <script>
        $(() => {
            $('#signup-form').submit(function(event) {
                event.preventDefault();
                $('#error-message').html(''); 
                $.ajax({
                    url: 'inc/signup.inc.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.errors.length > 0) {
                            $('#error-message').html(response.errors[0]);
                        } else {
                            alert(response.message);
                            window.location.href = "index.php";
                        }
                    },
                    error: function() {
                        $('#error-message').html('<p style="color:red;">Error Submitting Form.</p>');
                    }
                });
            });
        });
    </script>
</div>
</body>
</html>