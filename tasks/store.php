<?php

require_once (__DIR__.'/../crest.php');

$result = CRest::call(
    'tasks.task.add',
    [
        'fields' => [
            'TITLE' => $_POST['title'],
            'RESPONSIBLE_ID' => 1
        ]
    ]
);
 
header('Location: index.php');
