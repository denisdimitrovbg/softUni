<?php
spl_autoload_register();

$lines = (int)readline();
$cars = [];

for ($i = 0; $i < $lines; $i++) {
    $line = explode(' ', readline());
    $model = $line[0];
    $fuelAmount = $line[1];
    $fuelCost = $line[2];
    $cars[$model] = new Car($model, $fuelAmount, $fuelCost);
}
$command = explode(' ', readline());

while ($command[0] !== 'End') {
    $carModel = $command[1];
    $amountOfKm = (int)$command [2];

    if (!$cars[$carModel]->canDrive($amountOfKm)) {
        echo 'Insufficient fuel for the drive';
    } else {
        $cars[$carModel]->setTraveledKM($amountOfKm);
        $cars[$carModel]->drive($amountOfKm);
    }


    $command = explode(' ', readline());
}

foreach ($cars as $car){
    echo $car;
}