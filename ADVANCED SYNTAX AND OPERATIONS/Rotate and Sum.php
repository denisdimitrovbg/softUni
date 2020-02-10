<?php


$input = explode(" ", readline());
$n = (int)readline();
$loops = count($input);
$output = [];

$sum = array_fill(0, $loops, 0);
$sadas = 0;


for ($i = 0; $i < $n; $i++) {

    array_unshift($input, array_pop($input));
    $output[] = $input;

}


for ($i = 0; $i < $n; $i++) {
    $sadas = 0;
    for ($j = 0; $j < $loops; $j++) {
        $sum[$j] += $output[$i][$j];

    }

}

echo implode(" ", $sum);