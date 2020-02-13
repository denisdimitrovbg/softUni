<?php


class Product
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $cost;

    public function __construct( string $name, float $cost )
    {
        $this->setCost($cost);
        $this->setName($name);

    }

    /**
     * @param float $cost
     */
    private function setCost(float $cost):void{
        $this->cost=$cost;
    }

    /**
     * @return float
     */
    public function getCost(): float
    {
        return $this->cost;
    }

    /**
     * @param string $name
     * @throws Exception
     */
    private  function setName ( string $name):void
    {
        if($name !== ''){
            $this->name=$name;
        }else{
            throw new Exception('Name cannot be negative');
        }

    }

    public function getName():string
    {
        return $this->name;
    }

}