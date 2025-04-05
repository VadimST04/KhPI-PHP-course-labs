<?php
session_start();

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) {
    session_unset();
    session_destroy();
    session_start();
}

$_SESSION['last_activity'] = time();

$products = ['iPhone', 'Mango', 'T-Shirt', 'Auto'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product'])) {
    $product = $_POST['product'];

    $_SESSION['cart'][] = $product;

    $prev = isset($_COOKIE['previous_purchases'])
        ? json_decode($_COOKIE['previous_purchases'], true)
        : [];

    $prev[] = $product;

    setcookie('previous_purchases', json_encode($prev), time() + 86400 * 7, '/');
}

?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Корзина покупок</title>
</head>

<body>
    <h1>Магазин</h1>

    <h2>Товари:</h2>
    <form method="POST">
        <?php foreach ($products as $item): ?>
            <button type="submit" name="product" value="<?= $item ?>"><?= $item ?></button>
        <?php endforeach; ?>
    </form>

    <hr>

    <h2>Поточна корзина:</h2>
    <?php if (empty($_SESSION['cart'])): ?>
        <p>Корзина порожня.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <li><?= $item ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <h2>Попередні покупки:</h2>
    <?php
    $prev = isset($_COOKIE['previous_purchases'])
        ? json_decode($_COOKIE['previous_purchases'], true)
        : [];
    ?>

    <?php if (empty($prev)): ?>
        <p>Немає попередніх покупок.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($prev as $item): ?>
                <li><?= $item ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>

</html>