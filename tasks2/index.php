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

$tasksBitrix = $result['result']['tasks'];

$sql = "SELECT * FROM `tasks`";
include 'connect.php';
$statement = $pdo->prepare($sql);
$statement->execute();

$tasksDB = $statement->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM `clients`";
include 'connect.php';
$statement = $pdo->prepare($sql);
$statement->execute();

$clients = $statement->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="container-fluid">
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название задачи</th>
            <th scope="col">Ссылка на Битрикс24</th>
            <th scope="col">Клиент</th>
            <th scope="col">Дедлайн</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($tasksDB as $taskDB): ?>
            <tr>
                <th scope="row">
                    <?php echo $taskDB['id']; ?>
                </th>
                <td><?php echo $taskDB['title']; ?></td>
                <td>
                    <?php 
                        $link_bitrix24 = "https://newdiskette.bitrix24.ru/company/personal/user/1/tasks/task/view/" . $taskDB['id_task_bitrix'];
                    ?>
                    <a href="<?php echo $link_bitrix24;?>"><?php echo $link_bitrix24;?></a>
                </td>
                <td>
                    <?php
                        foreach($clients as $client){
                            if($taskDB['client_id'] == $client['id']){
                                echo $client['name'];
                            } 
                        }
                    ?>
                </td>
                <td>
                    <?php
                        foreach($tasksBitrix as $taskBitrix){
                            if($taskDB['id_task_bitrix'] == $taskBitrix['id']){
                                echo $taskBitrix['deadline'];
                            }
                        }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
    
</body>
</html>