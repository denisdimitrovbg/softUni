<?php


class Car
{
    /**
     * @var int
     */
    private $speed;

    /**
     * @var int
     */
    private $fuel;

    /**
     * @var int
     */
    private $fuelEconomy;

    /**
     * @var int
     */
    private $distance;


    /**
     * @var int
     */
    private $fuelPerKM;




    /**
     * Car constructor.
     * @param int $speed
     * @param int $fuel
     * @param int $fuelEconomy
     */
    public function __construct(int $speed, int $fuel, int $fuelEconomy)
    {
        $this->setSpeed($speed);
        $this->setFuel($fuel);
        $this->setFuelEconomy($fuelEconomy);
        $this->distance=0;
        $this->fuelPerKM=100/$this->getFuelEconomy();
    }

    public function getDistance():string
    {
        return number_format($this->distance,1,'.','');
    }


    /**
     * @return int
     */
    public function getSpeed():int
    {
        return $this->speed;
    }

    /**
     * @param int $speed
     */
    private function setSpeed(int $speed):void
    {
        $this->speed=$speed;
    }

    /**
     * @return int
     */
    public function getFuel():int
    {
        return $this->fuel;
    }

    /**
     * @param int $fuel
     */
    private function setFuel(int $fuel):void
    {
        $this->fuel=$fuel;
    }

    /**
     * @return int
     */
    public function getFuelEconomy():int
    {
        return $this->fuelEconomy;
    }

    /**
     * @param int $fuelEconomy
     */
    private function setFuelEconomy(int $fuelEconomy):void
    {
        $this->fuelEconomy=$fuelEconomy;
    }

    public function refuel(int $liters):void
    {
        $this->fuel += $liters;
    }

    public function checkFuel():string
    {
        return 'Fuel left: '.number_format($this->getFuel(),1,'.','').' liters'.PHP_EOL;
    }


    public function getFuelPerKM():int
    {
        return $this->fuelPerKM;
    }


    public function canTravel():float
    {
        return $this->getFuel()/$this->fuelPerKM;
    }

    public function travel(int $distance):void
    {

        if($distance < $this->canTravel()){
            $drive = $this->canTravel() - $distance;
            $this->distance += $drive ;
            $this->fuel=$this->getFuel() - ($distance/$this->fuelPerKM);
        }else{
            $willDrive = $distance - $this->canTravel();
            $this->distance += $willDrive;
            $this->fuel=$this->getFuel() - ($willDrive/$this->fuelPerKM);
        }


    }

    public function getTime():string
    {
      $time = $this->distance / $this->getSpeed();
      $hours = floor($time);
      $minutes = floor(($time - $hours) * 60);
      return $hours.' hours and '.$minutes.' minutes'.PHP_EOL;
    }

}