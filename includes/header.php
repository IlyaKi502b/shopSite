<div class="container">

    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
              <a class="link-secondary" href="aboutUs.php">О нас</a>
            </div>
            <div class="col-4 text-center">
              <a class="blog-header-logo text-dark" href="index.php"><?php echo $config['title']?></a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
              <!-- <a class="icons-header" href="favourites.html"> <ion-icon name="heart"></ion-icon> </a>
              <a class="icons-header" href="basket.html"> <ion-icon name="cart"></ion-icon> </a> -->
              <a class="link-secondary" href="spravka.php">Справка</a>
            </div>
          </div>
      </header>

    <?php
        $category_of_category_q = mysqli_query($link, "SELECT * FROM `category_of_category`");
        $category_of_category = array();
        while ( $cat_cat = mysqli_fetch_assoc($category_of_category_q) )
        {
            $category_of_category[] = $cat_cat;
        }
    ?>
      <div class="row g-0 flex-md-row mb-3 shadow-sm h-md-250 position-relative">

      <?php
        foreach($category_of_category as $cat_cat)
    {
      ?>
        <div class="col p-3 d-flex flex-column position-static">
        <div class="dropdown">
        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $cat_cat['name'];?>
        </a>
      
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <?php $category = mysqli_query($link,"SELECT * FROM `category` WHERE `category_of_category_id` = " . (int) $cat_cat['category_of_category_id'] . ""); 
            while($cat = mysqli_fetch_assoc($category))
            {
            ?>
          <li><a class="dropdown-item" href="category.php?category=<?php echo $cat['category_id']?>"><?php echo $cat['name'];?></a></li>
          <?php
            }
            ?>
        </ul>
      </div>
        </div>
        <?php
    }
        ?>

        <!-- <div class="col p-3 d-flex flex-column position-static">
        <div class="dropdown">
        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Кровати и матрасы
        </a>
      
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="#">Действие</a></li>
          <li><a class="dropdown-item" href="#">Другое действие</a></li>
          <li><a class="dropdown-item" href="#">Что-то еще здесь</a></li>
        </ul>
      </div>
        </div>

        <div class="col p-3 d-flex flex-column position-static">
        <div class="dropdown">
        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Шкафы и стеллажи
        </a>
      
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="#">Действие</a></li>
          <li><a class="dropdown-item" href="#">Другое действие</a></li>
          <li><a class="dropdown-item" href="#">Что-то еще здесь</a></li>
        </ul>
      </div>
        </div>

        <div class="col p-3 d-flex flex-column position-static">
        <div class="dropdown">
        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Комод и тумбы
        </a>
      
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="#">Действие</a></li>
          <li><a class="dropdown-item" href="#">Другое действие</a></li>
          <li><a class="dropdown-item" href="#">Что-то еще здесь</a></li>
        </ul>
      </div>
        </div>

        <div class="col p-3 d-flex flex-column position-static">
        <div class="dropdown">
        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Столы и стулья
        </a>
      
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="#">Действие</a></li>
          <li><a class="dropdown-item" href="#">Другое действие</a></li>
          <li><a class="dropdown-item" href="#">Что-то еще здесь</a></li>
        </ul>
      </div>
        </div>

        <div class="col p-3 d-flex flex-column position-static">
        <div class="dropdown">
        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Ковры и текстиль
        </a>
      
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="#">Действие</a></li>
          <li><a class="dropdown-item" href="#">Другое действие</a></li>
          <li><a class="dropdown-item" href="#">Что-то еще здесь</a></li>
        </ul>
      </div>
        </div> -->

    </div>

      <!-- <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 link-secondary" href="#">Диваны и кресла</a>
          <a class="p-2 link-secondary" href="#">Кровати и матрасы</a>
          <a class="p-2 link-secondary" href="#">Шкафы и стеллажи</a>
          <a class="p-2 link-secondary" href="#">Комод и тумбы</a>
          <a class="p-2 link-secondary" href="#">Столы и стулья</a>
          <a class="p-2 link-secondary" href="#">Ковры и текстиль</a>
        </nav>
      </div> -->

    </div>