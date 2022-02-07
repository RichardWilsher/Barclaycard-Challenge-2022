<div class="title"> 
    <h3>Stock</h3>
</div>

<br>
<br>
<br>
<br>

<label> ID Number: </label> 
<input type="text" name = "stock[id]"/>
<input type="button" name="verify" value="Verify" action="/stock/update"/>
<input type="button" name="delete" value="Delete" action="/stock/delete"/>
<br>
<label> Cheese: </label> <input type="text" name = "stock[name]"/>
<input type="button" name="search" value="Search" />


<div class="flexbox">
    <table>
        <thead>
            <th> ID </th>
            <th>Cheese</th>
            <th>Stock</th>
            <th>Last Purchase</th>
            <th>Price</th> 
        </thead>

                <?php foreach($stock as $record) { ?>
                    <tr>
                        <td><?= $record -> id ?></td>
                        <td><?= $record -> name ?></td>
                        <td><?= $record -> stock ?></td>
                        <td><?= $record -> purchase ?></td>
                        <td><?= $record -> price ?></td>
                       
                    </tr>
                <?php } ?>
                
    </table>
</div>

