<?php 
session_start();
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
<body class="text-center"style="display: flex;
align-items: center;
padding-top: 40px;
padding-bottom: 40px;">
    <main class="form-signin">
        <form method="POST" action="handleForAdmin.php">
            <a href="index.html"><img class="mb-4" src="img\logoSmall.png" alt="" width="72" height="72"></a>
          
          <h1 class="h3 mb-3 fw-normal">Вход</h1>
          <div class="form-floating">
            <input type="text" name="login" required="required" class="form-control" id="floatingInputEmail" placeholder="Логин">
            <label for="floatingInput">Логин</label>
          </div>
          <div class="form-floating mb-4">
            <input type="password" name="password" required="required" class="form-control" id="floatingPassword2" placeholder="Пароль">
            <label for="floatingPassword">Пароль</label>
          </div>
      
          
          <button class="w-100 btn btn-lg btn-dark" type="submit">Войти</button>
          <p style="color: red; font-weight: bold;"> <?php 
          echo $_SESSION['message']; 
          unset($_SESSION['message']);
          ?> 
          </p>
          <p class="mt-5 mb-3 text-muted">&copy; 2023 Магазин мебели Хозяин</p>
        </form>

      </main>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>