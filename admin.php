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
      <div class="container">
          <!-- <header class="blog-header py-3">
              <div class="row flex-nowrap justify-content-between align-items-center">
                  <div class="col">
                      <a href="admin.php" class="header-admin active">Заказы</a>
                  </div>
                  <div class="col">
                      <a href="postav.php" class="header-admin">Поставки</a>
                  </div>
                  <div class="col">
                      <a href="postav.php" class="header-admin">Отчеты</a>
                  </div>
                  <div class="col">
                    <a href="show.php" class="header-admin">Выставить товар</a>
                  </div>
                </div>
            </header> -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Хозяин</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Переключатель навигации">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="admin.php">Заказы</a>
                <a class="nav-link" href="postav.php">Поставки</a>
                <a class="nav-link" href="show.php">Выставить товар</a>
                <a class="nav-link" href="report.php">Отчеты</a>
                <!-- <a class="nav-link disabled">Отключенная</a> -->
              </div>
            </div>
          </div>
        </nav>
      </div>
  
      <main class="container mt-5">
          <h2 style="text-align: center;">Заказы</h2>
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Имя</th>
                  <th scope="col">Фамилия</th>
                  <th scope="col">Отчетство</th>
                  <th scope="col">Доставка</th>
                  <th scope="col">Адресс</th>
                  <th scope="col">Почта</th>
                  <th scope="col">Телефон</th>
                  <th scope="col">Дата доставки</th>
                  <th scope="col">Количество товара</th>
                  <th scope="col">Общая цена</th>
                  <th scope="col">Товар</th>
                  <th scope="col">Принять</th>
                  <th scope="col">Отклонить</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $user = mysqli_query($link, "SELECT * FROM `user`");
                while($us = mysqli_fetch_assoc($user))
                {
                  ?>
                  <form method="POST" action="zakaz.php?user=<?php echo $us['user_id'];?>">
                  <tr>
                  <th scope="row"><?php echo $us['user_id']; ?></th>
                  <td><?php echo $us['name'];?></td>
                  <td><?php echo $us['surname'];?></td>
                  <td><?php echo $us['patronymic'];?></td>
                  <td><?php echo $us['choice_of_dostavka'];?></td>
                  <td><?php echo $us['adress'];?></td>
                  <td><?php echo $us['mail'];?></td>
                  <td><?php echo $us['phone'];?></td>
                  <td><?php echo $us['date'];?></td>
                  <td><?php echo $us['count'];?> <input type="number" name="count" value="<?php echo $us['count'];?>" style="display:none;"></td>
                  <td><?php echo $us['price'];?></td>
                  <td><?php echo 'id = ' . $us['furniture_id'] . ' ';
                  $furniture = mysqli_query($link, "SELECT * FROM `furniture` WHERE `furniture_id` = " . $us['furniture_id'] . "");
                  $fur = mysqli_fetch_assoc($furniture);
                  echo $fur['name'];?>
                  <input type="number" name="furId" value="<?php echo $fur['furniture_id']; ?>" style="display:none;"></td>
                  <td style="cursor: pointer;"><button type="submit" name="but" value="Ок"><ion-icon name="checkmark-outline"></ion-icon></button></td>
                  <td style="cursor: pointer;"><button type="submit" name="but" value="Отмена"><ion-icon name="close-outline"></ion-icon></button></td>
                </form>
                </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
            <a href="index.php">Вернуться на сайт</a>
      </main>
  
  
  
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      <script src="js\scriptZak.js"></script>
  </body>
  </html>


