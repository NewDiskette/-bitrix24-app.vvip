<?php

if($_POST['PLACEMENT_OPTIONS']){
    $id_task_bitrix = (int)mb_substr($_POST['PLACEMENT_OPTIONS'], 11, 3);
    file_put_contents('id_task_bitrix.txt', $id_task_bitrix);
}else{
    $id_task_bitrix = (int)file_get_contents('id_task_bitrix.txt');
}

$sql = "SELECT * FROM `tasks` WHERE `id_task_bitrix` = $id_task_bitrix";
include 'connect.php';
$statement = $pdo->prepare($sql);
$statement->execute();

$taskDB = $statement->fetch(PDO::FETCH_ASSOC);

$client_id = $taskDB['client_id'];

$sql = "SELECT `name` FROM `clients` WHERE `id` = $client_id";
include 'connect.php';
$statement = $pdo->prepare($sql);
$statement->execute();

$clientDB = $statement->fetch(PDO::FETCH_ASSOC);

?>

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
    <h1 class="mb-3 center">Задача</h1>    
</div>    

<div class="container-fluid">
<table class="table md-7">
    <thead>
        <tr>
            <th scope="col">Поле</th>
            <th scope="col">Значение</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Клиент</td>
            <td><?php echo $clientDB['name'];?></td>
        </tr>
        <tr>
            <td>Оценка от спеца</td>
            <td>
                <form action="handler.php" method="post">
                    <div class="form-group">
                        <input 
                            type="text" class="form-control" 
                            id="expert_rating" name="expert_rating" 
                            value="<?php echo $taskDB['expert_rating'];?>"
                        >
                    </div>
                    <button type="submit" class="btn btn-primary" 
                        value="<?php echo $id_task_bitrix; ?>" 
                        name="id_task_bitrix">
                        Изменить
                    </button>
                </form>
            </td>
        </tr>
        <tr>
            <td>Общее время</td>
            <td>
                <?php 
                    $total_time = $taskDB['expert_rating'] * 1.5;
                    echo $total_time;
                ?>
            </td>
        </tr>
        <tr>
            <td>Ставка часа</td>
            <td>
                <form action="handler.php" method="post">
                    <div class="form-group">
                        <input 
                            type="text" class="form-control" 
                            id="hour_price" name="hour_price" 
                            value="<?php echo $taskDB['hour_price'];?>"
                        >
                    </div>
                    <button type="submit" class="btn btn-primary"
                        value="<?php echo $id_task_bitrix; ?>" 
                        name="id_task_bitrix">
                        Изменить
                    </button>
                </form>
            </td>
        </tr>
        <tr>
            <td>Стоимость задачи</td>
            <td>
                <?php 
                    $task_price = $total_time * $taskDB['hour_price'];
                    echo $task_price;
                ?>
            </td>
        </tr>
    </tbody>
</table>
</div>

</body>
</html>

