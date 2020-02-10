<?php


$input = explode(" ", readline());
$iMax = count($input);
$output = 0;
for ($i = 0; $iMax > $i; $i++) {
    $number = strrev($input[$i]);
    $output += (int)$number;


}
echo $output;