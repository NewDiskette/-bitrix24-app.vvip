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
              <a href="index.php">Задачи</a>
            </li>
          </ul>
        </div>
    </nav>
</div>

<div class="container-fluid">
    <div class="row ml-3 mb-3">
        <h1>Добавление задачи</h1>
    </div>
</div>

<?php

$sql = "SELECT * FROM `clients`";
include 'connect.php';
$statement = $pdo->prepare($sql);
$statement->execute();

$clients = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container-fluid">

    <form action="store.php" method="POST" class="w-25">
        
        <div class="form-group mb-3">
            <label class="my-1 mr-4" for="client_id">Клиент</label>
            <select required class="custom-select" size="4"  id="client_id" name="client_id">
                <?php foreach($clients as $client):?>
                    <option value="<?php echo $client['id'];?>">
                    <?php echo $client['name'];?>    
                    </option>
                <?php endforeach;?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="title">Название</label>
            <input required type="text" class="form-control" id="title" name="title">
        </div>
        
        <div class="form-group">
            <label for="business_task">Бизнес-задача</label>
            <textarea required class="form-control" id="business_task" name="business_task" rows="5"></textarea>
        </div>

        <input type="submit" class="btn btn-primary" value="Сохранить">
        
    </form>

</div>
</body>
</html>
