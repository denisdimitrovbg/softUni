<?php


class Cymric extends Cat
{
    /**
     * @var int
     */
    private $furLength;


    /**
     * Cymric constructor.
     * @param string $breed
     * @param string $name
     * @param int $furLength
     */
    public function __construct(string $breed, string $name, int $furLength)
    {
        parent::__construct($breed, $name);
        $this->setFurLength($furLength);
    }


    /**
     * @return int
     */
    public function getFurLength():int
    {
        return $this->furLength;
    }

    /**
     * @param int $furLength
     */
    private function setFurLength(int $furLength ):void
    {
        $this->furLength=$furLength;
    }

    public function __toString()
    {
        return parent::__toString().' '.$this->getFurLength().PHP_EOL;
    }
}