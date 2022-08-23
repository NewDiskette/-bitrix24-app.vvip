<?php

require_once (__DIR__.'/../crest.php');

$title = $_POST['title'];
$client_id = $_POST['client_id'];
$business_task = $_POST['business_task'];

date_default_timezone_set('Asia/Yekaterinburg');
$date = getdate();

if ($date['wday'] != 5 && $date['wday'] != 6)
{
    $date['mday'] += 1;
}
else if ($date['wday'] == 5)
{
    $date['mday'] += 3;
}
else
{
    $date['mday'] += 2;
}

$deadline = $date['mday'] . '-' . $date['mon'] . '-' . $date['year'] . ' ' . '17:00';
print_r($deadline); 

$result = CRest::call(
    'tasks.task.add',
    [
        'fields' => [
            'TITLE' => $title,
            'RESPONSIBLE_ID' => 1,
            'DEADLINE' => $deadline,
            'DESCRIPTION' => $business_task,
        ]
    ]
);

echo '<pre>';
print_r($result['result']['task']['id']);
echo '</pre>';

$id_task_bitrix = (int)$result['result']['task']['id'];
echo gettype($id_task_bitrix);

echo '<pre>';
print_r($id_task_bitrix);
echo '</pre>';

$sql = "INSERT INTO `tasks` (`title`, `client_id`, `business_task`, `id_task_bitrix`) VALUES (:title, :client_id, :business_task, :id_task_bitrix)";
include 'connect.php';
$statement = $pdo->prepare($sql);
$statement->bindParam(":title", $title);
$statement->bindParam(":client_id", $client_id);
$statement->bindParam(":business_task", $business_task);
$statement->bindParam(":id_task_bitrix", $id_task_bitrix);
$statement->execute();

header('Location: index.php');
