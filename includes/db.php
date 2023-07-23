<?php
//в php есть четыре вида включения : include, include_once, require, require_once.
//include просто подключает файл, если этот файл не был найден, то он просто выведет сообщение с ошибкой, о том что этот файл не был найден и продолжит дальшше исполнение скрипта
//include_once работает точно также, но если этот файл был ранее подключен, она его не подключит (WTF)? ничего на экран не выведет и не подключит
//require если файл не был найден, то выдаст фатальную ошибку и закончит исполнение скрипта.
//забавный факт include - подключить, а require - требовать. (в переводе с английского)
//require_once "includes\config.php"; 

//$user = 'root';
//$password = 'root';
//$db = 'test_db';
//$host = 'localhost';
//$port = 3307;


$link = mysqli_init();
$success = mysqli_real_connect(
   $link,
   $config['db']['host'],//$host,
   $config['db']['user'],//$user,
   $config['db']['password'],//$password,
   $config['db']['name'],//$db,
   $config['db']['port']//$port
);

if ($link == False)
{     
    echo "Все плохо давай по новой";
} 