<?php

$loops = intval(readline());
$peoples = [];

class Person
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */

    private $age;


    public function __construct(string $name,
                                int $age)
    {
        $this->name = $name;
        $this->age = $age;

    }

    /**
     * @return string
     */
    public function getName(): string
    {

        return $this->name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {

        return $this->age;
    }


}

for ($i = 0; $i < $loops; $i++) {
    $data = explode(" ", readline());
    $name = $data[0];
    $age = (int)$data[1];


    if ($age > 30) {
        $peoples[] = new Person($name, $age);

    }



}


usort($peoples, function (Person $p1,
                          Person $p2){

    return $p1->getName()<=> $p2->getName();

});



foreach ($peoples as $people=>$data){

    $ime=$data->getName($name);
    $godini=$data->getAge($age);

    echo $ime." - ".$godini.PHP_EOL;


}