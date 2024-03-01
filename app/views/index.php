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

<?php
$content = ob_get_clean();
include 'app/views/layout.php';
?>