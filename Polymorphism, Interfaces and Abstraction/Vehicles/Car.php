<?php


class Car extends Vehicles
{

    public function __construct(int $fuelQuantity, float $litersPerKm)
    {
        parent::__construct($fuelQuantity, $litersPerKm);

    }

    public function drive(int $kilometers): void
    {
        $canDo = $this->getFuelQuantity() / ($this->getLitersPerKm()+($this->getLitersPerKm() *0.9));
        if ($canDo >= $kilometers){
            $this->distance+=$kilometers;
            $this->setFuelQuantity($this->getFuelQuantity() - ($this->getLitersPerKm()+($this->getLitersPerKm() *0.9)));
            echo 'Car travelled '.$kilometers.' km'.PHP_EOL;
        }else{
            throw new Exception('Car needs refueling'.PHP_EOL);
        }
    }

    public function refeel(int $litters): void
    {
        $this->setFuelQuantity($this->getFuelQuantity() + $litters);
    }


    public function __toString()
    {
        $canDo = $this->getFuelQuantity() / ($this->getLitersPerKm()+($this->getLitersPerKm() *0.9));
      return get_class($this).': '. number_format($this->getFuelQuantity(),2,'.','');
    }
}