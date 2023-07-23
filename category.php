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
  <?php include "includes\header.php";?>
  
  <!-- <div id="php">
    <div id="phpPop"> -->
   <?php $furniture = mysqli_query($link, "SELECT * FROM `furniture` WHERE `category_id` = " . (int) $_GET["category"]." AND `employee_id` IS NOT NULL ORDER BY `view` DESC");?>
    <!-- </div>
  </div> -->
  <?php

                  $p = $_POST["sort"];
                  $one = 'По популярности';
                  $two = 'По возрастанию цены';
                  $three = 'По убыванию цены';
                  $four = 'По новинкам';
                  $oneVal = 'Pop';
                  $twoVal = 'Rost';
                  $threeVal = 'NeRost';
                  $fourVal = 'New';

                  if($p == "Pop")
                  {
                    $furniture = mysqli_query($link, "SELECT * FROM `furniture` WHERE `category_id` = " . (int) $_GET["category"]." AND `employee_id` IS NOT NULL ORDER BY `view` DESC");
                    $one = 'По популярности';
                    $two = 'По возрастанию цены';
                    $three = 'По убыванию цены';
                    $four = 'По новинкам';
                    $oneVal = 'Pop';
                    $twoVal = 'Rost';
                    $threeVal = 'NeRost';
                    $fourVal = 'New';
                  }
                  else if($p == "Rost")
                  {
                    $furniture = mysqli_query($link, "SELECT * FROM `furniture` WHERE `category_id` = " . (int) $_GET["category"]." AND `employee_id` IS NOT NULL ORDER BY `price` ASC");
                    $one = 'По возрастанию цены';
                    $two = 'По популярности';
                    $three = 'По убыванию цены';
                    $four = 'По новинкам';
                    $oneVal = 'Rost';
                    $twoVal = 'Pop';
                    $threeVal = 'NeRost';
                    $fourVal = 'New';
                  }
                  else if($p == "NeRost")
                  {
                    $furniture = mysqli_query($link, "SELECT * FROM `furniture` WHERE `category_id` = " . (int) $_GET["category"]." AND `employee_id` IS NOT NULL ORDER BY `price` DESC");
                    $one = 'По убыванию цены';
                    $two = 'По возрастанию цены';
                    $three = 'По популярности';
                    $four = 'По новинкам';
                    $oneVal = 'NeRost';
                    $twoVal = 'Rost';
                    $threeVal = 'Pop';
                    $fourVal = 'New';
                  }
                  else if($p == "New")
                  {
                    $furniture = mysqli_query($link, "SELECT * FROM `furniture` WHERE `category_id` = " . (int) $_GET["category"]." AND `employee_id` IS NOT NULL ORDER BY `furniture_id` DESC");
                    $one = 'По новинкам';
                    $two = 'По возрастанию цены';
                    $three = 'По убыванию цены';
                    $four = 'По популярности';
                    $oneVal = 'New';
                    $twoVal = 'Rost';
                    $threeVal = 'NeRost';
                    $fourVal = 'Pop';
                  }
                
            ?>
    <main class="container">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
            <?php
                $category = mysqli_query($link,"SELECT * FROM `category` WHERE `category_id` = " . (int) $_GET['category'] . ""); 
                while($cat = mysqli_fetch_assoc($category))
                {
                  ?>
                  <h2 class="pb-4 fst-italic"><?php echo $cat['name'];?></h2>
                  <?php
                }
              ?>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <ion-icon name="funnel-outline" style="padding-right: 10px; scale: 1.2;"></ion-icon>
                <form method="POST" id="myForm" action="category.php?category=<?php echo $_GET['category'];?>">
                <!--  -->
                <select class="form-select" name="sort" required>
                <option disabled>Сортировать</option>
                <option  selected value="<?php echo $oneVal;?>"><?php echo $one;?></option>
                <option value="<?php echo $twoVal;?>"><?php echo $two;?></option>
                <option value="<?php echo $threeVal;?>"><?php echo $three;?></option>
                <option value="<?php echo $fourVal;?>"><?php echo $four;?></option>
                </select>
                <div class="invalid-feedback">
                    Пожалуйста, выберите сортировку.
                </div>
                <!-- <input type="submit" value="Подтвердить"> -->
                </form>
            </div>
            
        </div>
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <?php
          while($fur = mysqli_fetch_assoc($furniture))
          {
            ?>
            <div class="col p-4 d-flex flex-column position-static">

              <div class="card" style="width: 35rem;">
                <a href="product.php?furniture=<?php echo $fur['furniture_id'];?>">
                  <img src="<?php echo $fur['image'];?>" class="card-img-top" alt="..." >

                </a>
                  <div class="card-body">
                    <h4><span class="price" style="font-weight: bold; font-family: 'Times New Roman', Times, serif;"><?php echo number_format($fur['price'], 0,"."," ");?> ₽</span></h4>
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
    <script src="js\script.js"></script>
    <script src="C:\OSPanel\domains\furniture\js\script.js"></script>
    <script>
jQuery('document').ready(function(){
    const myForm = $("#myForm");
    jQuery('option').on('click', function(){
        myForm.submit();
    })
});
    </script>  
</body>
</html>