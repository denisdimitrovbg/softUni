<?php

class Engine
{
    /**
     * @var string
     */
    private $model;

    /**
     * @var int
     */
    private $power;

    /**
     * @var int
     */
    private $displacement;

    /**
     * @var string
     */
    private $efficiency;


    /**
     * Engine constructor.
     * @param string $model
     * @param int $power
     * @param int|null $displacement
     * @param string|null $efficiency
     */
    public function __construct(string $model, int $power, int $displacement = null, string $efficiency = null)
    {
        $this->setModel($model);
        $this->setPower($power);
        $this->setDisplacement($displacement);
        $this->setEfficiency($efficiency);


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
    private function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return int
     */
    public function getPower(): int
    {
        return $this->power;
    }

    /**
     * @param int $power
     */
    private function setPower(int $power): void
    {
        $this->power = $power;
    }

    /**
     * @return int
     */
    public function getDisplacement(): int
    {
        return $this->displacement;
    }

    /**
     * @param int $displacement
     */
    private function setDisplacement(int $displacement): void
    {
        $this->displacement = $displacement;
    }


    /**
     * @return string
     */
    public function getEfficiency(): string
    {
        return $this->efficiency;
    }

    /**
     * @param string $efficiency
     */
    private function setEfficiency(string $efficiency): void
    {
        $this->efficiency = $efficiency;
    }


}

