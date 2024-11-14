<?php
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$dataFile = 'data.txt';

if (!file_exists($dataFile)) {
    die("Файл з обліковими даними не знайдено.");
}

$info= file($dataFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$isLoggedIn = false;

foreach ($info as $line) {
    list($validUsername, $validPassword) = explode(":", trim($line));

    if ($username === $validUsername && $password === $validPassword) {
        $isLoggedIn = true;
        break;
    }
}
if ($isLoggedIn) {
    echo "Ви залогінені!";
} 
else {
    echo "Неправильний логін або пароль.";
}
echo "<br><a href='index.html'>Повернутись назад</a>";

?>
