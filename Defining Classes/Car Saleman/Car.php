<?php

class Car
{
    /**
     * @var string
     */
    private $model;

    /**
     * @var Engine
     */
    private $engine;

    /**
     * @var string
     */
    private $weight;

    /**
     * @var string
     */
    private $color;

    /***
     * Car constructor.
     * @param string $model
     * @param Engine $engine
     * @param string|null $weight
     * @param string|null $color
     */
    public function __construct(string $model, Engine $engine, string $weight = null, string $color = null)
    {
        $this->setModel($model);
        $this->setEngine($engine);
        $this->setWeight($weight);
        $this->setColor($color);
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param $model
     */
    private function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }

    /**
     * @param $engine
     */
    private function setEngine(Engine $engine): void
    {
        $this->engine = $engine;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    private function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getWeight(): string
    {
        return $this->weight;
    }

    /**
     * @param string $weight
     */
    private function setWeight(string $weight): void
    {
        $this->weight = $weight;
    }


    public function __toString()
    {
        return $this->getModel() . ':' . PHP_EOL .
            '  ' . $this->getEngine()->getModel().':'. PHP_EOL .
            '    Power: ' . $this->getEngine()->getPower() . PHP_EOL .
            '    Displacement: ' . $this->getEngine()->getDisplacement() . PHP_EOL .
            '    Efficiency: ' . $this->getEngine()->getEfficiency() . PHP_EOL .
            '  Weight: ' . $this->getWeight() . PHP_EOL .
            '  Color: ' . $this->getColor() . PHP_EOL;

    }

}
