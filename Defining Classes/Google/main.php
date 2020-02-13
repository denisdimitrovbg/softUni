<?php
spl_autoload_register();

$input = explode(' ', readline());
/**
 * array personData
 */
$people=[];


while ($input[0] !== 'End') {
    $personName = $input[0];
    $command = $input[1];

    if(!array_key_exists($personName,$people)){
        $people[$personName] = new personData($personName);
    }



    switch ($command) {
        case 'company':
            $companyName = $input[2];
            $departmentName= $input[3];
            $salary =(float) $input[4];
            $people[$personName]->addCompany($companyName, $departmentName, $salary);


            break;
        case 'pokemon':
            $pokemonName = $input[2];
            $pokemonType = $input[3];
            $people[$personName]->addPokemon($pokemonName, $pokemonType);
            break;

        case'parents':
            $parentName = $input[2];
            $parentBirthday = $input[3];
            $people[$personName]->addParent($parentName, $parentBirthday);
            break;

        case 'children':
            $childrenName = $input[2];
            $childrenBirthday = $input[3];
            $people[$personName]->addChildren($childrenName, $childrenBirthday);
            break;

        case 'car':
            $carModel = $input[2];
            $carSpeed =(int) $input[3];
            $people[$personName]->addCar($carModel,$carSpeed);
            break;
    }

    $input = explode(' ', readline());
}

$person = readline();


    echo $people[$person];

