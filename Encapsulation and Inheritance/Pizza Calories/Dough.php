<?php


class Dough
{
    /**
     * @var string
     */
    private $flourType;

    /**
     * @var int
     */
    private $doughWeight;


    /**
     * @var string;
     */
    private $bakingTechnique;


    public function __construct(string $flourType, int $doughWeight, string $bakingTechnique)
    {
        try {
            $this->setFlourType($flourType);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

        try {
            $this->setDoughWeight($doughWeight);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

        $this->setBakingTechnique($bakingTechnique);

    }


    /**
     * @return string
     */
    public function getFlourType(): string
    {
        return $this->flourType;

    }

    /**
     * @param string $flourType
     * @throws Exception
     */
    private function setFlourType(string $flourType): void
    {
        if (($flourType === 'White') || ($flourType === 'Wholegrain')) {
            $this->flourType = $flourType;
        } else {
            throw new Exception('Invalid type of dough.'.PHP_EOL);
        }
    }

    /**
     * @return int
     */
    public function getDoughWeight(): int
    {
        return $this->doughWeight;
    }


    /**
     * @param int $doughWeight
     * @throws Exception
     */
    private function setDoughWeight(int $doughWeight): void
    {
        if (($doughWeight > 0) && ($doughWeight < 201)) {
            $this->doughWeight = $doughWeight;
        } else {
            throw new Exception('Dough weight should be in the range [1..200].'.PHP_EOL);
        }
    }

    /**
     * @return string
     */
    public function getBakingTechnique(): string
    {
        return $this->bakingTechnique;
    }

    /**
     * @param string $bakingTechnique
     */
    private function setBakingTechnique(string $bakingTechnique): void
    {
        $this->bakingTechnique = $bakingTechnique;
    }


    public function getDoughCalories(): float
    {
        $flourModifier = (float) 0;
        try {
            $doughWeightModifier =(float) ($this->getDoughWeight() * 2) ;
        }catch (Exception $e){
            echo $e->getMessage();
        }

        $bakingTechniqueModifier =(float)  0;
        try {
            if ($this->getFlourType() === 'White'){
                $flourModifier = (float) 1.5;
            }else{
                $flourModifier = (float) 1.0;
            }
        }catch (Exception $e){
            echo $e->getMessage();
        }


        switch (strtolower($this->getBakingTechnique())){
            case 'crispy':
                $bakingTechniqueModifier =(float) 0.9;
                break;
            case 'chewy':
                $bakingTechniqueModifier =(float) 1.1;
                break;
            default:
                $bakingTechniqueModifier =(float)  1.0;
        }


        return (float) ($doughWeightModifier * $flourModifier * $bakingTechniqueModifier);

    }

}