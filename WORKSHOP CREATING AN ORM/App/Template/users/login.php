<h2>Log in</h2>

<?php
/** @var \Data\ErrorDTO $error */
?>

<?php if($error): ?>
<p><?= $error->getMessage() ?></p>
<?php endif; ?>

<form method="post">
    <br>
    <label>
        Username:
        <input type="text" name="username" >
    </label>
    <br>
    <label>
        Password:
        <input type="password" name="password">
    </label>
    <br>
    <input type="submit" name="login" value="login">
</form>