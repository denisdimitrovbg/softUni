<?php


class Engine
{
    /**
     * @var int
     */
    private $speed;

    /**
     * @var int
     */
    private $power;


    /**
     * Engine constructor.
     * @param int $speed
     * @param int $power
     */
    public function __construct(int $speed, int $power )
    {
        $this->setSpeed($speed);
        $this->setPower($power);
    }


    /**
     * @return int
     */
    public function getSpeed(): int
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
    public function getPower():int
    {
        return $this->power;
    }

    /**
     * @param int $power
     */
    public function setPower(int $power):void
    {
        $this->power=$power;
    }

}