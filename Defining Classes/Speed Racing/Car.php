<?php


class Car
{
    /**
     * @var string
     */
    private $model;

    /**
     * @var int
     */
    private $fuelAmount;

    /**
     * @var float
     */
    private $fuelCost;

    /**
     * @var int
     */
    private $traveledKM;

    /**
     * Car constructor.
     * @param string $model
     * @param int $fuelAmount
     * @param float $fuelCost
     */
    public function __construct(string $model, int $fuelAmount, float $fuelCost)
    {
        $this->setModel($model);
        $this->setFuelAmount($fuelAmount);
        $this->setFuelCost($fuelCost);
        $this->traveledKM = 0;
    }

    /**
     * @return int
     */
    public function getTraveledKM(): int
    {
        return $this->traveledKM;
    }


    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    private function setModel(string $model):void
    {
        $this->model=$model;
    }

    /**
     * @return int
     */
    public function getFuelAmount(): int
    {
        return $this->fuelAmount;
    }

    /**
     * @param int $fuelAmount
     */
    public function setFuelAmount(int $fuelAmount):void
    {
        $this->fuelAmount=$fuelAmount;
    }

    /**
     * @return float
     */
    public function getFuelCost():float
    {
        return $this->fuelCost;
    }

    /**
     * @param float $fuelCost
     */
    private function setFuelCost(float $fuelCost):void
    {
        $this->fuelCost=$fuelCost;
    }

    /**
     * @param int $distanceOut
     * @return bool
     */
    public function canDrive(int $distanceOut):bool
    {
        $result= $this->getFuelAmount() - $distanceOut * $this->getFuelCost();
        $result = number_format($result,2,'.','');
        if ($result < 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param int $distance
     */
    public function drive(int $distance):void
    {
        $this->fuelAmount = number_format($this->getfuelAmount() - $distance * $this->getFuelCost(),2,".","");

    }


    /**
     * @param $distance
     */
    public function setTraveledKM($distance): void
    {
        $this->traveledKM += $distance;
    }

    public function __toString()
    {
        return $this->getModel()." ".$this->getFuelAmount()." ".$this->getTraveledKM().PHP_EOL;
    }

}