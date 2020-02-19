<?php
spl_autoload_register();

$input = explode(' | ', readline());
$type= $input[1];
$user = new stdClass();


switch ($type){
    case 'Demon':
        $user = new Demon($input[0], $input[3], $input[2]);
        break;
    case 'Archangel':

        $user = new Angel($input[0], $input[3], $input[2]);
        break;
}

echo $user;