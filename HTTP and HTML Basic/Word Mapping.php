<?php

if (isset($_GET["input"])) {

    $input = preg_match_all('/[A-z]*/m', $_GET["input"], $matches);
    $matches[0]=array_filter($matches[0]);
    $input = $matches[0];
    $wordCount = [];

    foreach ($input as $key) {
        $key= strtolower($key);
        if (!key_exists($key, $wordCount)) {


            $wordCount[$key] = 1;
        } else {
            $wordCount[$key]++;
        }

    }

    echo "<table border='2'>";
    foreach ($wordCount as $key=>$value){

        echo "<tr><td>$key</td><td>$value</td></tr>";

    }

    echo "</table>";


}
?>