<?php ?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="index.php" class="navbar-brand">Mini CRM</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="navbar-item">
                        <a href="index.php?page=users" class="nav-link">Пользователи</a>
                    </li>
                    <li class="navbar-item">
                        <a href="index.php?page=register" class="nav-link">Зарегистрироваться</a>
                    </li>
                    <li class="navbar-item">
                        <a href="index.php?page=login" class="nav-link">Войти</a>
                    </li>
                    <li class="navbar-item">
                        <a href="index.php?page=logout" class="nav-link">Выйти</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container mt-4">
            <?= $content; ?>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
