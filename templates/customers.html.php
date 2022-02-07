<div class="title"> 
    <h3>Customers</h3>
</div>

<br>
<br>
<br>
<br>

<label> ID Number: </label> 
<input type="text" name = "client[id]"/>
<input type="button" name="verify" value="Verify" action="/client/update"/>
<input type="button" name="delete" value="Delete" action="/client/delete"/>
<br>
<label> Last Name: </label> <input type="text" name = "client[name]"/>
<input type="button" name="search" value="Search" />


<div class="flexbox">
<table>
        <thead>
            <th>ID </th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Last Purchase</th>
            <th>House Number</th>
            <th>Street</th>
            <th>City</th>
            <th>Postcode</th>
        </thead>

                <?php foreach($customers as $record) { ?>
                    <tr>
                        <td><?= $record -> id ?></td>
                        <td><?= $record -> firstname ?></td>
                        <td><?= $record -> surname ?></td>
                        <td><?= $record -> email ?></td>
                        <td><?= $record -> lastPurchase?></td>
                        <td><?= $record -> house_no ?></td>
                        <td><?= $record -> street ?></td>
                        <td><?= $record -> city ?></td>
                        <td><?= $record -> postcode?></td>

                       
                    </tr>
                <?php } ?>
                </table>
                </div>
