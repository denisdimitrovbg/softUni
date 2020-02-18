<?php


class Main
{
    public function run()
    {
        $this->readData();
    }

    private function readData()
    {
        $driverName = readline();

        $ferrari = new Ferrari($driverName);
        echo $ferrari;
    }

}