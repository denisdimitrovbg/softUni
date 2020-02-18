<?php


class Database
{
    /**
     * @var []
     */
    private $datebase;


    public function __construct()
    {
      $this->datebase=[];
    }


    /**
     * @param object $human
     */
    public function addPerson(object $human):void
    {
        $this->datebase[]=$human;
    }

    /**
     * @return array
     */
    private function getDatabase():array
    {
        return $this->datebase;
    }

    public function IdCheker(string $lastDigits)
    {
        foreach ($this->datebase as $human) {
            if ($lastDigits == substr($human->getId(), (strlen($human->getID())-3), strlen($human->getID())) ){
                echo $human->getId().PHP_EOL;
            }
        }
    }
}