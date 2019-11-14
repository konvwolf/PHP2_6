<form method="post">
    <input type="text" name="name" placeholder="Имя" pattern="^([A-Za-zА-Яа-яЁё]+)$" required>
    <input type="text" name="login" placeholder="Логин" pattern="[A-Za-z0-9]{3,}" required>
    <input type="text" name="email" placeholder="Укажите Email" pattern="^([A-Za-z0-9\.-]+)(@)([A-Za-z0-9-]+)(\.)([A-Za-z]{2,})$" required>
    <input type="text" name="password" placeholder="Пароль" pattern="[A-Za-z0-9]{8,}" required>
    <input type="hidden" name="register" value="true">
    <button type="submit">Зарегистрироваться</button>
</form>