<?php

$title = 'Список пользователей';

ob_start();
?>
<h1>Список пользователей</h1>
<a href="#" class="btn btn-success">Создать пользователя</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Логин</th>
            <th scope="col">Админ</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Опции</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <th scope="row"><?php echo $user['id']; ?></th>
            <td><?php echo $user['login']; ?></td>
            <td><?php echo $user['is_admin'] ? 'Да':'Нет'; ?></td>
            <td><?php echo $user['created_at']; ?></td>
            <td>
                <a href="index.php?page=users&action=edit&id=<?php echo $user['id']; ?>" class="btn btn-primary">Редактировать</a>
                <a href="index.php?page=users&action=delete&id=<?php echo $user['id']; ?>" class="btn btn-danger">Удалить</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php $content = ob_get_clean();
include 'app/views/layout.php';
?>