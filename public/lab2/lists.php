<?php
$logFile = 'log.txt';
$textToWrite = "Це новий запис у лог.\n";

file_put_contents($logFile, $textToWrite, FILE_APPEND);

if (file_exists($logFile)) {
    $fileContents = file_get_contents($logFile);
    echo "<h3>Вміст файлу log.txt:</h3>";
    echo "<pre>$fileContents</pre>";
} else {
    throw new Exception("Файл не існує.");
}

$files = scandir('uploads/');
$files = array_diff($files, ['.', '..']);
echo 'Files in uploads/ directory: ' . implode(', ', $files);
echo '<br> Links: <br>';
foreach ($files as $file) {
    echo "<a href='uploads/$file'>$file</a><br>";
}
