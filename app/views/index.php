<?php
if ($_SERVER['REQUEST_URI'] == '/mini_crm/index.php')
{
    header('Location: /mini_crm/');
    exit();
}


$title = "Главная страница";

ob_start();
?>

<h1><?= $title; ?></h1>
<p>Добро пожаловать на главную страницу!</p>

<?php
$content = ob_get_clean();
include 'app/views/layout.php';
?>