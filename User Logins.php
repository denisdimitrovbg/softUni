<?php

$input = readline();
$unsuccessfulCount = 0;
$on = true;

$dataBase = [];

while ($on) {
    while ($input !== "login") {
        $raw = explode(" -> ", $input);
        $user = $raw[0];
        $pass = $raw[1];
        $dataBase[$user] = $pass;
        $input = readline();
    }
    $input = readline();
    while ($input !== "end") {

        $raw = explode(" -> ", $input);
        $userTry = $raw[0];
        $passTry = $raw[1];


        if (array_key_exists($userTry, $dataBase) && $dataBase[$userTry] == $passTry) {
            echo $userTry . ": logged in successfully" . PHP_EOL;
        } else {
            $unsuccessfulCount++;
            echo $userTry . ': login failed' . PHP_EOL;
        }
        $input = readline();
    }
    $on = false;
}

echo 'unsuccessful login attempts: ' . $unsuccessfulCount . PHP_EOL;