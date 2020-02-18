<?php


class Main
{

    public function run()
    {
        $this->readData();
    }

    private function readData()
    {
        $datebase=[];

        $input = explode(' ', readline());
        while ($input[0] !== 'End'){
            if (count($input) === 5){
                $name = $input[1];
                $birthday = $input[4];

                $datebase[$name]=new Citizen($name, $birthday);

            }elseif (count($input) === 3){
                $name = $input[1];
                $birthday = $input[2];

                $datebase[$name] = new Pet($name, $birthday);
            }
            $input = explode(' ', readline());
        }

        $search = readline();

        foreach ($datebase as $something){
            $something->checkBirthday($search);
        }
    }
}