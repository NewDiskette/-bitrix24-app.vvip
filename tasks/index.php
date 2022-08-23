<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Bitrix24</title>
</head>
<body>

<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div>
          <ul class="row">
            <li class="mr-5">
              <a href="../index.php">Главная</a>
            </li>
            <li>
              <a href="#">Задачи</a>
            </li>
          </ul>
        </div>
    </nav>
</div>
<div class="container-fluid">
    <div class="row ml-3 mb-3">
        <h1>Задачи</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 ml-3 mb-3">
            <a href="create.php" class="btn btn-block btn-primary">
                Добавить
            </a>
        </div>
    </div>
</div>
<?php

require_once (__DIR__.'/../crest.php');

$result = CRest::call('tasks.task.list');

$tasks = $result['result']['tasks'];

?>

<?php foreach($tasks as $task): ?>
    <div class="container-fluid">
        <div class="row ml-3 mb-2"><?php echo $task['title']; ?></div>
    </div>
<?php endforeach; ?>

</body>
</html>