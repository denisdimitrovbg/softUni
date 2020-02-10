<?php


$lines = (int)readline();
$arr = [];
$number = 0;
for ($i = 0; $i < $lines; $i++) {
    $number = (int)readline();
    $arr[] = $number;
}
echo implode(" ", array_reverse($arr));