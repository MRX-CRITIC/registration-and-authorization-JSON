<link rel="stylesheet" href="style_authorization.css">
<div class="center">
    <h1>Авторизация</h1>
    <form action="authorization.php" method="post">

        <div class="txt_field">
            <input type="text" name="username" required>
            <label>Логин</label>
            <span></span>
        </div>

        <div class="txt_field">
            <input type="password" name="password" required>
            <label>Пароль</label>
            <span></span>
        </div>

        <div class="pass">Забыли пароль?</div>
        <input type="submit">
    </form>
        <div class="signup_link">Вы новый пользователь? <a href="registration_html.php">Регистрация</a>
</div>

<?php

session_start();
if (!empty($_SESSION['username'])) {
    header("location: base.php");
}

?>