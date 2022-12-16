<?php

// Проверка на существование данных
if (
    !empty($_POST['username'])
    && !empty($_POST['password'])
    && !empty($_POST['password_repeat'])
) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Проверка повторения пароля
    if ($password != $_POST['password_repeat']) {
        echo "Пароль не совпадают!";
        exit();
    }
    // Хэшируем пароль
    $hash = password_hash($password, PASSWORD_DEFAULT);
    if (is_readable("database.txt")) {
        $fileData = trim(file_get_contents("database.txt"));
        $fileData = preg_split("/\n/", $fileData);

        // Проверка существующего логина
        foreach ($fileData as $user) {
            $login = explode(" ", $user)[0];
            if ($username == $login) {
                echo "Такой пользователь уже существует!";
                exit();
            }
        }
    }

    // Запись в файл
    file_put_contents("database.txt", $username . " " . $hash . "\n", FILE_APPEND);
    header("location: authorization_html.php");

} else {
    header("location: registration_html.php");
}

