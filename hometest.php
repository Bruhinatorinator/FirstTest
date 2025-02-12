<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="view/hometest.css">
</head>
<body>
<form action="logout.php">
<button type="submit">Logout</button>
</form>
<h1>
<?php
    require_once 'redirect.php';
    require_once 'config/config.session.php';
    require_once 'config/db.php';
    require_once 'model/hometest.model.php';
    require_once 'view/hometest.view.php';
    $name = getName($pdo);
    welcome($name);
?>
<h2>Accounts List</h2>
<?php
    renderAccountsTable(fetchAccounts($pdo))
    ?>

</h1>
</body>
</html>