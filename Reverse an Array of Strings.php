<?php


$input = strrev(readline());
$iMax = strlen($input);
$output = '';
for ($i = 0; $iMax > $i; $i++) {
    $letter = strrev($input[$i]);
    $output .= $letter . '';


}
echo $output;