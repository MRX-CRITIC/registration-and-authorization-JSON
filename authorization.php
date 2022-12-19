<?php

// Проверка на существование данных
if (
    !empty($_POST['username'])
    && !empty($_POST['password'])
) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Обращение к БД
    if (is_readable("database.txt")) {
        $fileData = trim(file_get_contents("database.txt"));
        $fileData = preg_split("/\n/", $fileData);

        foreach ($fileData as $user) {
            $userData = explode(" ", $user);
            if ($username == $userData[0]) {
                if (password_verify($password, $userData[1])) {
                    header("location: cap.php");;
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
}


