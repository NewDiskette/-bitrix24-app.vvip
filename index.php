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
          <a href="#">Главная</a>
        </li>
        <li class="mr-5">
          <a href="tasks/index.php">Задачи</a>
        </li> 
        <li class="mr-5">
          <a href="tasks2/index.php">Задачи2</a>
        </li>
      </ul>
    </div>
</nav>

<?php

require_once (__DIR__.'/crest.php');
// require_once (__DIR__.'/functions.php');
// placementBind();
// placementUnbind();

$result = CRest::call('profile');

$profile = $result['result'];

?>

<div class="container-fluid">
    <div class="row ml-3 mb-2"><img src="<?php echo $profile['PERSONAL_PHOTO']; ?>" alt="personal_photo"></div>
</div>

</body>
</html>