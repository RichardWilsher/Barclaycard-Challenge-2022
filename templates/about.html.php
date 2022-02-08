<h1>About Us</h1>
<br>
<p> Phillip’s Cheeses has been an established business in Northampton for over 12 years and has gained success in the food industry through the production and promotion: Cheddar, Stilton, Edam, Parmigiano-Reggiano, Sven Stilton, Monterrey Jack as well as Pavarti’s Havarti. Its products are made from natural ingredients that comply with strict quality standards, guaranteeing products that are unique in quality and rich in taste. With deliveries and collections avalible from the following store
</p>
<br>
<br>
<br>
<div class="container">
    <div class="grid" style="justify-items:center">
            <!-- Sets the page as a grid -->
        
                <!-- Sets the image on the page to fit on the grid-->
<?php foreach($permission as $permission){ ?>
    <div class="grid_inner" >
     <!-- <img src="/images/cheddar-cheese.jpg" >    -->
<p>
    <h2><?=$permission->store ?></h2>
    
</p>
</div>
<?php } ?>