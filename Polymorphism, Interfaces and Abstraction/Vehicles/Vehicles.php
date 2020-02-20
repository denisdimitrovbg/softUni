<?php


abstract class Vehicles
{
    /**
     * @var int
     */
    protected $distance;

    /**
     * @var int
     */
  private $fuelQuantity;

    /**
     * @var float
     */
  private $litersPerKm;

    /**
     * Vehicles constructor.
     * @param $fuelQuantity
     * @param float $litersPerKm
     */
    public function __construct(int $fuelQuantity, float $litersPerKm)
    {
        $this->setFuelQuantity($fuelQuantity);
        $this->setLitersPerKm($litersPerKm);
        $this->distance=0;
    }


    abstract public function drive(int $kilometers ):void;
    abstract public function refeel(int $litters ):void;

    /**
     * @return int
     */
    public function getFuelQuantity():int
    {
        return $this->fuelQuantity;
    }

    /**
     * @param int $fuelQuantity
     */
    protected function setFuelQuantity(int $fuelQuantity): void
    {
        $this->fuelQuantity = $fuelQuantity;
    }

    /**
     * @return float
     */
    public function getLitersPerKm(): float
    {
        return $this->litersPerKm;
    }

    /**
     * @param float $litersPerKm
     */
    private function setLitersPerKm(float $litersPerKm): void
    {
        $this->litersPerKm = $litersPerKm;
    }


}