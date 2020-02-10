<?php
spl_autoload_register();

$lineEngines = (int)readline();
$enginesList = [];
$carsList = [];

for ($i = 0; $i < $lineEngines; $i++) {
    $input = explode(' ', readline());
    $model = $input[0];
    $power = (int)$input[1];
    $efficiency = 'n/a';
    $displacement = 'n/a';

    if (isset($input[2])) {
        $displacement = (int)$input[2];
    }
    if (isset($input[3])) {
        $efficiency = $input[3];
    }

    $engine = new Engine($model, $power, $displacement, $efficiency);
    $enginesList[$model] = $engine;
}

$lineCars = (int)readline();

for ($i = 0; $i < $lineCars; $i++) {
    $input = explode(' ', readline());
    $model = $input[0];
    $engine = $input[1];
    $weight = 'n/a';
    $color = 'n/a';

    if (isset($input[2]) && is_numeric($input[2])) {
        $weight = (int)$input[2];
    }

    if (isset($input[2]) && (!is_numeric($input[2]))) {
        $color = $input[2];
    }


    if (isset($input[3])) {
        $color = $input[3];
    }

    $car = new Car($model, $enginesList[$engine], $weight, $color);

    echo $car;

}
