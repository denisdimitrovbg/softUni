<?php


class Main
{
    public function run()
    {
    $this->readData();
    }

    private function readData()
    {
        $name = readline();
        $age  =(int) readline();
        $id = readline();
        $birthDay = readline();

        $citizen = new Citezen($name, $age, $id, $birthDay);
        echo $citizen;
    }

}