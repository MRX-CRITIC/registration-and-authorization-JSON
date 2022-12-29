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
    $json = [];
    if (is_readable("database.json")) {
        $fileData = trim(file_get_contents("database.json"));
        if (!empty($fileData)) {

            // Проверка существующего логина
            $json = json_decode($fileData);
            foreach ($json as $user) {
                if ($username == $user->username) {
                    echo "Такой пользователь уже существует!";
                    exit();
                }
            }
        }
    }

    $json[] = [
        'username' => $username,
        'password' => $hash,
    ];

    // Запись в файл
    $json = json_encode($json);
    file_put_contents("database.json", $json);
    header("location: authorization_html.php");

} else {

    header("location: registration_html.php");

}

