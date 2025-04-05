<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? null;
    $password = $_POST['password'] ?? null;
    if (isset($_POST['login']) && isset($name) && isset($password)) {
        $_SESSION['name'] = $name;
        $_SESSION['password'] = $password;
    }

    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
} else {
    if (isset($_SESSION['name'])) {
        echo 'Hello ' . $_SESSION['name'] . '!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 3 | Sessions</title>
</head>

<body>
    <form method="POST">
        <label for="name">Enter your name:
            <input type="text" id="name" name="name">
        </label>
        <br /><br />
        <label for="password">Enter your password:
            <input type="password" id="password" name="password">
        </label>
        <br /><br />
        <input type="submit" name="login" value="Log in">
        <input type="submit" name="logout" value="Log out">
    </form>
</body>

</html>