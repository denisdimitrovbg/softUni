<?php


abstract class SpecialisedSoldier extends Soldier implements IPrivate
{
    /**
     * @var string
     */
    private $corps;

    /**
     * @var float
     */
    private $salary;

    /**
     * SpecialisedSoldier constructor.
     * @param string $id
     * @param string $firstName
     * @param string $secondName
     * @param float $salary
     * @param string $corps
     */
    public function __construct(string $id, string $firstName, string $secondName, float $salary, string $corps)
    {
        parent::__construct($id, $firstName, $secondName);
        $this->setSalary($salary);
        $this->setCorps($corps);
    }


    /**
     * @param string $corps
     */
    private function setCorps(string $corps):void
    {
        $this->corps=$corps;
    }

    /**
     * @return string
     */
    public function getCorps():string
    {
        return $this->corps;
    }

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
       return 'Name: ' . $this->getFirstName() . ' ' . $this->getSecondName() . ' Id: ' . $this->getId() . ' Salary: ' .number_format($this->getSalary(),2,'.','')  . PHP_EOL.'Corps: '.$this->getCorps().PHP_EOL;

    }

}