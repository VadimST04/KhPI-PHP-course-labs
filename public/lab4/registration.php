<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab4 | DB</title>
</head>

<body>
    <form method="POST" action="index.php?action=register">
        <label for="name">Enter your name:
            <input type="text" id="name" name="name">
        </label>
        <br /><br />
        <label for="email">Enter your email:
            <input type="email" id="email" name="email">
        </label>
        <br /><br />
        <label for="password">Enter your password:
            <input type="password" id="password" name="password">
        </label>
        <br /><br />
        <label for="confirm_password">Confirm your password:
            <input type="password" id="confirm_password" name="confirm_password">
        </label>
        <br /><br />
        <input type="submit" name="login" value="Log in">
    </form>
</body>

</html>