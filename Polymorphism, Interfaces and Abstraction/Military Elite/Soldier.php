<?php


abstract class Soldier
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $secondName;


    protected function __construct(string $id, string $firstName, string $secondName)
    {
        $this->setId($id);
        $this->setFirstName($firstName);
        $this->setSecondName($secondName);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    private function setId(string $id): void
    {
        $this->id = $id;
    }


    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    private function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getSecondName(): string
    {
        return $this->secondName;
    }

    /**
     * @param string $secondName
     */
    private function setSecondName(string $secondName):void
    {
        $this->secondName=$secondName;
    }

}