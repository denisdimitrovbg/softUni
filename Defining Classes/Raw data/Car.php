<?php


class Car
{
    /**
     * @var string
     */
    private $name;


    /**
     * @var Engine
     */
    private $engine;

    /**
     * @var Cargo
     */
    private $cargo;

    /**
     * @var array Tire
     */

    private $tires;



    public function __construct(string $name, Engine $engine, Cargo $cargo, Tire $tireOne, Tire $tireTwo, Tire $tireThree, Tire $tireFour )
    {
        $this->setName($name);
        $this->engine = $engine;
        $this->cargo = $cargo;
        $this->tires['tireOne']= $tireOne;
        $this->tires['tireTwo']= $tireTwo;
        $this->tires['tireThree']= $tireThree;
        $this->tires['tireFour']= $tireFour;


    }

    /**
     * @return Engine
     */
    public function getEngine():Engine
    {
        return $this->engine;
    }

    public function getCargo():Cargo
    {
        return $this->cargo;
    }

    public function getTires():array
    {
        return $this->tires;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function checkTires():bool
    {

        foreach ($this->tires as $tire){

            if($tire->getTirePresure() < 1){
                return false;
                break;
            }
        }

        return true;

    }

    public function __toString()
    {
        return $this->getName().PHP_EOL;
    }
}