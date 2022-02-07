<h3>Your Basket</h3>

<?php 
    $totalPrice = 0;
    if($basket != 'empty'){
    
    foreach($basket as $basketItem){ ?>
    <p><h3><?=$basketItem['name'] ?></h3>
    <?=$basketItem['quantity'] ?>
    £<?=$basketItem['price']?>
    <?php $subTotal = $basketItem['quantity'] * $basketItem['price'];
    $totalPrice += $subTotal;?>
     £<?=$subTotal?>
     </p>
<?php } } else {?>
<h2> your basket is empty</h2> <?php }?>

<h2>Order Total £<?=$totalPrice?></h2>

<a href="/store/payment">Process Order</a>
<a href="/store/basket?action=clear">Clear basket</a>


