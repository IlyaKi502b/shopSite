<?php
  require "includes\config.php";
  
  // echo $_POST['but'];
  $button = $_POST['but'];
  // echo '<br>';
  // echo $_POST['prId'];
  $provider = $_POST['prId'];
  // echo '<br>';
  // echo $_POST['furId'];
  $furId = $_POST['furId'];

  $conId = $_POST['conId'];

  if ($button == 'Ок'){
    mysqli_query($link, "UPDATE `contract` SET `status` = 'Принят' WHERE `contract_id` = $conId");
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
      <main class="container mt-2">
        <h3 style="text-align: center;">Выбор склада: </h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Всего места</th>
                <th scope="col">Осталось</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $warehouse = mysqli_query($link, "SELECT * FROM `warehouse` ");
              while($war = mysqli_fetch_assoc($warehouse))
              {
                ?>
                  <form method="GET" action="postavSklad.php">
                  
                  <tr>
                  <th scope="row"><?php echo $war['warehouse_id'];?></th>
                  <td><?php echo $war['allCount'];?></td>
                  <td><?php echo $war['ostatok'];?><input type="number" name="provId" value="<?php echo $provider;?>" style="display:none;">
                  <input type="number" name="furnId" value="<?php echo $furId;?>" style="display:none;"></td>
                  
                  <td><button type="submit" name="this" value="<?php echo $war['warehouse_id'];?>">Выбрать этот</button></td>
                  </tr>
                  </form>
                <?php
              }
              ?>   
            </tbody>
          </table>
      </main>
  
  
  
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      <script src="js\scriptZak.js"></script>
  </body>
  </html>
    <?php
  }
  else if($button == 'Отмена')
  {
    mysqli_query($link,"DELETE FROM `provider` WHERE `provider`.`provider_id` = $provider");
    mysqli_query($link,"DELETE FROM `contract` WHERE `provider_id` = $provider");
    mysqli_query($link,"DELETE FROM `furniture` WHERE `provider_id` = $provider AND `warehouse_id` IS NULL AND `employee_id` IS NULL");
    echo 'Поставка отменена';
    echo '<br>';
    echo '<a href="postav.php">Вернуться назад</a>';
  }
  else{
    // echo $_GET['this'];
    $whId = $_GET['this'];
    $provId = $_GET['provId'];
    $furnId = $_GET['furnId'];
    // echo '<br>';
    // echo $provId . ' это provId';
    mysqli_query($link, "UPDATE `furniture` SET `warehouse_id` = $whId WHERE `provider_id` = $provId AND `warehouse_id` IS NULL");

    $furniture =  mysqli_query($link, "SELECT * FROM `furniture` WHERE `furniture_id` = $furnId AND `warehouse_id` = $whId AND `provider_id` = $provId ");
    $fur = mysqli_fetch_assoc($furniture);
    // echo $fur['count'];
    $furCount = $fur['count'];

    $warehouse = mysqli_query($link, "SELECT * FROM `warehouse` WHERE `warehouse_id` = $whId");
    $war = mysqli_fetch_assoc($warehouse);
    $warAllCount = $war['allCount'];
    $ostatok = $warAllCount - $furCount;

    mysqli_query($link, "UPDATE `warehouse` SET `ostatok` = $ostatok WHERE `warehouse_id` = $whId");
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
      <main class="container mt-2">
      <p style="text-align: center; font-size: 34px;">Товар принят на склад</p>
      <br>
      <a href="postav.php">Вернуться назад</a>
      </main>
  
  
  
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      <script src="js\scriptZak.js"></script>
  </body>
  </html>
    <?

  }

  
?>
  


