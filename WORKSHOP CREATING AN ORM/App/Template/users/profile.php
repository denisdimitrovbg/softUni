<?php
/**
 * var \Data\UserDTO $data
 */


?>
<h2>Your profile </h2>
<form method="post">
    <br>
    <label>
Username:
        <input type="text" name="username" value="<?= $data->getUsername(); ?>">
    </label>
    <br>
    <label>
Password:
        <input type="password" name="password">
    </label>
    <br>
    <label>
Confirm password:
        <input type="password" name="confirm_password">
    </label>
    <br>
    <label>
First name:
        <input type="text" name="first_name" value="<?= $data->getFirstName(); ?>">
    </label>
    <br>
    <label>
Last name:
        <input type="text" name="last_name" value="<?= $data->getLastName(); ?>">
    </label>
    <br>
    <label>
Birthday
        <input type="date" name="born_on">
    </label>
    <input type="submit" name="edit" value="edit">
</form>
<hr>
<span>
    You can
    <a href="logout.php">
        logout
    </a>
</span>

<span>
    or see
        <a href="all.php">
            all users.
        </a>
</span>