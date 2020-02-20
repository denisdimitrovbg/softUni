<?php


class Cat extends Felime
{
    /**
     * @var string
     */
    private $sound;

    /**
     * @var string
     */
    private $breed;

    /**
     * Cat constructor.
     * @param string $name
     * @param string $type
     * @param float $weight
     * @param string $livingRegion
     * @param string $breed
     */
    public function __construct(string $name, string $type, float $weight, string $livingRegion, string $breed)
    {
        parent::__construct($name, $type, $weight, $livingRegion);
        $this->setBreed($breed);
        $this->makeSound();
    }

    /**
     * @return string
     */
    public function getBreed(): string
    {
        return $this->breed;
    }

    /**
     * @param string $breed
     */
    private function setBreed(string $breed): void
    {
        $this->breed = $breed;
    }



    public function eat(Food $food): void
    {
       $this->setFoodEaten($food->getQuantity());
    }

    public function makeSound(): void
    {
        $this->sound='Meowwww'.PHP_EOL;
    }

    public function getSound(): string
    {
        return $this->sound;
    }

    public function __toString()
    {
        return get_class($this).'['.$this->getName().','.$this->getBreed().','.$this->getWeight().','.$this->getLivingRegion().','.$this->getFoodEaten().']'.PHP_EOL;
    }
}