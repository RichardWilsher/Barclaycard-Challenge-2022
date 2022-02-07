<section class="right">
<h1>Our Range</h1>
<ul class="cars">

<br>
<br>
<br>
<div class="container">
    <div class="grid">
            <!-- Sets the page as a grid -->
        
                <!-- Sets the image on the page to fit on the grid-->
<?php foreach($stock as $stockItem){ ?>
<<<<<<< HEAD
<!-- <p> -->
=======
    <div class="grid_inner">
<p>
>>>>>>> 4b304b1a263a35b8ccaa11e3ffa9c4c80327a117
    <h3><?=$stockItem->name ?></h3>
    <p><?=$stockItem->description ?></p>
    <p>£ <?=$stockItem->price ?></p>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?=$stockItem->id ?>">
        <input type="text" name="quantity" value="1"> <input type="submit" value="Add" style="margin-left: 0px">
    </form>
<<<<<<< HEAD
<!-- </p> -->
=======
</p>
</div>
>>>>>>> 4b304b1a263a35b8ccaa11e3ffa9c4c80327a117
<?php } ?>
</ul>
</section>

</div>
</div>


<a href="/store/basket">View basket</a> <a href="/store/clearBasket">Clear Basket</a>


