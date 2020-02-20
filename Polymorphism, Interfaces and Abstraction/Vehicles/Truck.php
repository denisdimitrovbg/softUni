<?php


class Truck extends Vehicles
{
    public function __construct(int $fuelQuantity, float $litersPerKm)
    {
        parent::__construct($fuelQuantity, $litersPerKm);
    }


    public function drive(int $kilometers): void
    {
        $canDo = $this->getFuelQuantity() / ($this->getLitersPerKm()+($this->getLitersPerKm() *1.6));
        if ($canDo >= $kilometers){
            $this->distance+=$kilometers;
            $this->setFuelQuantity($this->getFuelQuantity() - ($this->getLitersPerKm()+($this->getLitersPerKm() *1.6)));
            echo 'Car travelled '.$kilometers.' km'.PHP_EOL;
        }else{
            throw new Exception('Truck needs refueling'.PHP_EOL);
        }
    }

    public function refeel(int $litters): void
    {
        $this->setFuelQuantity($this->getFuelQuantity() + ($litters * 0.95));
    }

    public function __toString()
    {
        $canDo = $this->getFuelQuantity() / ($this->getLitersPerKm()+($this->getLitersPerKm() *1.6));
        return get_class($this).': '. number_format($this->getFuelQuantity(),2,'.','');
    }
}