<?php
spl_autoload_register();
$lines = readline();
$persons = [];
$family = new Family();
for ($i=0; $i < $lines; $i++ ){
    $input = explode(' ', readline());
    $name = $input[0];
    $age =(int) $input[1];
    $persons[$name] = new Person($name,$age);
    $family->addMember($persons[$name]);
}

echo $family->getOldestMember()->getName()." ".$family->getOldestMember()->getAge().PHP_EOL;

