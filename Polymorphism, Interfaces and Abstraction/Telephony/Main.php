<?php


class Main
{

    public function run()
    {
        $this->readData();
    }

    private function readData()
    {
        $smartPhone = new SmartPhone();

        $phones = explode(' ', readline());
        for ($i = 0; count($phones) > $i; $i++) {
            try {
                $smartPhone->callNumber($phones[$i]);
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return;
            }

        }

        $urls = explode(' ', readline());
        for ($i = 0; count($urls) > $i; $i++) {
            try {
                $smartPhone->surfing($urls[$i]);
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return;
            }
        }

    }
}