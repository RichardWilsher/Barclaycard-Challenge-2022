<section class="right">
<h1>Our Range</h1>
<ul class="cars">

<?php foreach($stock as $stockItem){ ?>
<!-- <p> -->
    <h3><?=$stockItem->name ?></h3>
    <p><?=$stockItem->description ?></p>
    <p><?=$stockItem->price ?></p>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?=$stockItem->id ?>">
        <input type="text" name="quantity" value="1">
        <input type="submit" value="Add">
    </form>
<!-- </p> -->
<?php } ?>
</ul>
</section>


<a href="/store/basket">View basket</a><a href="/store/clearBasket">Clear Basket</a>


