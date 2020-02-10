<?php


if (isset($_GET["text"])) {


    $input = preg_match_all('/[A-Z]+[a-z]*/m', $_GET["text"], $matches);
    $input = $matches[0];
    echo implode(", ", $input);
}
?>

<form>

    <textarea name="text" rows="10"></textarea>
    <br>
    <input type="submit" value="Extract">
</form>