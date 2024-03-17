<?php

$title = 'Создать пользователя';

ob_start();
?>

<h1><?= $title; ?></h1>

<form method="POST" action="index.php?page=users&action=store">
    <div class="form-group">
        <label for="username">Никнейм</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="confirm_password">Подтверждение пароля</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
    </div>
    <button type="submit" class="btn btn-primary">Создать</button>
</form>

<?php $content = ob_get_clean();
include 'app/views/layout.php';
?>