<?php


class Student extends Human
{

    /**
     * @var string
     */
    private $facultyNumber;

    /**
     * Student constructor.
     * @param string $firstName
     * @param string $lastName
     * @param string $facultyNumber
     * @throws Exception
     */
    public function __construct(string $firstName, string $lastName, string $facultyNumber)
    {
        parent::__construct($firstName, $lastName);
        $this->setFacultyNumber($facultyNumber);
    }



    private function setFacultyNumber(string $facultyNumber): void
    {
        if (!(strlen($facultyNumber) <= 10 && strlen($facultyNumber) >= 5)) {
            throw new Exception('Invalid faculty number!');
        }

        $this->facultyNumber = $facultyNumber;
    }

    /**
     * @return string
     */
    public function getFacultyNumber(): string
    {
        return $this->facultyNumber;
    }

    public function __toString()
    {
        return 'First Name: ' . $this->getFirstName() . PHP_EOL . 'Last Name: ' . $this->getLastName() . PHP_EOL . 'Faculty number: ' . $this->getFacultyNumber() . PHP_EOL . PHP_EOL;

    }
}