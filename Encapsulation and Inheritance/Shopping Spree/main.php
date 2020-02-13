<?php

require_once 'Person.php';
require_once 'Product.php';


$personData = preg_split("/[=;]/", readline(), -1, PREG_SPLIT_NO_EMPTY);


$people = [];
for ($i = 0; $i < count($personData) - 1; $i += 2) {
    $personName = $personData[$i];
    $personMoney = (float)$personData[$i + 1];


    try {
        $people[$personName] = new Person($personName, $personMoney);
    } catch (Exception $e) {
        echo $e->getMessage();
        return;
    }
}

$productsData = preg_split("/[=;]/", readline(), -1, PREG_SPLIT_NO_EMPTY);
$products = [];
for ($i = 0; $i < count($productsData) - 1; $i += 2) {
    $productName = $productsData[$i];
    $productCost = (float)$productsData[$i + 1];
    try {

        $products[$productName] = new Product($productName, $productCost);
    } catch (Exception $e) {
        echo $e->getMessage();
        return;
    }

}

$input = readline();

while ($input !== 'END') {
    $data = explode(" ", $input);
    $personName = $data[0];
    $productName = $data[1];

    if (array_key_exists($personName, $people) && array_key_exists($productName, $products)) {

        /**
         * @var Person $person
         */
        $person = $people[$personName];
        try {

            $person->canAffordAProduct($products[$productName]);
            $person->buyProduct($products[$productName]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    $input = readline();
}

foreach ($people as $human) {
    echo $human.PHP_EOL;
}