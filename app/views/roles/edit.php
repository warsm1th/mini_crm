<?php

$title = 'Редактировать роль';

ob_start();
?>

<div class="row justify-content-center mt-5">
    <div class="col-lg-6 col-md-8 col-sm-10">
        <h1><?= $title; ?></h1>
        <form method="POST" action="index.php?page=roles&action=update">
            <input type="hidden" name="id" value="<?= $role['id']; ?>">
            <div class="mb-3">
                <label for="role_name">Роль</label>
                <input type="text" class="form-control" id="role_name" name="role_name" required>
            </div>
            <div class="mb-3">
                <label for="role_description">Описание роли</label>
                <input type="text" class="form-control" id="role_description" name="role_description" required>
            </div>
            <button type="submit" class="btn btn-primary">Редактировать</button>
        </form>
    </div>
</div>

<?php $content = ob_get_clean();
include 'app/views/layout.php';
?>