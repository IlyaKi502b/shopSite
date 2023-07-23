<?php
  session_start();
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
                  <div class="col-4 pt-1">
                      <a href="admin.php" class="header-admin">Заказы</a>
                  </div>
                  <div class="col-4 text-center">
                      <a href="postav.php" class="header-admin active">Поставки</a>
                  </div>
                  <div class="col-4 d-flex justify-content-end align-items-center">
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
                <a class="nav-link" aria-current="page" href="admin.php">Заказы</a>
                <a class="nav-link active" href="postav.php">Поставки</a>
                <a class="nav-link" href="show.php">Выставить товар</a>
                <a class="nav-link" href="report.php">Отчеты</a>
                <!-- <a class="nav-link disabled">Отключенная</a> -->
              </div>
            </div>
          </div>
        </nav>
      </div>
  
      <main class="container mt-5">
          <h2 style="text-align: center;">Поставки</h2>
          <?php
          if ($_SESSION['postavMessage'])
          {
            echo $_SESSION['postavMessage'];
          }
          unset($_SESSION['postavMessage']);
          ?>
          <?php 
          $count = mysqli_query($link, "SELECT * FROM `furniture` WHERE `warehouse_id` is NULL AND `employee_id` is NULL");
          if ( mysqli_num_rows($count) == 0)
          {
              echo 'Поставок пока нет.' . '<br>' . '<br>';
          }
          else{
          $furnitureP = mysqli_query($link, "SELECT * FROM `furniture` WHERE `warehouse_id` IS NULL AND `user_id` IS NULL AND `employee_id` IS NULL");
          while ($furP = mysqli_fetch_assoc($furnitureP))
          {
          $provider = mysqli_query($link, "SELECT * FROM `provider` WHERE `provider_id` = " . $furP['provider_id'] ."");
          while($pr = mysqli_fetch_assoc($provider))
          {
            ?>
            <form method="POST" action="postavSklad.php">
            <table class="table">
              <thead>
                <h5>Поставщик:</h5>
                <tr>
                  <th scope="col">Название</th>
                  <th scope="col">Адресс</th>
                  <th scope="col">Телефон</th>
                  <th scope="col">Директор</th>
                  <th scope="col">Главный бухгалтер</th>
                  <th scope="col">Банковские реквизиты</th>
                  <th scope="col">ИНН</th>
                </tr>
              </thead>
              <tbody>
                  <tr>
                  <td><?php $prId = $pr['provider_id'] ; echo $pr['name'];?></td>
                  <input type="text" name="prId" style="display: none;" value="<?php echo $prId;?>">
                  <td><?php echo $pr['adress'];?></td>
                  <td><?php echo $pr['phone'];?></td>
                  <td><?php echo $pr['director'];?></td>
                  <td><?php echo $pr['chief_accountant'];?></td>
                  <td><?php echo $pr['bank_requisites'];?></td>
                  <td><?php echo $pr['tin'];?></td>
                </tr>
              </tbody>
            </table>
            <table class="table">
                <thead>
                  <h5>Поставляет:</h5>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Название</th>
                    <th scope="col">Цвет</th>
                    <th scope="col">Тип</th>
                    <th scope="col">Количество</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $furniture = mysqli_query($link, "SELECT * FROM `furniture` WHERE `provider_id` = " . $pr['provider_id'] ." AND `employee_id` IS NULL");
                while($fur = mysqli_fetch_assoc($furniture))
                {
                  ?>
                    <input type="text" name="furId" style="display: none;" value="<?php echo $fur['furniture_id'];?>">
                    <tr>
                    <th scope="row"><?php echo $fur['furniture_id']; ?></th>
                    <td><?php echo $fur['name']; ?></td>
                    <td><?php echo $fur['color']; ?></td>
                    <td><?php echo $fur['type']; ?></td>
                    <td><?php echo $fur['count'];?>
                  </td>
                  </tr>
                  <?php
                }
                ?>
                    
                </tbody>
              </table>
              <table class="table">
                <thead>
                  <h5>Договор:</h5>
                  <tr>
                    <th scope="col">Номер:</th>
                    <th scope="col">Поставщик</th>
                    <th scope="col">Магазин</th>
                    <th scope="col">Дата заключения</th>
                    <th scope="col">Дата окончания действия</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Статус</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $contract = mysqli_query($link, "SELECT * FROM `contract` WHERE `provider_id` = " . $pr['provider_id'] ." AND `status` <> 'Принят'");
                  while($con = mysqli_fetch_assoc($contract))
                  {
                    ?>
                    <tr>
                    <td><?php echo $con['contract_id']; $conId = $con['contract_id'];?></td>
                    <input type="number" name="conId" style="display: none;" value="<?php echo $con['contract_id'];?>">
                    <td><?php echo $pr['name']?></td>
                    <td><?php $shop = mysqli_query($link, "SELECT * FROM `shop`"); 
                    $sh = mysqli_fetch_assoc($shop);
                    echo $sh['name'];
                    ?></td>
                    <td><?php echo $con['date_of_conclusion'];?></td>
                    <td><?php echo $con['date_of_expiration'];?></td>
                    <td><?php echo $con['short_text'];?></td>
                    <td><?php 
                    $dNow = date('d.m.Y');
                    $dNow = strtotime($dNow);
                    $doe = $con['date_of_expiration'];
                    $doe = strtotime($doe);
                    $diff = $doe - $dNow;
                    if($diff > 0)
                    {
                      //не истек срок действия
                      mysqli_query($link, "UPDATE `contract` SET `status` = 'Действителен' WHERE `contract_id` = " . $con['contract_id'] . "");
                    }else{
                      //истек срок действия
                      mysqli_query($link, "UPDATE `contract` SET `status` = 'Недействителен' WHERE `contract_id` = " . $con['contract_id'] . "");
                    }
                    echo $con['status'];
                    ?></td>
                  </tr>
                    <?php
                  }
                  ?>
                    
                </tbody>
              </table>
              <br>
              <p style="text-align: center;">
              <button type="submit" name="but" value="Ок">Ок</button> 
              <button type="submit" name="but" value="Отмена">Отмена</button> 
              </p>
            </form>
              <br>
              <br>
            <?php
          }
        }
        }
          ?>
          
          <div class="row justify-content-center align-items-center g-2">
            <div class="col">
            <a href="index.php">Вернуться на сайт</a>
            </div>
            <div class="col" style="text-align: end;">
            <a style="text-align: end;" href="postavZakaz.php">Оформить заказ</a>
            </div>
          </div>
            
      </main>
  
  
  
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      <script src="js\scriptZak.js"></script>
  </body>
  </html>