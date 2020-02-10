<?php

$arrOne = explode(" ", readline());
$arrTwo = explode(" ", readline());

$bigger = max(count($arrOne), count($arrTwo));
$sum=0;
$output=[];

if (count($arrOne) > count($arrTwo)) {
    $diff = count($arrOne) - count($arrTwo);
    while (count($arrOne) !== count($arrTwo)) {
        for ($i = 0; $i < $diff; $i++) {
            array_push($arrTwo, $arrTwo[$i]);
        }
    }

} elseif (count($arrOne) < count($arrTwo)) {
    $diff = count($arrTwo) - count($arrOne);

    while (count($arrOne) !== count($arrTwo)) {
        for ($i = 0; $i < $diff; $i++) {
            array_push($arrOne, $arrOne[$i]);
        }
    }

}

for ($i=0; $i < count($arrTwo); $i++){

    $sum = (int)$arrOne[$i] + (int)$arrTwo[$i];
    $output[]= $sum;

}



echo implode(" ",$output);
