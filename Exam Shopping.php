<?php
$input = explode(" ", readline());
$dataBase = [];

while ($input[0] !== "shopping") {
    $productName = $input[1];
    $productQuantity = (int)$input[2];
    $dataBase[$productName][] = $productQuantity;
    $input = explode(" ", readline());

}
foreach ($dataBase as $key => $value) {
    $dataBase[$key] = array_sum($value);
}

$input = explode(" ", readline());
while ($input[0] !== "exam") {
    $productName = $input[1];
    $productQuantity = (int)$input[2];
    if (!array_key_exists($productName, $dataBase)) {
        echo $productName . " doesn't exist" . PHP_EOL;
    }

    if (array_key_exists($productName, $dataBase) && $dataBase[$productName] <= 0) {
        echo $productName . ' out of stock' . PHP_EOL;
    }

    if (array_key_exists($productName, $dataBase) && $dataBase[$productName] > 0) {
        $dataBase[$productName] -= $productQuantity;
    }

    $input = explode(" ", readline());
}

foreach ($dataBase as $key => $value) {
    if ($value > 0) {

        echo $key . ' -> ' . $value . PHP_EOL;
    }

}