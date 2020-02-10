<?php


$input = explode("|", readline());
$teamPoints = [];
$MVP = [];
$score = 0;
$playerName = '';
$bestPoints = 0;
$outPut = [];


while ($input[0] !== "Result") {
    $input[0] = preg_replace('/[^a-zA-Z\d]/', '', $input[0]);
    $input[1] = preg_replace('/[^a-zA-Z\d]/', '', $input[1]);
    $points = (int)$input[2];
    if (ctype_upper($input[0]) === true) {
        $team = $input[0];
        $player = $input[1];
    } else {
        $team = $input[1];
        $player = $input[0];
    }

    $teamPoints[$team][$player][] = $points;


    $input = explode("|", readline());
}

foreach ($teamPoints as $key => $value) {
    $score = 0;
    $bestPoints = 0;
    $bestPlayer = "";
    $team = $key;
    foreach ($value as $player => $points) {
        array_sum($points);
        if ($points[0] > $bestPoints) {
            $bestPoints = $points[0];
            $bestPlayer = $player;
        }

        $score += $points[0];
    }

    $outPut[$score][$team][] = $bestPlayer;
}
krsort($outPut);
foreach ($outPut as $key => $value) {
    $points = $key;

    foreach ($value as $team => $player) {
        echo $team . ' => ' . $points . PHP_EOL;
        echo 'Most points scored by ' . $player[0] . PHP_EOL;
    }

}