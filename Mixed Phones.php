<?php


$input = explode(' : ', readline());

if ((int)$input[0] !== 0) {
    $input = array_reverse($input);

}

$phoneBook = [];
$phone = '';
$name = '';

while ($input[0] !== 'Over') {
    $phone = $input[1];
    $name = $input[0];
    $phoneBook[$name] = $phone;


    $input = explode(' : ', readline());
    if ((int)$input[0] !== 0) {
        $input = array_reverse($input);
    }
}
ksort($phoneBook);

foreach ($phoneBook as $key => $value) {

    echo $key . ' -> ' . $value . PHP_EOL;

};