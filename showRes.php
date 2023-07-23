<?php 
session_start();
require "includes\config.php";

$employeeId = $_SESSION['employee_id'];

$furId = $_POST['but'];
$wrId = $_POST['wrId'];
$price = $_POST['furPrice'];

mysqli_query($link, "UPDATE `furniture` SET `employee_id` = $employeeId WHERE `furniture_id` = $furId ");
mysqli_query($link, "UPDATE `furniture` SET `price` = $price WHERE `furniture_id` = $furId ");

$furniture = mysqli_query($link, "SELECT * FROM `furniture` WHERE `furniture_id` = $furId AND `warehouse_id` = $wrId AND `employee_Id` = $employeeId");
$fur = mysqli_fetch_assoc($furniture);

$furCount = $fur['count'];

$warehouse = mysqli_query($link, "SELECT * FROM `warehouse` WHERE `warehouse_id` = $wrId");
$wr = mysqli_fetch_assoc($warehouse);

$wrOstatok = $wr['ostatok'];

$res = $wrOstatok + $furCount;

mysqli_query($link, "UPDATE `warehouse` SET `ostatok` = $res WHERE `warehouse_id` = $wrId ");

$_SESSION['message'] = 'Товар успешно выложен';

header('Location: show.php');





?>