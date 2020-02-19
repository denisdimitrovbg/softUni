<?php


class Main
{
    /**
     * @var Soldier []
     */
    private $database;

    /**
     * Main constructor.
     */
    public function __construct()
    {
        $this->database = [];
    }

    /**
     * @return array
     */
    private function getDatabase(): array
    {
        return $this->database;
    }


    private function addSolider(Soldier $solider): void
    {
        $this->database[] = $solider;
    }


    private function readData()
    {
        $input = explode(' ', readline());

        $solider = new stdClass();

        while ($input[0] !== 'End') {
            $type = $input[0];

            switch ($type) {
                case 'Private':
                    $id = $input[1];
                    $firstName = $input[2];
                    $lastName = $input[3];
                    $salary = (float)$input[4];

                    $solider = new PrivateS($id, $firstName, $lastName, $salary);
                    $this->addSolider($solider);
                    break;

                case 'Spy':
                    $id = $input[1];
                    $firstName = $input[2];
                    $lastName = $input[3];
                    $codeNumber = $input[4];

                    $solider = new Spy($id, $firstName, $lastName, $codeNumber);
                    $this->addSolider($solider);
                    break;

                case 'LeutenantGeneral' :
                    $id = $input[1];
                    $firstName = $input[2];
                    $lastName = $input[3];
                    $salary = (float)$input[4];

                    $solider = new LeutenantGeneral($id, $firstName, $lastName, $salary);

                    for ($i = 5; $i < count($input); $i++) {
                        $privateId = $input[$i];
                        $private = new stdClass();
                        foreach ($this->getDatabase() as $warrior) {
                            if ($warrior->getId() == $privateId) {
                                $solider->addPrivate($warrior);
                            }

                        }

                    }
                    $this->addSolider($solider);
                    break;

                case 'Engineer':
                    $id = $input[1];
                    $firstName = $input[2];
                    $lastName = $input[3];
                    $salary = (float)$input[4];
                    $corps = $input[5];

                    $solider = new Engineer($id, $firstName, $lastName, $salary, $corps);

                    for ($i = 6; $i < count($input); $i += 2) {
                        $repairName = $input[$i];
                        $repairHours = $input[$i + 1];

                        $solider->addRepair($repairName, $repairHours);
                    }
                    $this->addSolider($solider);
                    break;

                case 'Commando':
                    $id = $input[1];
                    $firstName = $input[2];
                    $lastName = $input[3];
                    $salary = (float)$input[4];
                    $corps = $input[5];

                    $solider = new Commando($id, $firstName, $lastName, $salary, $corps);

                    for ($i = 6; $i < count($input); $i += 2) {
                        $missionName = $input[$i];
                        $missionStatus = $input[$i + 1];

                        $solider->setMission($missionName, $missionStatus);
                    }

                    $this->addSolider($solider);
                    break;

            }

            $input = explode(' ', readline());
        }


    }

    public function run()
    {
        $this->readData();
        foreach ($this->getDatabase() as $solider){
            echo $solider;
        }

    }
}