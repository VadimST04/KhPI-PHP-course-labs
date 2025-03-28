<?php
$logFile = 'log.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<pre>';
    var_dump($_FILES);
    echo '</pre>';

    $type = explode('/', $_FILES['file']['type'])[1];
    $fileSize = $_FILES['file']['size'] / 1024 / 1024;

    $uploadDir = 'uploads/';

    if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
        $file = $_FILES['file'];

        $fileName = basename($file['name']);
        $fileTmp = $file['tmp_name'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $filePath = $uploadDir . $fileName;

        if (in_array($fileExt, ['jpg', 'jpeg', 'png']) && $fileSize <= 2) {

            if (file_exists($filePath)) {
                echo 'Файл вже існує';
                $newFileName = md5(uniqid()) . '.' . $fileExt;
                $filePath = $uploadDir . $newFileName;
            }

            if (move_uploaded_file($fileTmp, $filePath)) {
                echo "<br>Файл успішно завантажено: $filePath";
            } else {
                throw new Exception("Помилка при збереженні файлу.");
            }
        } else {
            throw new Exception("Недопустимий тип файлу або файл перевищує 2 МБ.");
        }
    } else {
        throw new Exception("Файл не був завантажений.");
    }

    echo '<br><br>Filename: ' . $fileName;
    echo '<br> File extension: ' . $fileExt;
    echo '<br>File size: ' . $_FILES['file']['size'] / 1024 . 'kB';
    echo "<br>Link: <a href='$filePath'>$filePath</a>";

    echo '<br><br><br>';

    $textForLogFile = $_POST['text'] != '' ? $_POST['text'] : null;
    if (isset($textForLogFile)) {
        file_put_contents($logFile, $textForLogFile, FILE_APPEND);
    }
    echo '<br><br><br>';

    echo 'Logs: <br>';
    echo '<pre>' . file_get_contents($logFile) . '</pre>';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab2 | File</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <label for="file">File
            <input type="file" name="file" id="file">
        </label>
        <label for="text">File
            <input type="text" name="text" id="text">
        </label>
        <input type="submit">
    </form>
</body>

</html>