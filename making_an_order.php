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
    <script src="js/jquery-3.6.4.min.js"></script>
    
    

    <title>Магазин мебели Хозяин</title>
</head>
<body>
    <div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-center align-items-center" align="center">
              <a class="blog-header-logo text-dark" href="index.php">ХОЗЯИН</a>
          </div>
      </header>
    </div>


    <main class="container mb-4">
        <h2 class="pb-4 fst-italic">Оформление заказа</h2>
        <?php
        $furniture = mysqli_query($link, "SELECT * FROM `furniture` WHERE `furniture_id` = " . (int) $_GET['furniture']);

        while($fur = mysqli_fetch_assoc($furniture))
        {
            ?>
            <div  id="zakaz" class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">

            <div class="col p-3 d-flex flex-column position-static" style="max-width: 300px;">
                <img src="<?php echo $fur['image'];?>" class="card-img-top" alt="..." style="height: 200px;">
            </div>
            <div class="col p-3 d-flex flex-column position-static">
                <h5 class="card-title"><?php echo $fur['name'];?></h5>
                <p>Осталось <a id ="countFur"><?php echo $fur['count'];?></a></p>
                <div class="row" style="width: 15rem; margin-top: 5rem;" >
                    <div class="col">
                    <button id="minus" class="btn w-100 btn-dark"><ion-icon name="remove-outline"></ion-icon></button>  
                    </div>
                    <div class="col">
                        <div id = "result">
                            <p id="number" name="count" style="text-align: center; vertical-align: middle;">1</p>   
                            <!-- <input type="number" id="number" value="1" style="width: 5rem; text-align: center;" > -->
                        </div>
                        
                    </div>
                    <div class="col">
                        <button id="plus" class="btn w-100 btn-dark"><ion-icon name="add-outline"></ion-icon></button>
                    </div>
                </div>
            </div>
            <div class="col p-3 d-flex flex-column position-static">
                <h5 id="delete" style="cursor: pointer;">Удалить <ion-icon name="close-outline"></ion-icon></h5>
                <h4 style="margin-top: 8rem;"><span class="price" style="font-weight: bold; font-family: 'Times New Roman', Times, serif; margin-top: 5px;"><a id="price"><?php echo $fur['price'];?></a> ₽</span></h4>
            </div>
            </div>
            <?php
        }
        ?>
        <hr>
        <form id="myForm" method="POST" action="handle.php">
            <div class="input-group pt-3">
                <span class="input-group-text">Имя</span>
                <input name="name" type="text" required="required" aria-label="Имя" class="form-control">
            </div>
            <div class="input-group pt-3">
                <span class="input-group-text">Фамилия</span>
                <input name="sur" type="text" required="required" aria-label="Фамилия" class="form-control">
            </div>
            <div class="input-group pt-3">
                <span class="input-group-text">Отчество</span>
                <input name="otch" type="text" aria-label="Отчество" class="form-control">
            </div>
            <div class="input-group pt-3">
                <span class="input-group-text">Телефон</span>
                <input name="phone" type="text" required="required" aria-label="Телефон" name="phone" class="form-control" data-phone-pattern/>
            </div>
            <div class="input-group pt-3 mb-3">
                <span class="input-group-text">E-mail   </span>
                <input name="mail" type="text" required="required" aria-label="e-mail" class="form-control">
            </div>
            <input name="count" type="number" id="countVal" style="display: none;" value="1">
            <input name="price" type="number" id="priceVal" style="display: none;" value="1">
            <input name="furId" type="number" id="furId" style="display: none;" value="<?php echo $_GET['furniture'];?>">
            <input class="form-check-input" type="radio" name="radioB" id="radioB1" value="Курьером" selected>
            <label class="form-check-label" for="radioB1">Курьером</label>
            <input class="form-check-input" type="radio" name="radioB" value="Самовывоз" id="radioB2">
            <label class="form-check-label" for="radioB2">Самовывоз</label>
            <?php
                $shop = mysqli_query($link, "SELECT * FROM `shop` WHERE `shop_id` = 1");
                $sh = mysqli_fetch_assoc($shop);
            ?>
            <div class="input-group pt-3">
                <span class="input-group-text">Адрес</span>
                <input name="adress" id="adres" type="text" required="required" aria-label="Адрес" class="form-control">
            </div>
            <div id="test">

            </div>
            <div class="input-group pt-3 mb-5">
                <span class="input-group-text">Дата</span>
                <input name ="date"type="date" id="dateInput" required="required" aria-label="Дата" class="form-control" 
                min="<?php 
                $d = date("d.m.Y");
                $dS = strtotime($d);
                $d2 = $dS + (86400*2);
                $date = date("Y-m-d",$d2);
                echo $date;?>" 
                max="<?php 
                $d = date("d.m.Y");
                $dS = strtotime($d);
                $d2 = $dS + (86400*5);
                $date = date("Y-m-d",$d2);
                echo $date;?>" >
                
            </div>
            <button type="submit" class="btn w-100 btn-lg btn-dark">Подтвердить заказ</button>
            
        </form>
    </main>



    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- <script src="js\scriptMAO.js"></script> -->
    <script src="js\scriptMAO2.js"></script>
    <script>
        var p = jQuery('#number').html();
        var price = jQuery('#price').html();
        p=parseInt(p);
        price=parseInt(price);
        jQuery('#countVal').val(p);
        jQuery('#priceVal').val(price);
        jQuery('#plus').on('click',function(){
        var p = jQuery('#number').html();
        var countFur =jQuery('#countFur').html();
        p=parseInt(p);
        countFur=parseInt(countFur);
        if(p < countFur)
        {
            p=p+1;
            jQuery('#number').empty();
            jQuery('#number').append(p);
            var price = jQuery('#price').html();
            price=parseInt(price);
            price= price*p;
            jQuery('#price').empty();
            jQuery('#price').append(price);
            jQuery('#countVal').val(p);
            jQuery('#priceVal').val(price);
        }
        
        
    });
    jQuery('#minus').on('click',function(){
        var p = jQuery('#number').html();
        p=parseInt(p);
        if(p>1)
        {
            p=p-1;
            jQuery('#number').empty();
            jQuery('#number').append(p);
            var price = jQuery('#price').html();
            price=parseInt(price);
            price= price/(p+1);
            jQuery('#price').empty();
            jQuery('#price').append(price);
            jQuery('#countVal').val(p);
            jQuery('#priceVal').val(price);
        }
    });
    jQuery('#radioB2').on('click', function(){
    $.ajax({
    url: 'test.php',
    success: function(data) {
        // jQuery('#adres').replaceWith('<p id="adres" style="margin-left: 1rem; "><?php echo $sh["adress"];?></p>');
        $('#adres').replaceWith(data);
        }
    });

        
    })
    jQuery('#radioB1').on('click', function(){
        jQuery('#adres').replaceWith('<input id="adres" type="text" aria-label="Адрес" class="form-control">');
        
    })

    jQuery('#delete').on('click', function(){
        jQuery('#zakaz').remove();
    })

    const myForm = $("#myForm");
    jQuery('#btn').on('click', function(){
        myForm.submit();
    })
    </script>
    <!-- <script>
    $("#dateInput").validate();
    </script> -->
</body>
</html>