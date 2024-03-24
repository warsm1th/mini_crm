<?php

$title = 'Войти';

ob_start();
?>

<div class="row justify-content-center mt-5">
    <div class="col-lg-6 col-md-8 col-sm-10">
        <h1 class="text-center mb-4"><?= $title; ?></h1>
        <form method="POST" action="index.php?page=auth&action=authenticate">
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" id="remember" class="form-check-input" name="remember">
                <label for="remember" class="form-check-label">Запомнить</label>
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
        <div class="mt-3 text-center">
            <p>Нет аккаунта? <a href="index.php?page=register">Зарегистрироваться</a></p>
        </div>
    </div>
</div>

<?php $content = ob_get_clean();
include 'app/views/layout.php';
?>