<?php

$input = explode(' ', strtolower(readline()));

$input = array_count_values($input);
$output = [];

foreach ($input as $key => $value) {
    if ($value % 2 !== 0) {
        $output[] = $key;
    }

}
$output = implode(", ", $output);
echo $output;