<?php
// Lab1
// echo виводить текстове повідомлення
echo "Hello World";

$str = 'hello';
$intNum = 5;
$floatNum = 6.5;
$b = true;
echo '<br>str: ' . $str . '<br>intNum: ' . $intNum . '<br>floatNum: ' . $floatNum . '<br>bool: ' . $b;
echo '<br>' . var_dump($str);
echo '<br>' . var_dump($intNum);
echo '<br>' . var_dump($floatNum);
echo '<br>' . var_dump($b);

$word1 = 'Hello';
$word2 = 'from php';
echo '<br>' . $word1 . ' ' . $word2;

$num = 10;
if ($num % 2 == 0) {
    echo '<br>' . 'even';
} else {
    echo '<br>' . 'odd';
}

for ($i = 1; $i <= 10; $i++) {
    echo '<br>' . $i;
}
echo '<br>';
$i = 10;
while ($i > 0) {
    echo '<br>' . $i;
    $i--;
}

$student = [
    'name' => 'Vadym',
    'surname' => 'Starchak',
    'age' => 20,
    'speciality' => 'Computer Science',
];
// беремо ключи зі асоціатівного масиву за допомогою array_values
// створюємо з елеменитів масиву строку за допомогою implode
echo '<br><br>' . implode(', ', array_values($student));

$averMark = 3;
$student['average mark'] = $averMark;
echo '<br><br>' . implode(', ', array_values($student));
