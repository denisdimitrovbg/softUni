<?php


class LeutenantGeneral extends Soldier implements IPrivate, ILeutenantGeneral
{
    /**
     * @var float
     */
    private $salary;

    /**
     * @var PrivateS []
     */
    private $privates;

    /**
     * LeutenantGeneral constructor.
     * @param string $id
     * @param string $firstName
     * @param string $secondName
     * @param float $salary
     */
    public function __construct(string $id, string $firstName, string $secondName, float $salary)
    {
        parent::__construct($id, $firstName, $secondName);
        $this->setSalary($salary);
        $this->privates=[];

    }

    /**
     * @param PrivateS $private
     */
    public function addPrivate(PrivateS $private): void
    {
        $this->privates[]=$private;
    }

    /**
     * @return array
     */
    public function getPrivates(): array
    {
        return $this->privates;
    }

    /**
     * @param float $salary
     */
    public function setSalary(float $salary): void
    {
        $this->salary=$salary;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }


    public function __toString()
    {
        $print = $this->getFirstName() . ' ' . $this->getSecondName() . ' Id: ' . $this->getId() . ' Salary: ' .number_format($this->getSalary(),2,'.','')  . PHP_EOL.'Privates:'.PHP_EOL;
        $printPrivates='';
        foreach ($this->getPrivates() as $private){
            $printPrivates .= $private;
        }

        return $print.$printPrivates.PHP_EOL;
    }

}