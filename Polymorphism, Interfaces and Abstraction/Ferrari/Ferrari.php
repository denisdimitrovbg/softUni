<?php


class Ferrari implements CarInterface
{
    /**
     * @var int
     */
    public static $objNum;


    const CAR = '488-Spider';

    /**
     * @var string
     */
    private $driver;


    public function __construct(string $driver)
    {
        $this->setDriver($driver);
    }

    public function getDriver():string
    {
        return $this->driver;

    }


    private function setDriver(string $driverName):void
    {
        $this->driver=$driverName;
    }


    public function breakes(): string
    {
        return 'Breaks!';
    }

    public function drive(): string
    {
        return 'Zadu6avam sA!';
    }

    public function __toString()
    {
        return self::CAR.'/'.$this->breakes().'/'.$this->drive().'/'.$this->getDriver().PHP_EOL;
    }
}