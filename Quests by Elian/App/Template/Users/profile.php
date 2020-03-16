<?php /**
 * @var \Data\UserDTO $data;
 */



?>
<h2>Profile</h2>

<p>You can edit your profile from here</p>
<form method="post">
    <br>
    <label>
Username:
        <input type="text" name="name" value="<?= $data->getName(); ?>">
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
    <input type="submit" name="edit" value="edit">
</form>

<hr>
<h2>Your phonebook</h2>
<h2>you can add phone number</h2>
<form method="post">
    <br>
    <label>
        Name:
        <input type="text" name="name" >
    </label>
    <br>
    <label>
        Second name:
        <input type="text" name="secondName">
    </label>
    <br>
    <label>
        Phone
        <input type="text" name="phone">
    </label>
    <br>
    <label>
        Email
        <input type="text" name="email">
    </label>
    <br>
    <input type="submit" name="add" value="add">
</form>
<hr>
    <a href="allPhones.php">Check your phones</a>
<br>
    <a href="search.php">Search by substring of name, second name, email or phone</a>
<br>
    <a href="logout.php">Logout</a>
