<?php


class Main
{
    public const END_COMMAND = 'End';

    /**
     * @var Cat[];
     */
    private $cats;


    public function run(){
        $this->readData();

    }

    private function findCatByName(string $name): Cat
    {
        if(array_key_exists($name, $this->cats)){
            return $this->cats[$name];
        }
        return null;
    }

    private function readData()
    {
        $input = explode(' ', readline()) ;
        while ($input[0] !== self::END_COMMAND) {

            $breed = $input[0];
            $name = $input[1];
            $parm = (int)$input[2];

            $cat = new stdClass();

            try {
                $this->cats[$name] = CatFactory::create($breed, $name, $parm);
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
            $input =  explode(' ', readline()) ;
        }

        $searchingName = readline();
        echo $this->findCatByName($searchingName);
    }


}