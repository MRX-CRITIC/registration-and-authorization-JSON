<?php

// Проверка на существование данных
if (
    !empty($_POST['username'])
    && !empty($_POST['password'])
) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Обращение к БД
    if (is_readable("database.json")) {
        $fileData = trim(file_get_contents("database.json"));
        if (!empty($fileData)) {
            $json = json_decode($fileData);
            foreach ($json as $user) {
                if ($username == $user->username) {
                    if (password_verify($password, $user->password)) {
                        session_start();
                        $_SESSION['username'] = $username;
                        header("location: base.php");
                        /*echo "Авторизация успешна";*/
                        exit();
                    } else {
                        echo "Логин или пароль введен не верно!";
                    }
                    exit();
                }
            }
            echo "Логин или пароль введен не верно!";
            exit();
        } else {
            echo "Ошибка 500";
        }
    } else {
        echo "Ошибка 500";
    }
}


