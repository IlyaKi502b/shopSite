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
  
      <main class="container mt-3">
          <h2 style="text-align: center;">Выберите поставщика</h2>
          <table class="table">
              <thead>
                <h5>Поставщик:</h5>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Название</th>
                  <th scope="col">Адресс</th>
                  <th scope="col">Телефон</th>
                  <th scope="col">Директор</th>
                  <th scope="col">Главный бухгалтер</th>
                  <th scope="col">Банковские реквизиты</th>
                  <th scope="col">ИНН</th>
                </tr>
              </thead>
              <?php $provider = mysqli_query($link, "SELECT * FROM `provider`");
              while ($pr = mysqli_fetch_assoc($provider))
              {
                ?>
                <form method="POST" action="postavFurn.php">
                    <tbody>
                        <tr>
                            <th scope="row"><?php $prId = $pr['provider_id']; echo $prId; ?></th>
                            <td><?php echo $pr['name'];?></td>
                            <td><?php echo $pr['adress'];?></td>
                            <td><?php echo $pr['phone'];?></td>
                            <td><?php echo $pr['director'];?></td>
                            <td><?php echo $pr['chief_accountant'];?></td>
                            <td><?php echo $pr['bank_requisites'];?></td>
                            <td><?php echo $pr['tin'];?></td>
                            <td><button type="submit" name="this" value="<?php echo $prId;?>">Выбрать этого</button></td>
                        </tr>
                    </tbody>
                </form>
                <?php
              }
              ?>
              
            </table>
          
            <a href="index.php">Вернуться на сайт</a>
      </main>
  
  
  
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      <script src="js\scriptZak.js"></script>
  </body>
  </html>