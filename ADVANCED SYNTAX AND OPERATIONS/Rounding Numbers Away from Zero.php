<?php

$arr = explode(" ", readline());

for ($i = 0; $i < count($arr); $i++) {
    echo $arr[$i] . " => " . round($arr[$i]) . PHP_EOL;

}