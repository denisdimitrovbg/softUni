<?php
spl_autoload_register();

$lines = (int) readline();
/**
 * array Car
 */
$cars=[];


for ($i=0; $i< $lines; $i++){
    $input = explode(' ',readline());
    $name = $input[0];
    $engineSpeed =(int) $input[1];
    $enginePower =(int) $input[2];
    $cargoWeight =(int) $input[3];
    $cargoType = $input[4];
    $tireOnePresure = (float) $input[5];
    $tireOneAge = (int) $input[6];
    $tireTwoPresure = (float) $input[7];
    $tireTwoAge = (int) $input[8];
    $tireThreePresure = (float) $input[9];
    $tireThreeAge = (int) $input[10];
    $tireFourPresure = (float) $input[11];
    $tireFourAge = (int) $input[12];
    $engine = new Engine($engineSpeed,$enginePower);
    $cargo = new Cargo($cargoWeight, $cargoType);
    $tireOne = new Tire($tireOnePresure,$tireOneAge);
    $tireTwo = new Tire($tireTwoPresure,$tireTwoAge);
    $tireThree = new Tire($tireThreePresure,$tireThreeAge);
    $tireFour = new Tire($tireFourPresure,$tireFourAge);
    $cars[$name]= new Car($name,$engine,$cargo,$tireOne,$tireTwo,$tireThree,$tireFour);
}

$search = readline();


foreach($cars as $car){


    switch ($search){
        case 'fragile':
            if (($car->getCargo()->getCargoType() === 'fragile') && $car->checkTires() === false ){
                echo $car;
            }

            break;

        case 'flamable':

            if (($car->getCargo()->getCargoType() === 'flamable') && $car->getEngine()->getPower() > 250 ){
                echo $car;
            }

            break;

    }

}

