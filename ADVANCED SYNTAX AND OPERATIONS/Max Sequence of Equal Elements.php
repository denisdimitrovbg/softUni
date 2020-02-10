<?php


$input = array_map("intval", explode(" ", readline()));
//4 1 1 4 2 3 4 4 1 2 4 9 3


$bestElement = "";
$maxCount = 0;


for ($col = 0; $col < count($input); $col++) {
    $currentCount = 0;
    for ($row = $col; $row < count($input); $row++) {
        if ($input[$row] == $input[$col]) {

            $currentCount++;

            if ($currentCount > $maxCount) {
                $maxCount = $currentCount;
                $bestElement = $input[$row];

            }
        } else {
            break;
        }

    }

}


echo str_repeat($bestElement . " ", $maxCount);
