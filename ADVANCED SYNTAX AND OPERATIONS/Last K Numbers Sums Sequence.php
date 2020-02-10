<?php

$elements = (int)readline();
$k = (int)readline();

$numbers = array_fill(0, $elements, 0);
$numbers[0] = 1;

for ($currEl = 0; $currEl < count($numbers); $currEl++) {
    $startIndex = max(0, $currEl - $k);
    $sum = 0;

    for ($i = $startIndex; $i <= $currEl; $i++) {
        $sum += $numbers[$i];

    }
    $numbers[$currEl] = $sum;
}

echo implode(" ", $numbers);