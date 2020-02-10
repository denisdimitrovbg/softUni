<?php

$input = explode(', ', readline());
$arr = array_count_values($input);

foreach ($arr as $key => $value){
    if ($value == 1){
        echo $key." ";
    }
}