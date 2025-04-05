<?php
require_once 'UserModel.php';

session_start();

$user = new UserModel();

$action = $_GET['action'] ?? null;

if ($action === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        !isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['password']) ||
        !isset($_POST['confirm_password'])
    ) {
        die('Some of the fields are empty!');
    }

    if ($user->getUserByEmail($_POST['email'])) {
        die('User is already exist!');
    }

    if ($_POST['password'] !== $_POST['confirm_password']) {
        die('passwords do not match!');
    }

    $isRegistrated = $user->registrate([
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ]);

    if ($isRegistrated) {
        header('Location: index.php?action=login');
        exit();
    } else {
        die('Registration went wrong');
    }
} else if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        !isset($_POST['email']) ||
        !isset($_POST['password'])
    ) {
        die('Some of the fields are empty!');
    }

    $newUser = $user->login([
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ]);

    if ($newUser) {
        $_SESSION['user_id'] = $newUser->id;
        $_SESSION['name'] = $newUser->name;
        header('Location: index.php?action=hello');
        exit();
    } else {
        die('Entering into account went wrong');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>

    <nav>
        <a href="?action=register">Register</a> |
        <a href="?action=login">Log in</a>
    </nav>

    <hr>

    <?php if ($action === 'register' || !isset($action)): ?>
        <?php require 'registration.php'; ?>
    <?php elseif ($action === 'login'): ?>
        <?php require 'login.php'; ?>
    <?php elseif ($action === 'hello'): ?>
        <?php require 'Welcome.php'; ?>
    <?php endif; ?>

</body>

</html>