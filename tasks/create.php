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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div>
      <ul class="row">
        <li class="mr-5">
          <a href="../index.php">Главная</a>
        </li>
        <li>
          <a href="index.php">Задачи</a>
        </li>
      </ul>
    </div>
</nav>

<div class="row ml-3 mb-3">
    <h1>Добавление задачи</h1>
</div>


<?php

require_once (__DIR__.'/../crest.php');

$result = CRest::call('tasks.task.list');

?>


<div class="row">
    <div class="col-12">
        <form action="store.php" method="POST" class="w-25">
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Название задачи">
            </div>
            <input type="submit" class="btn btn-primary" value="Добавить">
        </form>
    </div>
</div>

</body>
</html>
