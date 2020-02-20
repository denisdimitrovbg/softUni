<?php


abstract class Animal
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var float;
     */
    private $weight;

    /**
     * @var int
     */
    private $foodEaten;

    protected function __construct(string $name, string $type, float $weight)
    {
        $this->setName($name);
        $this->setType($type);
        $this->setWeight($weight);
        $this->foodEaten = 0;
    }



    /**
     * @return String
     */
    public function getName(): String
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    private function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    private function setType(string $type): void
    {
        $this->type = $type;
    }


    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    private function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return int
     */
    public function getFoodEaten(): int
    {
        return $this->foodEaten;
    }

    /**
     * @param int $foodEaten
     */
    protected function setFoodEaten(int $quantity): void
    {
        $this->foodEaten += $quantity;
    }

}
