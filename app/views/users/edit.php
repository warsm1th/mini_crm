<?php

$title = 'Редактировать пользователя';

ob_start();
?>

<h1><?= $title; ?></h1>

<form method="POST" action="index.php?page=users&action=update&id=<?=$user['id'];?>">
    <div class="mb-3">
        <label for="username" class="form-label">Никнейм</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'];?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'];?>" required>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" id="email_verification" class="form-check-input" name="email_verification" <?= $user['email_verification'] ? 'checked': '';?>>
        <label for="email_verification" class="form-check-label">Email подтвержден</label>
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Роль</label>
        <select class="form-control" name="role" id="role">
            <option value="1"<?= $user['role'] == 1 ? 'selected' : ''; ?>>Пользователь</option>
            <option value="2"<?= $user['role'] == 2 ? 'selected' : ''; ?>>Модератор</option>
            <option value="3"<?= $user['role'] == 3 ? 'selected' : ''; ?>>Администратор</option>
        </select>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" id="is_active" class="form-check-input" name="is_active" <?= $user['is_active'] ? 'checked': '';?>>
        <label for="is_active" class="form-check-label">Активен</label>
    </div>
    <button type="submit" class="btn btn-primary">Подтвердить</button>
</form>

<?php $content = ob_get_clean();
include 'app/views/layout.php';
?>