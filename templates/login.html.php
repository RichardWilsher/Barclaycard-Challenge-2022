<?php

if (isset($_SESSION['loggedin'])){ ?>
<p> Welcome <strong><?=$user->username ?></strong>, you are logged in </p>
<?php } else { ?>
<h2>Log in</h2>

<form action="login" method="post" style="padding: 40px">

    <label>Username:</label>
    <input type="text" name="username" />
    <label>Password:</label>
    <input type="password" name="password" />

    <input type="submit" name="submit" value="Log In" />
</form>
<?php } ?>