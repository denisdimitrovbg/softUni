<?php

if (isset($_GET["input"])) {

    $input = preg_match_all('/[A-z\S]/m', $_GET["input"], $matches);
    $matches[0] = array_filter($matches[0]);
    $input = $matches[0];


    foreach ($input as $key) {
        $ord = ord($key);
        if ($ord % 2 == 0) {
            echo "<span style='color:red'>$key </span>";
        } else {
            echo "<span style='color:blue'>$key </span>";
        }

    }
}