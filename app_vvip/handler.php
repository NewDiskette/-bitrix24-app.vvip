<?php

$id_task_bitrix = $_POST['id_task_bitrix'];

function editField($field, $value, $id_task_bitrix){
    $sql = "UPDATE `tasks` SET $field = $value WHERE `id_task_bitrix` = $id_task_bitrix";
    include 'connect.php';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    echo $sql;
}


if ($_POST['expert_rating']){
    $field = 'expert_rating';
    $value = $_POST['expert_rating'];
    editField($field, $value, $id_task_bitrix);    
}


if ($_POST['hour_price']){
    $field = 'hour_price';
    $value = $_POST['hour_price'];
    editField($field, $value, $id_task_bitrix);
}


header('Location: index.php');
