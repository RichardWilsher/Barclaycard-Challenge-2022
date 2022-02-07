<h3>Your Basket</h3>

<?php 

    echo var_dump($basket);
    foreach($basket as $basketItem){ ?>
    <p><h1><?=$basketItem['id'] ?></h1>
    <?=$basketItem['quantity'] ?></p>
<?php }

