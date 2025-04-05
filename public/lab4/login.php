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
    <form method="POST" action="index.php?action=login">
        <label for="email">Enter your email:
            <input type="email" id="email" name="email">
        </label>
        <br /><br />
        <label for="password">Enter your password:
            <input type="password" id="password" name="password">
        </label>
        <br /><br />
        <input type="submit" name="login" value="Log in">
    </form>
</body>

</html>