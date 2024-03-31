<?php

$title = 'Редактировать пользователя';

ob_start();
?>

<div class="row justify-content-center mt-5">
    <div class="col-lg-6 col-md-8 col-sm-10">
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
                    <?php foreach($roles as $role): ?>
                        <option value="<?= $role['id']; ?>" <?= $user['role'] == $role['id'] ? 'selected' : ''; ?>><?= $role['role_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" id="is_active" class="form-check-input" name="is_active" <?= $user['is_active'] ? 'checked': '';?>>
                <label for="is_active" class="form-check-label">Активен</label>
            </div>
            <button type="submit" class="btn btn-primary">Подтвердить</button>
        </form>
    </div>
</div>

<?php $content = ob_get_clean();
include 'app/views/layout.php';
?>