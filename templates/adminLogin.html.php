<?php

if (isset($_SESSION['loggedin'])){ ?>
<p> Welcome <strong><?=$user->email ?></strong>, you are logged in </p>
<p> <a href="\store\logout">Log Out</a>
<?php } else { ?>
<h2>Admin Log in</h2>

<form action="login" method="post" style="padding: 40px">

    <label>Email Address:</label>
    <input type="text" name="name" />
    <label>Password:</label>
    <input type="password" name="password" />

    <input type="submit" name="submit" value="Log In" />
</form>
<?php } ?>