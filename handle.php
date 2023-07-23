<?php
require "includes\config.php";

$name = $_POST['name'];
$surname = $_POST['sur'];
$otch = $_POST['otch'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$radioB = $_POST['radioB'];
$adress = $_POST['adress'];
$date = $_POST['date'];
$count = $_POST['count'];
$price = $_POST['price'];
$furniture = $_POST['furId'];

if($radioB == 'Самовывоз')
{
    $adress = 'г. Санкт-Петербург, Невский пр-т, 114-116, ТК «Невский центр», 4 этаж';
}

// echo $name;
// echo '<br>';
// echo $surname;
// echo '<br>';
// echo $otch;
// echo '<br>';
// echo $phone;
// echo '<br>';
// echo $mail;
// echo '<br>';
// echo $radioB;
// echo '<br>';
// echo $adress;
// echo '<br>';
// echo $count;
// echo '<br>';
// echo $price;
// echo '<br>';
// echo $furniture;
// echo '<br>';

// mysqli_query($link, "INSERT INTO `user` (`user_id`,`name`, `surname`, `patronymic`, `choice_of_payment`, `adress`, `mail`, `phone`, `date`, `count`, `price`, `furniture_id`) VALUES (NULL, '$name', '$surname', '$otch', '$radioB', '$adress', '$mail', '$phone', '$date', '$count', '$price', '$furniture')");
mysqli_query($link, "INSERT INTO `user` (`user_id`,`name`, `surname`, `patronymic`, `choice_of_dostavka`, `adress`, `mail`, `phone`, `date`, `count`, `price`, `furniture_id`) VALUES (NULL, '$name', '$surname', '$otch', '$radioB', '$adress', '$mail', '$phone', '$date', '$count', '$price', '$furniture')");


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
</head>
<body>
<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-center align-items-center" align="center">
              <a class="blog-header-logo text-dark" href="index.php">ХОЗЯИН</a>
          </div>
      </header>
    </div>

    <main class="container mb-4">
        <p style="text-align: center;" >
            <h4>
                Заказ принят! В скором времени вам позвонят.
            </h4>
        </p>
        <a href="index.php">Вернуться на главную страницу</a>
    </main>
</body>
</html>
