<?php

$title = 'Регистрация';

ob_start();
?>

<div class="row justify-content-center mt-5">
    <div class="col-lg-6 col-md-8 col-sm-10">
        <h1 class="text-center mb-4"><?= $title; ?></h1>
        <form method="POST" action="index.php?page=auth&action=store">
            <div class="mb-3">
                <label for="username">Никнейм</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password">Подтверждение пароля</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
        <div class="mt-4">
            <p>Уже зарегистрированы? <a href="index.php?page=login">Войти</a></p>
        </div>
    </div>
</div>

<?php $content = ob_get_clean();
include 'app/views/layout.php';
?>