<?php

$input = explode(" -> ", readline());
$dataBase = [];

while ($input[0] !== "filter base") {
    $name = $input[0];
    (is_numeric($input[1]));

    if (is_numeric($input[1])) {

        if (strpos($input[1], ".") !== false) {
            $dataBase[$name]['Salary'] = $input[1];
        } else {
            $dataBase[$name]['Age'] = $input[1];
        }
    } else {
        $dataBase[$name]['Position'] = $input[1];
    }

    $input = explode(" -> ", readline());
}

$command = readline();

foreach ($dataBase as $key => $value) {


    if (array_key_exists($command, $dataBase[$key])) {
        $name = $key;
        $var = $value[$command];
        echo 'Name: ' . $name . PHP_EOL;
        echo $command . ': ' . $var . PHP_EOL;
        echo '====================' . PHP_EOL;
    }
}