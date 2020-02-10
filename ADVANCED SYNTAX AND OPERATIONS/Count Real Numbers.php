<?php
$input = explode(' ', readline());
$input = array_count_values($input);
ksort($input);
foreach ($input as $key => $value) {
    echo $key . ' -> ' . $value . PHP_EOL;

}