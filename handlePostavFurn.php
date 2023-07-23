<?php
session_start();
require "includes\config.php";

$path = 'img/' . time() . $_FILES['img']['name'];
move_uploaded_file($_FILES['img']['tmp_name'], $path);

$name = $_POST['name'];
$category = $_POST['category'];
$more = $_POST['more'];
$price = $_POST['price'];
$color = $_POST['color'];
$type = $_POST['type'];
$size = $_POST['size'];
$count = $_POST['count'];
$prId = $_POST['but'];
$shopId = $_SESSION['shop_id'];
$date_of_conclusion = date('d.m.Y');
$dc = strtotime($date_of_conclusion);
$de = $dc + (86400*30);
$date_of_expiration = date('d.m.Y', $de);
$short_text = 'Поставка '. $count .' штук ' . $name;

mysqli_query($link,"INSERT INTO `furniture` (`name`, `text`, `image`, `price`, `color`, `type`, `size`, `count`, `view`, `category_id`, `provider_id`) VALUES ('$name', '$more', '$path', '$price', '$color', '$type', '$size', '$count', '0', '$category', '$prId')");
mysqli_query($link,"INSERT INTO `contract` (`provider_id`, `shop_id`, `date_of_conclusion`, `date_of_expiration`, `short_text`, `status`) VALUES ('$prId', '$shopId', CURDATE(), DATE_ADD(CURDATE(), INTERVAL 31 DAY), '$short_text', 'Действителен')");


$_SESSION['postavMessage'] = "<script>alert('Заказ подтвержден')</script>";
header('Location: postav.php');
?>

<pre>
</pre>