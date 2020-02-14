<?php
spl_autoload_register();

$input = explode(' ', readline());
$pizza = new stdClass();

while ($input[0] !== 'END'){
    $command = $input[0];

    switch ($command){
        case 'Pizza':
            $name = $input[1];
            $toppings =(int) $input[2];
            try {
                $pizza = new Pizza($name,$toppings);
            }catch (Exception $e){
                echo $e->getMessage();
            }

            break;
        case 'Dough':
            $typeDough = $input[1];
            $specOfDough = $input[2];
            $doughWeight = (int) $input[3];

            try {
                $dough = new Dough($typeDough,$doughWeight,$specOfDough);
            }catch (Exception $e){
                echo $e->getMessage();
            }

            try {
                $pizza->setPizzaDough($dough);
            }catch (Exception $e){
                echo $e->getMessage();
            }

            break;

        case 'Topping':
            $toppingName = $input[1];
            $toppingWeight =(int) $input[2];


            try {
                $topping = new Topping($toppingName, $toppingWeight);
            }catch (Exception $e){
                echo $e->getMessage();
            }

            try {
                $pizza->addPizzaTopping($topping);
            }catch (Exception $e){
                echo $e->getMessage();
            }

            break;
    }


    $input = explode(' ', readline());
}
echo $pizza;



