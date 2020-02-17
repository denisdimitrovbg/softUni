<?php


class StreetExtraordinaire extends Cat
{
    /**
     * @var int
     */
    private $decibelsOfMeows;




    public function __construct(string $breed, string $name, int $decibelsOfMeows)
    {
        parent::__construct($breed, $name);
        $this->setDecibelsOfMeows($decibelsOfMeows);
    }

    /**
     * @return int
     */
    public function getDecibelsOfMeows():int
    {
        return $this->decibelsOfMeows;
    }

    /**
     * @param int $decibelsOfMeows
     */
    private function setDecibelsOfMeows(int $decibelsOfMeows):void
    {
        $this->decibelsOfMeows=$decibelsOfMeows;
    }

    public function __toString()
    {
        return parent::__toString().' '.$this->getDecibelsOfMeows().PHP_EOL;
    }

}