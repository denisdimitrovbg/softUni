<?php


class Main
{
    /**
     * @var Database
     */
    private $dataBase;

    public function __construct()
    {
        $this->dataBase= new Database();
    }

    public function run()
    {
        $this->readData();
        $lastDigits = readline();
        $this->dataBase->IdCheker($lastDigits);

    }

    private function readData()
    {

        $input= explode(' ',readline());
        while ($input[0] !== 'End'){
            $citizen =new stdClass();
            if (count($input) === 3){
                $name = (string) $input[0];
                $age = (int) $input[1];
                $id = (string) $input[2];

                $citizen = new Human($name,$age,$id);
                $this->dataBase->addPerson($citizen);
            }else{
                $model = (string) $input[0];
                $id = (string) $input[1];

                $citizen = new Robot($model, $id);
                $this->dataBase->addPerson($citizen);
            }

            $input= explode(' ',readline());
        }


    }

}