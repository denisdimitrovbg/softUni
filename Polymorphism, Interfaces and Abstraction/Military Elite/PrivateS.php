<?php


class PrivateS extends Soldier implements IPrivate
{
    /**
     * @var float
     */
    private $salary;

    /**
     * PrivateS constructor.
     * @param string $id
     * @param string $firstName
     * @param string $secondName
     * @param float $salary
     */
    public function __construct(string $id, string $firstName, string $secondName, float $salary)
    {
        parent::__construct($id, $firstName, $secondName);
        $this->setSalary($salary);
    }

    /**
     * @param float $salary
     */
    public function setSalary(float $salary): void
    {
        $this->salary = $salary;
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
        return 'Name: ' . $this->getFirstName() . ' ' . $this->getSecondName() . ' Id: ' . $this->getId() . ' Salary: ' .number_format($this->getSalary(),2,'.','')  . PHP_EOL;
    }
}