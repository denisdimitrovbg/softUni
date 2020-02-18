<?php


class Pet implements BirthdayInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $birthday;

    /**
     * Pet constructor.
     * @param string $name
     * @param string $birthday
     */
    public function __construct(string $name, string $birthday)
    {
        $this->name=$name;
        $this->setBirthday($birthday);
    }

    /**
     * @param string $birthday
     */
    private function setBirthday(string $birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * @return string
     */
    public function getBirthday(): string
    {
        return $this->birthday;
    }

    public function checkBirthday(string $date)
    {
        $year = substr($this->getBirthday(),(strlen($this->getBirthday())-4), strlen($this->getBirthday()));
        if($date === $year){
            echo $this->getBirthday().PHP_EOL;
        }
    }
}