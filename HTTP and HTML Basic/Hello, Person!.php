<form>

    <span>Name: </span>
    <input type="text" name="person">
    <input type="submit">
</form>




<?php

$name = htmlspecialchars($_GET["person"]);


echo "Hello, $name!";