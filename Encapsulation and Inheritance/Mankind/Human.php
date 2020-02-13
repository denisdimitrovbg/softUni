<?php


class Human
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * Human constructor.
     * @param string $firstName
     * @param string $lastName
     * @throws Exception
     */
    public function __construct(string $firstName, string $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    /**
     * @return string
     */
    public function getFirstName():string{

        return $this->firstName;

    }

    /**
     * @param $firstName
     * @throws Exception
     */
    private function setFirstName ($firstName):void
    {
        if(!ctype_upper($firstName[0])){
            throw new Exception('Expected upper case letter!Argument: firstName');
        }
        if (strlen($firstName) < 4){
            throw new Exception('Expected length at least 4 symbols!Argument: firstName');
        }

        $this->firstName=$firstName;

    }

    /**
     * @return string
     */
    public function getLastName():string
    {
      return  $this->lastName;
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    private function setLastName(string $lastName):void
    {
     if(!ctype_upper(($lastName[0]))){
         throw new Exception ('Expected upper case letter!Argument: lastName');
     }
     if (strlen($lastName) < 3){
         throw new Exception('Expected length at least 3 symbols!Argument: lastName');
     }

        $this->lastName=$lastName;
    }

}