<?php if($errors < 0){?>
    <p><?php if ($errors==4){?>
        Password's don't match
    </p> <?php } }?>


<form action="" method="post" style="padding: 40px">
    <label>Email Address:</label>
    <input type="text" name="email"  value="<?=$user->email ?? '' ?>"/>
    <label>First Name:</label>
    <input type="text" name="firstname"  value="<?=$user->firstname ?? ''?>" />
    <label>Surname:</label>
    <input type="text" name="surname"  value="<?=$user->surname ?? ''?>" />
    <label>House Number:</label>
    <input type="text" name="house_no"  value="<?=$user->house_no ?? ''?>" />
    <label>Street:</label>
    <input type="text" name="street"  value="<?=$user->street ?? ''?>" />
    <label>City:</label>
    <input type="text" name="city"  value="<?=$user->city ?? ''?>" />
    <label>Post Code:</label>
    <input type="text" name="postcode"  value="<?=$user->postcode ?? ''?>" />
    <label>Password:</label>
    <input type="password" name="password" />
    <label>Retype Password:</label>
    <input type="password" name="password2" />
    <input type="hidden" name="id" value="<?=$user->id ?? ''?>"/>
    <input type="submit" name="submit" value="Register" />
</form>