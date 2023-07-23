<?php
    require "includes\config.php";
    $shop = mysqli_query($link, "SELECT * FROM `shop` WHERE `shop_id` = 1");
    $sh = mysqli_fetch_assoc($shop);
    ?>
    <p id="adres" style="margin-left: 1rem; "><?php echo $sh["adress"];?></p>
    <?php
    // echo $sh['adress'];
?>