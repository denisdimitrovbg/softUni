<?php

$input =(string) readline();
$iMax = strlen($input);
$alphabet = range('a', 'z');

for ($i=0;  $iMax > $i; $i++ ){
    $letter = strtolower($input[$i]);
    $index= (int) array_search($letter, $alphabet);

    echo $letter.' -> '.$index.PHP_EOL;

}
