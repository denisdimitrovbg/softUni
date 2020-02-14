<?php


class Pizza
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array Topping
     */
    private $toppings;

    /**
     * @var Dough
     */
    private $dough;

    /**
     * @var int
     */
    private $numberOfToppings;

    public function __construct(string $name, int $numberOfToppings)
    {
        try {
            $this->setPizzaName($name);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

        try {
            $this->setNumberOfToppings($numberOfToppings);
        }catch (Exception $e){
            echo $e->getMessage();
            exit;
        }

        $this->dough = new stdClass();
        $this->toppings = [];
    }

    /**
     * @return string
     */
    public function getPizzaName(): string
    {
        return $this->name;
    }


    /**
     * @param string $name
     * @throws Exception
     */
    public function setPizzaName(string $name): void
    {
        if (strlen($name) > 0 && strlen($name) < 16) {

            $this->name = $name;
        } else {
            throw new Exception('Pizza name should be between 1 and 15 symbols.'.PHP_EOL);
        }
    }

    /**
     * @return Dough
     */
    public function getPizzaDough(): Dough
    {
        return $this->dough;
    }

    /**
     * @param Dough $dough
     */
    public function setPizzaDough(Dough $dough): void
    {
        $this->dough = $dough;
    }


    /**
     * @return int
     */
    public function getNumberOfToppings(): int
    {
        return $this->numberOfToppings;
    }

    /**
     * @param int $numberOfToppings
     * @throws Exception
     */
    public function setNumberOfToppings(int $numberOfToppings): void
    {
        if ($numberOfToppings < 11) {
            $this->numberOfToppings = $numberOfToppings;
        }else{
            throw new Exception('Number of toppings should be in range [0..10].'.PHP_EOL);
        }
    }

    /**
     * @return array
     */
    public function getPizzaToppings(): array
    {
        return $this->toppings;
    }

    /**
     * @param Topping $topping
     * @throws Exception
     */
    public function addPizzaTopping(Topping $topping): void
    {
        if (count($this->toppings) < 11){
            $this->toppings[] = $topping;
        }else{
            throw new Exception('Number of toppings should be in range [0..10]'.PHP_EOL);
        }

    }


    private function checkPizzaCalories():float
    {
        $doughCalories = $this->getPizzaDough()->getDoughCalories();
        $toppingCalories = 0;
        foreach ($this->toppings as $topping){
            $toppingCalories += $topping->getToppingCalories();
        }

        return (float) $doughCalories + $toppingCalories;
    }


    public function __toString()
    {
        try {
            $cals = number_format($this->checkPizzaCalories(),2,'.','');
        }catch (Exception $e){
            echo $e->getMessage();
            exit;
        }

        return $this->getPizzaName().' - '.$cals.' Calories.'.PHP_EOL;
    }

}