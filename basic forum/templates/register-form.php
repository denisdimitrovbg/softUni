<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Register Form</title>
        <a href="login.php">Login</a>
    </head>
    <body>
    <h1>Register Form</h1>
        <form method="post">
            <label for="username"> Username: </label>
            <input type="text" value="<?= $username ?>" name="username">
            <label for="password" >Pass:</label>
            <input type="<?=!empty($password) ? 'text' : 'password' ?>" value="<?= $password; ?>" name="password">
            <input type="submit">
        </form>
        <div id="response">
        <?= $response; ?>
    </div>
    </body>
</html>