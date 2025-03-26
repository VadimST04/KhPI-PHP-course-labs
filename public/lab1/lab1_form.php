<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Якщо $_POST['name'] пустий рядок, то встановлюємо значення змінною null
    $name = $_POST['name'] != '' ? $_POST['name'] : null;
    $surname = $_POST['surname'] != '' ? $_POST['surname'] : null;

    // Якщо хоча б одна змінна null, то виводимо Error
    // В іншому випадку вітаємо користувача
    if (isset($name) && isset($surname)) {
        echo 'Hello ' . $name . ' ' . $surname;
    } else {
        echo 'Error: A Some of the fields are empty!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab1 | Form</title>
</head>

<body>
    <form method="POST">
        <label for="name"> Name
            <input type="text" name="name" id="name">
        </label>
        <label for="surname"> Surname
            <input type="text" name="surname" id="surname">
        </label>
        <input type="submit">
    </form>
</body>

</html>