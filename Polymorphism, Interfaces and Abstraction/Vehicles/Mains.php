<?php


class Mains
{
    public function run()
    {
        $this->readData();
    }

    private function readData()
    {
        $carInfo = explode(' ', readline());
        $car = new Car((int)$carInfo[1],(float) $carInfo[2]);
        $truckInfo = explode(' ', readline());
        $truck = new Truck((int)$truckInfo[1],(float) $truckInfo[2]);
        $lines = (int)readline();

        for ($i = 0; $i < $lines; $i++) {
            $command = explode(' ', readline());
            $vehicle = $command[1];

            switch ($vehicle) {
                case 'Car':
                    if ($command[0] === 'Drive') {
                        try {
                            $car->drive($command[2]);
                        } catch (Exception $ex) {
                            echo $ex->getMessage();
                        }

                    } elseif ($command[0] === 'Refuel') {
                        $car->refeel($command[2]);
                    }
                    break;
                case 'Truck':
                    if ($command[0] === 'Drive') {
                        try {
                            $truck->drive($command[2]);
                        } catch (Exception $ex) {
                            echo $ex->getMessage();
                        }

                    } elseif ($command[0] === 'Refuel') {
                        $truck->refeel($command[2]);
                    }
                    break;
            }


        }
        echo $car . PHP_EOL . $truck . PHP_EOL;
    }


}