<p>Welcome to Claire's Cars, Northampton's specialist in classic and import cars.</p>
<h2> users </h2>

<?php foreach($users as $user){ ?>

    <p><h3><?=$user->id ?></h3>
    <p><?=$user->username ?></p>
<?php } 