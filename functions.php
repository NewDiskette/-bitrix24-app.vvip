<?php

function placementBind(){
    $result = CRest::call(
   'placement.bind',
   [
      'PLACEMENT' => 'TASK_VIEW_TAB',
      'HANDLER' => 'https://www.newdiskette.ru/php/bitrix24/tasks2/index.php',
      'LANG_ALL' => [
         'en' => [
            'TITLE' => 'task list',
            'DESCRIPTION' => 'description',
            'GROUP_NAME' => 'group',
         ],
         'ru' => [
            'TITLE' => 'список задач',
            'DESCRIPTION' => 'описание',
            'GROUP_NAME' => 'группа',
         ],
        ],
    ]
  );

  echo '<pre>';
    print_r($result);
  echo '</pre>';
}

function placementUnbind(){

    $result = CRest::call(
       'placement.unbind',
       [
          'PLACEMENT' => 'TASK_VIEW_TAB',
          'HANDLER' => 'https://www.newdiskette.ru/php/bitrix24//tasks2/app_vvip.php',
          
       ]
    );

  echo '<pre>';
    print_r($result);
  echo '</pre>';
}