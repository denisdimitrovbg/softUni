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

        $citizen = new Citezen($name, $age);
        echo $citizen;
    }

}