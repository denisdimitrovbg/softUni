<?php


class Spy extends Soldier implements ISpy
{
    /**
     * @var
     */
    private $codeNumber;

    /**
     * Spy constructor.
     * @param string $id
     * @param string $firstName
     * @param string $secondName
     * @param string $codeNumber
     */
    public function __construct(string $id, string $firstName, string $secondName, string $codeNumber)
    {
        parent::__construct($id, $firstName, $secondName);
        $this->setCodeNumber($codeNumber);
    }

    /**
     * @param string $codeNumber
     */
    function setCodeNumber(string $codeNumber): void
    {
        $this->codeNumber = $codeNumber;
    }

    /**
     * @return string
     */
    public function getCodeNumber(): string
    {
        return $this->codeNumber;
    }

    public function __toString()
    {
        return 'Name: ' . $this->getFirstName() . ' ' . $this->getSecondName() . ' Id: ' . $this->getId() . PHP_EOL .
            'Code Number: ' . $this->getCodeNumber() . PHP_EOL;
    }

}