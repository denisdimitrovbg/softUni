<?php


class Topping
{
    /**
     * @var string
     */
    private $topping;

    /**
     * @var  int
     */
    private $toppingWeight;

    public function __construct(string $topping, int $toppingWeight)
    {
        try {
            $this->setTopping($topping);
        }catch (Exception $e){
            echo $e->getMessage();
            exit;
        }

        try {
            $this->setToppingWeight($toppingWeight);
        }catch (Exception $e){
            echo $e->getMessage();
            exit;
        }

    }

    /**
     * @return string
     */
    public function getTopping():string
    {
        return $this->topping;
    }

    /**
     * @param string $topping
     * @throws Exception
     */
    private function setTopping(string $topping):void
    {
        if ((strtolower($topping) === 'meat') || (strtolower($topping) === 'veggies') || (strtolower($topping) === 'cheese') || (strtolower($topping) === 'sauce')){

            $this->topping=$topping;
        }else{
            throw new Exception('Cannot place '.$topping.' on top of your pizza.');
        }
    }

    /**
     * @return int
     */
    public function getToppingWeight():int
    {
        return $this->toppingWeight;
    }

    /**
     * @param int $weight
     * @throws Exception
     */
    public function setToppingWeight(int $weight ):void
    {
        if ($weight > 1 && $weight < 51){
            $this->toppingWeight=$weight;
        }else{
            throw new Exception($weight.' weight should be in the range [1..50].');
        }
    }

    public function getToppingCalories():float
    {
        $toppingModifier = (float) 0;
        $weightModifier =(float) 2 * $this->getToppingWeight();
        $topping=strtolower($this->getTopping());

        switch ($topping){
            case 'meat':
                $toppingModifier = (float) 1.2;
                break;
            case 'veggies':
                $toppingModifier = (float) 0.8;
                break;
            case 'cheese':
                $toppingModifier = (float) 1.1;
                break;
            case 'sauce':
                $toppingModifier = (float) 0.9;
                break;
        }
        return (float) ($toppingModifier * $weightModifier);
    }

}