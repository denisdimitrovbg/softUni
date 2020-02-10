<form>

    <span>First Number: </span>
    <input type="number" name="num1">
    <br>
    <span>Second Number:</span>
    <input type="number" name="num2">
    <br>
    <input type="submit" />
</form>


<?php

$numOne= (int) $_GET["num1"];
$numTwo= (int) $_GET["num2"];
$sum = $numOne + $numTwo;

echo "$numOne + $numTwo = $sum";