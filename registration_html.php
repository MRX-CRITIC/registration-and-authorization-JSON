<link rel="stylesheet" href="style_authorization.css">
<div class="center">

    <h1>Регистрация</h1>

    <form action="registration.php" method="post">

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

        <div class="txt_field">
            <input type="password" name="password_repeat" required>
            <label>Повторите пароль</label>
            <span></span>
        </div>

        <input type="submit">

    </form>

    <div class="signup_link">У Вас есть аккаунт? <a href="authorization_html.php">Авторизация</a>
    </div>

