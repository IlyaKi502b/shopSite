<?php

$config = array(
    'title' => 'ХОЗЯИН', // ну думаю понятно, что название сайта
    'db' => array( //настройки базы данных
        'user' => 'root',
        'password' => '',
        'name' => 'furniture',
        'host' => 'localhost',
        'port' => 3310 
    )
);//будет хранится массив с настройками нашего вебсайта

require "includes\db.php";