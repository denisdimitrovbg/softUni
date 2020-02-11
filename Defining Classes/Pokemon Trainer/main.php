<?php
spl_autoload_register();

$input = explode(' ', readline()) ;
/**
 * var Trainer[] $trainers;
 */
$trainers = [];


while ($input[0] !== 'Tournament' ){

    $trainerName=$input[0];
    $pokemonName = $input[1];
    $element = $input[2];
    $health =(int) $input[3];


    if(!array_key_exists($trainerName,$trainers)){
        $trainers[$trainerName]= new Trainer($trainerName);
    }

    $trainer= $trainers[$trainerName];
    $trainer->catchPokemon(new Pokemon($pokemonName,$element,$health));


    $input = (explode(' ', readline()));
}


$input =  readline();

while ($input !== 'End'){

    foreach ($trainers as $trainer){

        if($trainer->hasPokemonByType($input)){
            $trainer->receiveBadges();
        }else{
            $trainer->hitPokemon(10);
        }
    }

    $input = readline();
}



uksort($trainers, function ($key1, $key2) use ($trainers){
$trainer1 = $trainers[$key1];
$trainer2 = $trainers[$key2];

return $trainer2->getBadges() <=> $trainer1->getBadges();

});

echo implode(PHP_EOL, $trainers);