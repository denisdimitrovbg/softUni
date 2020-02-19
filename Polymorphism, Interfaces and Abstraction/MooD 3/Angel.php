<?php


class Angel extends MoodObject implements IAngel
{

    private $type;

    /**
     * @var int
     */
    private $specialPoints;

    /**
     * @var int
     */
    private $result;

    /**
     * @var string
     */
    private $hashedpass;

    public function __construct(string $username, int $level, int $mana)
    {
        parent::__construct($username, $level);
        $this->setSpecialPoints($mana);
        $this->result=(int) $this->getSpecialPoints() * $this->getLevel();
        $this->type = 'Angel';
        $this->setPass();
    }


    public function getResult ():string
    {
        return $this->result;
    }

    public function setSpecialPoints(int $mana):void
    {
        $this->specialPoints=$mana;
    }

    public function getSpecialPoints():int
    {
        return $this->specialPoints;
    }

    protected function setPass()
    {
        $passPartOne = strrev($this->getUsername());
        $passPartTwo = strlen($this->getUsername()) * 21;
        $this->hashedpass= $passPartOne.$passPartTwo.' -> '.$this->type;

    }

    protected function getPass():string
    {
        return $this->hashedpass;
    }

    public function __toString()
    {
       return $this->getUsername().' | '.$this->getPass().' '.$this->getResult().PHP_EOL;
    }

}