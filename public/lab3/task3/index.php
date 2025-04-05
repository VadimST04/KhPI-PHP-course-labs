<?php

echo 'Clien IP: ' . $_SERVER['REMOTE_ADDR'] . '<br/>';
echo 'HTTP_USER_AGENT: ' . $_SERVER['HTTP_USER_AGENT'] . '<br/>';
echo 'PHP_SELF: ' . $_SERVER['PHP_SELF'] . '<br/>';
echo 'REQUEST_METHOD: ' . $_SERVER['REQUEST_METHOD'] . '<br/>';
echo 'SCRIPT_FILENAME: ' . $_SERVER['SCRIPT_FILENAME'] . '<br/>';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . 'task3/server.php');
}
