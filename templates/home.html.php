<p>Welcome to Phillip's Cheeses, Northamptonshires specialist in cheese.</p>
<h2> users </h2>

<?php foreach($users as $user){ ?>

    <p><h3><?=$user->id ?></h3>
    <p><?=$user->username ?></p>
<?php } 