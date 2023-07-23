<?php
session_start();
require "includes\config.php";



$login = $_POST['login'];
$password = $_POST['password'];

$count = mysqli_query($link, "SELECT * FROM `employee` WHERE `login` = '$login' AND `password` = '$password'");
if ( mysqli_num_rows($count) == 0)
{
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location: input.php');
    //echo 'Вы не зарегистрированы';
}
else {
  $employee = mysqli_fetch_assoc($count);
  $_SESSION['employee_id'] = $employee['employee_id'];
  $_SESSION['shop_id'] = $employee['shop_id'];
  header('Location: admin.php');
  }
?>


