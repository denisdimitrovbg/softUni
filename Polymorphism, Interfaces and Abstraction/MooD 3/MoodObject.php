<?php


abstract class MoodObject
{

    /**
     * @var string
     */
    private $username;

    /**
     * @var int
     */
    private $level;


    /**
     * @param string $username
     * @param int $level
     */

    protected function __construct (string $username, int $level)
    {
        $this->setUsername($username);
        $this->setLevel($level);

    }


    abstract protected function setPass();


    protected function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    protected function setUsername(string $username ):void
    {
        $this->username=$username;
    }

    /**
     * @return int
     */
    protected function getLevel():int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    protected function setLevel (int $level):void
    {
        $this->level=$level;
    }


}

