<?php

$title = 'Список пользователей';

ob_start();
?>

<h1><?= $title; ?></h1>

<a href="index.php?page=users&action=create" class="btn btn-success">Создать пользователя</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Никнейм</th>
            <th scope="col">Email</th>
            <th scope="col">Email подтвержден</th>
            <th scope="col">Админ</th>
            <th scope="col">Роль</th>
            <th scope="col">Активен</th>
            <th scope="col">Последний визит</th>
            <th scope="col">Опции</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <th scope="row"><?= $user['id']; ?></th>
            <td><?= $user['username']; ?></td>
            <td><?= $user['email']; ?></td>
            <td><?= $user['email_verification'] ? 'Да':'Нет'; ?></td>
            <td><?= $user['is_admin'] ? 'Да':'Нет'; ?></td>
            <td><?= $user['role']; ?></td>
            <td><?= $user['is_active'] ? 'Да':'Нет'; ?></td>
            <td><?= $user['last_login']; ?></td>
            <td>
                <a href="index.php?page=users&action=edit&id=<?= $user['id']; ?>" class="btn btn-primary">Редактировать</a>
                <a href="index.php?page=users&action=delete&id=<?= $user['id']; ?>" class="btn btn-danger">Удалить</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php $content = ob_get_clean();
include 'app/views/layout.php';
?>