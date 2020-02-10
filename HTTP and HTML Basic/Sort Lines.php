<?php
if(isset($_GET["lines"])){


    $input = explode("\n", $_GET["lines"]);
    $input = array_map("trim", $input);
    $input = array_filter($input);
    sort($input);
    $sortedLines= implode("\r", $input);

}
?>
<form>

    <textarea name="lines" rows="10"><?=$sortedLines ?></textarea>
    <br>
    <input type="submit"/>
</form>