<?php


$input = explode(" ", readline());
$loops = count($input);


while (count($input) > 1) {
    $sum = [];
    for ($i = 0; $i < count($input) - 1; $i++) {
        $sum [] = $input[$i] + $input[$i + 1];
    }
    $input = $sum;

}

echo $input[0];
