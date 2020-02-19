<?php


class Demon extends MoodObject implements IDemon
{

    private $type;

    /**
     * @var float
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


    public function __construct(string $username, int $level, float $energy)
    {
        parent::__construct($username, $level);
        $this->setSpecialPoints($energy);
        $this->result=(float) $this->getSpecialPoints() * $this->getLevel();
        $this->type = 'Demon';
        $this->setPass();
    }

    public function getResult():float
    {
        return $this->result;
    }

    public function getType():string
    {
        return $this->type;
    }

    public function setSpecialPoints(float $energy): void
    {
       $this->specialPoints=$energy;
    }

    public function getSpecialPoints():float
    {
        return $this->specialPoints;
    }

    protected function setPass()
    {
        $pass= strlen($this->getUsername()) * 217;

        $this->hashedpass = $pass.' -> '.$this->getType().' '.number_format($this->getResult(),2,'.','').PHP_EOL;
    }

    public function getPass():string
    {
        return $this->hashedpass;
    }

    public function __toString()
    {
        return $this->getUsername().' | '.$this->getPass();
    }
}