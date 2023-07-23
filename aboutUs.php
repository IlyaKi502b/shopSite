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
        <h2 style="margin-top: 20px;">О нас</h2>

        <div class="row mt-5">
            <div class="col">
                <p>Магазин мебели "Хозяин" - это сеть мебельных магазинов, которая предлагает широкий ассортимент мебели для дома и офиса.</p>

                <p>В магазине "Хозяин" вы найдете мебель различных стилей и направлений: от классической до современной, от деревянной до металлической, от простой до эксклюзивной. В ассортименте магазина есть мебель для гостиной, спальни, детской, кухни, офиса и других помещений.</p>
        
                <p>Мебель в магазине "Хозяин" производится из качественных материалов, таких как натуральное дерево, искусственная кожа, металл и стекло. Все изделия имеют сертификаты качества и соответствуют современным стандартам безопасности.</p>
        
                <p>В магазине "Хозяин" вы найдете не только качественную мебель, но и отличный сервис и дружелюбный персонал. Магазин "Хозяин" - это место, где вы сможете найти идеальную мебель для своего дома или офиса.</p>
            </div>
            <div class="col">
                <img src="img\host.png" style="max-height: 21rem; margin-left: 10rem;">
            </div>
        </div>
        <h4 style="margin-top: 20px">Наши данные:</h4>
        <div class="row mt-3">
            <div class="col">
                <p>Адресс :</p>
                <p>Почта :</p>
                <p>Номер телефона :</p>
                <p>Директор :</p>
                <p>Главный бухгалтер :</p>
            </div>
            <div class="col">
                <?php $shop = mysqli_query($link,"SELECT * FROM `shop`");
                $sh = mysqli_fetch_assoc($shop);
                ?>
                <p><?php echo $sh['adress'];?></p>
                <p><?php echo $sh['mail'];?></p>
                <p><?php echo $sh['phone'];?></p>
                <p><?php echo $sh['director'];?></p>
                <p><?php echo $sh['chief_accountant'];?></p>
                
            </div>
        </div>

    </main>

    <?php include "includes/footer.php";?>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>