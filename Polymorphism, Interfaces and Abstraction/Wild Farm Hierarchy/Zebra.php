<?php



class Zebra extends Mammal implements MakeSoundInterface,EatInterface
{
    /**
     * @var string
     */
    private $sound;

    /**
     * Zebra constructor.
     * @param string $name
     * @param string $type
     * @param float $weight
     * @param string $livingRegion
     */
    public function __construct(string $name, string $type, float $weight, string $livingRegion)
    {
        parent::__construct($name, $type, $weight, $livingRegion);
        $this->makeSound();
    }

    /**
     * @param Food $food
     * @throws Exception
     */
    public function eat(Food $food): void
    {
        if ($food instanceof \Vegetable) {
            $this->setFoodEaten($food->getQuantity());
        }else{
            throw new Exception($this->getName().' are not eating that type of food!'.PHP_EOL);
        }
    }

    /**
     *
     */
    public function makeSound(): void
    {
        $this->sound='Zs'.PHP_EOL;
    }

    /**
     * @return string
     */
    public function getSound(): string
    {
        return $this->sound;
    }


    public function __toString()
    {
       return get_class($this).'['.$this->getName().','.$this->getWeight().','.$this->getLivingRegion().','.$this->getFoodEaten().']'.PHP_EOL;
    }
}