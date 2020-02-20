<?php


class Main
{

    public function run()
    {
        $this->readData();
    }

    private function readData()
    {
        $input = explode(' ', readline());
        $animal = new stdClass();
        /**
         * var Food
         */
        $food = new stdClass();

        while ($input[0] !== 'End') {
            $type = $input[0];

            switch ($type) {
                case 'Cat':
                    $foodInput = explode(' ', readline());
                    /**
                     * var Food
                     */
                    $foodType = $foodInput[0];
                    $foodQuantity = (int)$foodInput[1];

                    $name = $input[1];
                    $weight = (float)$input[2];
                    $livingPleace = $input[3];
                    $breed = $input[4];

                    $animal = new Cat($name, $type, $weight, $livingPleace, $breed);
                    $food = new $foodType($foodQuantity);
                    echo $animal->getSound();
                    try {
                        $animal->eat($food);
                    } catch (Exception $ex) {
                        echo $ex->getMessage();
                    }
                    echo $animal;

                    break;

                default:
                    $foodInput = explode(' ', readline());
                    /**
                     * var Food
                     */
                    $foodType = $foodInput[0];
                    $foodQuantity = (int)$foodInput[1];

                    $name = $input[1];
                    $weight = (float)$input[2];
                    $livingPleace = $input[3];

                    $animal = new $type($name, $type, $weight, $livingPleace);
                    $food = new $foodType($foodQuantity);
                    echo $animal->getSound();
                    try {
                        $animal->eat($food);
                    } catch (Exception $ex) {
                        echo $ex->getMessage();
                    }
                    echo $animal;

                    break;
            }


            $input = explode(' ', readline());

        }

    }
}