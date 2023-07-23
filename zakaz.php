<?php 

require "includes\config.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="js\jquery-3.6.4.min.js"></script>

    <title>Магазин мебели Хозяин</title>
</head>
<body>
<br>
    <br>
    <br>
<?php

$perem = $_POST['but'];

$count = $_POST['count'];

$furId = $_POST['furId'];

if($perem == 'Ок')
{
    $furnitureUs = mysqli_query($link, "SELECT * FROM `furniture` WHERE `furniture_id` = $furId");
    $furUs = mysqli_fetch_assoc($furnitureUs);

    $name = $furUs['name'];
    $price = $furUs['price'];
    $color = $furUs['color'];
    $type = $furUs['type'];
    $size = $furUs['size'];
    $furnUsId = $furUs['furniture_id'];

    mysqli_query($link, "INSERT INTO `sales` (`name`, `price`, `color`, `type`, `size`, `count`, `furniture_id`) VALUES ('$name', '$price','$color', '$type', '$size', '$count', '$furnUsId')");

    mysqli_query($link,"DELETE FROM `user` WHERE `user`.`user_id` = " . (int) $_GET['user'] . "");

    $furniture =  mysqli_query($link, "SELECT * FROM `furniture` WHERE `furniture_id` = " . $furId . "");
    $fur = mysqli_fetch_assoc($furniture);


    $furCount = $fur['count'];

    $result = $furCount - $count;

    if($result > 0)
    {
        mysqli_query($link, "UPDATE `furniture` SET `count` = " . $result . " WHERE `furniture_id` = " . $furId . "");
    }
    else if ($result == 0)
    {
        mysqli_query($link,"DELETE FROM `furniture` WHERE `furniture`.`furniture_id` = " . $furId . "");
    }
    ?>
    <p style="text-align: center; font-size: 34px;"> Заказ успешно принят </p>
    <?php
}
else{
    mysqli_query($link,"DELETE FROM `user` WHERE `user`.`user_id` = " . (int) $_GET['user'] . "");
    ?>
    <p style="text-align: center; font-size: 34px;"> Заказ отменен </p>
    <?php
}
?>
<p style="text-align: center;">
<a href="admin.php"> Вернуться назад</a>
</p>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

