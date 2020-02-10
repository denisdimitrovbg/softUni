<?php


$input = explode(" ", readline());

$rows = $input[0];
$columns = $input[1];

$sum = 0;
$sumMax = 0;
$matrix = [];
$biggestMatrix = [];
for ($i = 0; $i < $rows; $i++) {
    $matrix[$i] = explode(" ", readline());
}


for ($i = 0; $i < $rows - 2; $i++) {


    for ($j = 0; $j < count($matrix[$i]) - 2; $j++) {
        $sum = (int)$matrix[$i][$j] + (int)$matrix[$i][$j + 1] + (int)$matrix[$i][$j + 2] +
            (int)$matrix[$i + 1][$j] + (int)$matrix[$i + 1][$j + 1] + (int)$matrix[$i + 1][$j + 2] +
            (int)$matrix[$i + 2][$j] + (int)$matrix[$i + 2][$j + 1] + (int)$matrix[$i + 2][$j + 2];

        if ($sum > $sumMax) {
            $sumMax = $sum;
            $biggestMatrix[0] = $matrix[$i][$j];
            $biggestMatrix[1] = $matrix[$i][$j + 1];
            $biggestMatrix[2] = $matrix[$i][$j + 2];
            $biggestMatrix[3] = $matrix[$i + 1][$j];
            $biggestMatrix[4] = $matrix[$i + 1][$j + 1];
            $biggestMatrix[5] = $matrix[$i + 1][$j + 2];
            $biggestMatrix[6] = $matrix[$i + 2][$j];
            $biggestMatrix[7] = $matrix[$i + 2][$j + 1];
            $biggestMatrix[8] = $matrix[$i + 2][$j + 2];
        }
    }
}

echo 'Sum = ' . $sumMax . PHP_EOL;
echo $biggestMatrix[0] . " " . $biggestMatrix[1] . " " . $biggestMatrix[2] . PHP_EOL;
echo $biggestMatrix[3] . " " . $biggestMatrix[4] . " " . $biggestMatrix[5] . PHP_EOL;
echo $biggestMatrix[6] . " " . $biggestMatrix[7] . " " . $biggestMatrix[8];