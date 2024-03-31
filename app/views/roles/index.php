<?php

$title = 'Роли';

ob_start();
?>

<div class="row justify-content-center mt-5">
    <div class="col-lg-6 col-md-8 col-sm-10">
        <h1><?= $title; ?></h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Роль</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Опции</th>
                </tr>
            </thead>
            <tbody>
               <?php foreach ($roles as $role): ?>
                <tr>
                    <th scope="row"><?= $role['id']; ?></th>
                    <td><?= $role['role_name']; ?></td>
                    <td><?= $role['role_description']; ?></td>
                    <td>
                        <a href="index.php?page=roles&action=edit&id=<?= $role['id']; ?>" class="btn btn-sm btn-outline-primary">Редактировать</a>
                        <!-- <form method="POST" action="index.php?page=roles&action=delete&id=<?= $role['id']; ?>" class="d-inline-block">
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
                        </form> -->
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $content = ob_get_clean();
include 'app/views/layout.php';
?>