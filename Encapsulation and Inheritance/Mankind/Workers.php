<?php


class Workers extends Human
{
    /**
     * @var float
     */
    private $weekSalary;

    /**
     * @var float
     */
    private $workHoursPerDay;

    /**
     * Worker constructor.
     * @param string $firstName
     * @param string $lastName
     * @param float $weekSalary
     * @param float $workHoursPerDay
     * @throws Exception
     */
    public function __construct(string $firstName, string $lastName, float $weekSalary, float $workHoursPerDay)
    {
        parent::__construct($firstName, $lastName);
        $this->setLastName($lastName);
        $this->setWeekSalary($weekSalary);
        $this->setWorkHoursPerDay($workHoursPerDay);
    }


    public function getLastName(): string
    {
        return $this->lastName;
    }

    private function setLastName($lastName): void
    {
        if (strlen($lastName) < 4) {
            throw new Exception('Expected length more than 3 symbols!Argument: lastName');
        }
        $this->lastName = $lastName;
    }


    /**
     * @return float
     */
    public function getWeekSalary(): float
    {
        return $this->weekSalary;
    }

    /**
     * @param float $weekSalary
     * @throws Exception
     */
    private function setWeekSalary(float $weekSalary): void
    {
        if ($weekSalary <= 10) {
            throw new Exception('Expected value mismatch!Argument: weekSalary');
        }
        $this->weekSalary = $weekSalary;

    }

    /**
     * @return float
     */
    public function getWorkHoursPerDay(): float
    {
        return $this->workHoursPerDay;
    }

    /**
     * @param float $workHoursPerDay
     */
    private function setWorkHoursPerDay(float $workHoursPerDay): void
    {
        $this->workHoursPerDay = $workHoursPerDay;
    }

    private function getSalaryPerHour(): float
    {
        return number_format((($this->getWeekSalary() / 7) / $this->getWorkHoursPerDay()), 2, ".", "");
    }

    public function __toString()
    {
        return 'First Name: ' . $this->getFirstName() . PHP_EOL .
            'Last Name: ' . $this->getLastName() . PHP_EOL .
            'Week Salary: ' . number_format($this->getWeekSalary(),2,".","") . PHP_EOL .
            'Hours per day: ' . number_format($this->getWorkHoursPerDay(),2,".","") . PHP_EOL .
            'Salary per hour: ' . $this->getSalaryPerHour() . PHP_EOL;
    }
}


