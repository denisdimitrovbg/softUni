<?php

$input =explode(", ",readline()) ;

$rows = $input[0];
$columns = $input[1];

$sum = 0;
$sumMax=0;
$matrix=[];
$biggestMatrix=[];
for ($i=0; $i < $rows; $i++){
    $matrix[$i]=explode(", ", readline());
}


for ($i = 0; $i < $rows-1; $i++) {


    for ($j = 0; $j < count($matrix[$i])-1; $j++) {
        $sum = $matrix[$i][$j] + $matrix[$i][$j+1] + $matrix[$i+1][$j] + $matrix[$i+1][$j+1];
        if($sum > $sumMax){
            $sumMax = $sum;
            $biggestMatrix[0]=$matrix[$i][$j];
            $biggestMatrix[1]=$matrix[$i][$j+1];
            $biggestMatrix[2]=$matrix[$i+1][$j];
            $biggestMatrix[3]=$matrix[$i+1][$j+1];
        }
    }
}

echo $biggestMatrix[0]." ".$biggestMatrix[1].PHP_EOL.$biggestMatrix[2]." ".$biggestMatrix[3].PHP_EOL.$sumMax;