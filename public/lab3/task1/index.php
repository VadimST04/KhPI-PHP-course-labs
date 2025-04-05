<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['save']) && isset($_POST['name']) && $_POST['name'] !== '') {
        setcookie('userName', $_POST['name'], time() + (86400 * 7), '/');
    }

    if (isset($_POST['delete'])) {
        setcookie('userName', '', time() - 3600, '/');
    }
} else {
    if (count($_COOKIE) > 0 && isset($_COOKIE['userName'])) {
        echo 'Hello ' . $_COOKIE['userName'] . '!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 3 | Cookies</title>
</head>

<body>
    <form method="POST">
        <label for="name">Enter your name:
            <input type="text" id="name" name="name">
        </label>
        <input type="submit" name="save" value="Save">
        <input type="submit" name="delete" value="Delete">
    </form>
</body>

</html>