<?php


class Engineer extends SpecialisedSoldier
{
    /**
     * @var array
     */
    private $repairs;

    /**
     * Engineer constructor.
     * @param string $id
     * @param string $firstName
     * @param string $secondName
     * @param float $salary
     * @param string $corps
     */
    public function __construct(string $id, string $firstName, string $secondName, float $salary, string $corps)
    {
        parent::__construct($id, $firstName, $secondName, $salary, $corps);
        $this->repairs = [];
    }

    /**
     * @return array
     */
    public function getRepairs(): array
    {
        return $this->repairs;
    }

    /**
     * @param string $partName
     * @param string $partHours
     */
    public function addRepair(string $partName, string $partHours): void
    {
        $this->repairs[$partName] = $partHours;
    }


    public function __toString()
    {
        $print = '';
        foreach ($this->getRepairs() as $repair => $hours) {
            $print .= 'Part Name: ' . $repair . ' Hours Worked: ' . $hours . PHP_EOL;
        }

        return parent::__toString() . 'Repairs:' . PHP_EOL .$print;

    }

}