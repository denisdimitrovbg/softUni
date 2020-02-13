<?php
spl_autoload_register();

$input = explode(' ', readline());
$speed = $input[0];
$fuel = $input[1];
$fuelEconomy = $input[2];

$car = new Car($speed, $fuel, $fuelEconomy);

$command = explode(' ', readline());

while ($command[0] !== 'END') {


    switch ($command[0]) {
        case "Travel":
            $distance = $command[1];
            $car->travel($distance);
            break;
        case "Distance":
            echo 'Total Distance: ' . $car->getDistance() . PHP_EOL;
            break;
        case "Time":
            echo 'Total Time: ' . $car->getTime() . PHP_EOL;
            break;
        case "Fuel":
            echo 'Fuel left: ' . number_format($car->getTime(), 1, '.', '') .' liters'. PHP_EOL;
            break;

        case "Refuel":
            $liters = (int)$command[1];
            $car->refuel($liters);
            break;

    }


    $command =explode(' ', readline());
}

