<?php


class Tire
{
    /**
     * @var float
     */
    private $tirePresure;

    /**
     * @var int
     */
    private $tireAge;

    /**
     * Tire constructor.
     * @param float $tirePresure
     * @param int $tireAge
     */
    public function __construct(float $tirePresure, int $tireAge)
    {
        $this->setTirePresure($tirePresure);
        $this->setTireAge($tireAge);
    }

    /**
     * @return float
     */
    public function getTirePresure(): float
    {
        return $this->tirePresure;
    }

    /**
     * @param float $tirePresure
     */
    public function setTirePresure(float $tirePresure): void
    {
        $this->tirePresure = $tirePresure;
    }

    /**
     * @return int
     */
    public function getTireAge(): int
    {
        return $this->tireAge;
    }

    /**
     * @param int $tireAge
     */
    public function setTireAge(int $tireAge): void
    {
        $this->tireAge = $tireAge;
    }



}