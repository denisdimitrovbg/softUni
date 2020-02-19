<?php


class Commando extends SpecialisedSoldier
{
    /**
     * @var array
     */
    private $missions;

    /**
     * Commando constructor.
     * @param string $id
     * @param string $firstName
     * @param string $secondName
     * @param float $salary
     * @param string $corps
     */
    public function __construct(string $id, string $firstName, string $secondName, float $salary, string $corps)
    {
        parent::__construct($id, $firstName, $secondName, $salary, $corps);
        $this->missions = [];
    }

    /**
     * @return array
     */
    public function getMissions(): array
    {
        return $this->missions;
    }

    /**
     * @param string $missionName
     * @param string $missionStatus
     */
    public function setMission(string $missionName, string $missionStatus): void
    {
        $this->missions[$missionName] = $missionStatus;
    }

    public function __toString()
    {
        $print = '';

        foreach ($this->getMissions() as $mission => $status) {
            $print .= 'Code Name: ' . $mission . ' State: ' . $status . PHP_EOL;
        }
        return parent::__toString() . 'Missions:' . PHP_EOL . $print;
    }

}