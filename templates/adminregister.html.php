<?php if($errors < 0){?>
    <p><?php if ($errors==4){?>
        Password's don't match
    </p> <?php } }?>


<form action="" method="post" style="padding: 40px">
    <label>Username:</label>
    <input type="text" name="name"  value="<?=$user->email ?? '' ?>"/>
    <label>Password:</label>
    <input type="password" name="password" />
    <label>Retype Password:</label>
    <input type="password" name="password2" />
    <input type="hidden" name="id" value="<?=$user->id ?? ''?>"/>
    <input type="submit" name="submit" value="Register" />
</form>