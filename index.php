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
    <?php include "includes\header.php";?>

    <main class="container">
        <p style="text-align: center;">
        <img src="img\logo2.png" style="max-width: 800px; max-height: 800px;">
        </p>

        <br>
        <h2 class="pb-4 mb-4 fst-italic">Успейте купить!</h2>
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <?php 
            $furniture = mysqli_query($link, "SELECT * FROM `furniture` WHERE `employee_id` IS NOT NULL ORDER BY `count` ASC, `view` DESC LIMIT 6");
            while($fur = mysqli_fetch_assoc($furniture))
            {
              ?>
              <div class="col p-4 d-flex flex-column position-static">

              <div class="card" style="width: 35rem;">
                <a href="product.php?furniture=<?php echo $fur['furniture_id'];?>">
                  <img src="<?php echo $fur['image'];?>" class="card-img-top" alt="..." >

                </a>
                  <div class="card-body">
                  <div class="row flex-nowrap justify-content-between align-items-center">
                  <div class="col-4 pt-1">
                    <h4><span class="price" style="font-weight: bold; font-family: 'Times New Roman', Times, serif;"><?php echo number_format($fur['price'], 0,"."," ");?> ₽</span></h4>
                  </div>
                  <div class="col-4 d-flex justify-content-end align-items-center">
                    <h6 style="opacity: 0.6;">Осталось: <span class="price" style="font-weight: bold; font-family: 'Times New Roman', Times, serif;"><?php echo number_format($fur['count'], 0,"."," ");?></span></h6>
                  </div>
                  </div>
                    <h5 class="card-title"><?php echo $fur['name'];?></h5>
                    <p class="card-text"><?php  echo mb_substr(strip_tags($fur['text']), 0, 150, 'utf-8') . '...';?></p>
                    <div class="row flex-nowrap justify-content-between align-items-center">
                      <div class="col-4 pt-1">
                      <a href="making_an_order.php?furniture=<?php echo $fur['furniture_id'];?>" class="btn btn-dark">Оформить заказ</a>
                      </div>
                      <!-- <div class="col-4 d-flex justify-content-end align-items-center">
                          <a class="icons-card" href=""> <ion-icon name="heart-outline"></ion-icon> </a>
                      </div> -->
                    </div>
                    
                  </div>
              </div>

              </div>
              <?php
            }
            ?>
        </div>
    </main>
    <?php include "includes/footer.php";?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>