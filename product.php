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

    <title>Магазин мебели Хозяин</title>
</head>
<body>
    <?php include "includes\header.php" ?>

    <main class="container">

      <?php
      
      $furniture = mysqli_query($link, "SELECT * FROM `furniture` WHERE `furniture_id` = " . (int) $_GET['furniture']);
      mysqli_query($link, "UPDATE `furniture` SET `view` = `view` + 1 WHERE `furniture_id` = " . (int) $_GET['furniture']);
      while($fur = mysqli_fetch_assoc($furniture))
      {
        ?>
        <h2 class="pb-4 fst-italic"><?php echo $fur['name'];?></h2>
        <!-- <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"> -->
        <div class="row g-5">
            <div class="col-md-8">
                <img src="<?php echo $fur['image'];?>" class="card-img-top mb-4" alt="..." style="height: 500px; width: auto; max-width: 1000px;">
                
            </div>
            <div class="col-md-4 bg-light rounded" style="height: 500px;">
                <h1><span class="price" style="font-weight: bold; font-family: 'Times New Roman', Times, serif;"><?php echo number_format($fur['price'], 0,"."," ");?> ₽</span></h1>
                <h4><?php echo $fur['name'];?></h4>
                <p><?php echo $fur['type'];?></p>
                <p>Цвет: <?php echo $fur['color'];?></p>
                <p>Осталось: <?php echo $fur['count'];?></p>
                <br>
                <p style="text-align: center;">
                  <a href="making_an_order.php?furniture=<?php echo $fur['furniture_id'];?>">
                    <button type="button" class="btn btn-dark" style="width: 10rem;">Оформить заказ</button>
                  </a>
                </p>
                <!-- <button type="button" class="btn btn-dark"><ion-icon name="heart" style="scale:1.7;"></ion-icon></button> -->
            </div>
        </div>
        <h3 class="mb-4">Характеристики</h3>
                <p class="mb-4"><?php echo $fur['text'];?></p>
        <h5 class="mb-4">Размеры</h5>
        <p class="mb-4"><?php echo $fur['size'];?></p>
        <?php
      }
      ?>


        <!-- </div> -->
    </main>


    <?php include "includes/footer.php";?>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>