<?php

$title = 'Редактировать пользователя';

ob_start();
?>

<h1><?= $title; ?></h1>

<form method="POST" action="index.php?page=users&action=update&id=<?=$user['id'];?>">
    <div class="form-group">
        <label for="login">Логин</label>
        <input type="text" class="form-control" id="login" name="login" value="<?= $user['login'];?>" required>
    </div>
    <div class="form-group">
        <label for="is_admin">Администратор</label>
        <input type="checkbox" id="is_admin" name="is_admin" <?= $user['is_admin'] ? 'checked': '';?>>
    </div>
    <button type="submit" class="btn btn-primary">Подтвердить</button>
</form>

<?php $content = ob_get_clean();
include 'app/views/layout.php';
?>