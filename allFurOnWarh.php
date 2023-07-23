<?php
require "includes\config.php";
$count = mysqli_query($link, "SELECT * FROM `furniture`");
echo mysqli_num_rows($count);
$c = mysqli_fetch_assoc($count);
echo $c['id'];
?>


<!DOCTYPE html>
  <html lang="ru">
  <head>
      <meta charset="UTF-8">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
      <!-- <link href="css/main.css" rel="stylesheet"> -->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

      <script src="js\jquery-3.6.4.min.js"></script>
      <style type="text/css">
        body{font-family: DejaVu Sans;}
      </style>
  
      <title>Магазин мебели Хозяин</title>
  </head>
  <body>
    <main class="container mt-1" style="text-align: center; vertical-align:middle; justify-content: center; align-items: center;">
        
        <h3>Количество продаваемого товара</h3>

        <table class="table">
            <thead>
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
                  <tbody>
                      <tr>
                          <th scope="row">1</th>
                          <td><?php echo mysqli_num_rows($count);?></td>
                          <td>Имя</td>
                          <td>Имя</td>
                          <td>Имя</td>
                          <td>Имя</td>
                          <td>Имя</td>
                          <td>Имя</td>
                      </tr>
                      <tr>
                          <th scope="row">1</th>
                          <td>Имя</td>
                          <td>Имя</td>
                          <td>Имя</td>
                          <td>Имя</td>
                          <td>Имя</td>
                          <td>Имя</td>
                          <td>Имя</td>
                      </tr>
                      <tr>
                          <th scope="row">1</th>
                          <td>Имя</td>
                          <td>Имя</td>
                          <td>Имя</td>
                          <td>Имя</td>
                          <td>Имя</td>
                          <td>Имя</td>
                          <td>Имя</td>
                      </tr>
                      <tr>
                          <th scope="row">1</th>
                          <td>Имя</td>
                          <td>Имя</td>
                          <td>Имя</td>
                          <td>Имя</td>
                          <td>Имя</td>
                          <td>Имя</td>
                          <td>Имя</td>
                      </tr>
                  </tbody>
          </table>
        

    </main>
  </body>
</html>