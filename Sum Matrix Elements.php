<?php


$input = explode(", ", readline());

$rows = $input[0];
$columns = $input[1];

$sum = 0;

for ($i = 0; $i < $rows; $i++) {

    $lines = readline();
    $arr = explode(", ", $lines);

    for ($j = 0; $j < count($arr); $j++) {
        $sum += $arr[$j];
    }

}


echo $rows . PHP_EOL;
echo $columns . PHP_EOL;
echo $sum;