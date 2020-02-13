<?php


class Cargo
{
    /**
     * @var int
     */
    private $cargoWeight;

    /**
     * @var string
     */
    private $cargoType;


    public function __construct(int $cargoWeight, string $cargoType)
    {
        $this->setCargoWeight($cargoWeight);
        $this->setCargoType($cargoType);
    }

    /**
     * @return int
     */
    public function getCargoWeight():int
    {
        return $this->cargoWeight;
    }

    /**
     * @param int $cargoWeight
     */
    private function setCargoWeight(int $cargoWeight):void
    {
        $this->cargoWeight=$cargoWeight;
    }

    /**
     * @return string
     */
    public function getCargoType():string
    {
        return $this->cargoType;
    }

    /**
     * @param string $cargoType
     */
    private function setCargoType(string $cargoType):void
    {
        $this->cargoType=$cargoType;
    }

}