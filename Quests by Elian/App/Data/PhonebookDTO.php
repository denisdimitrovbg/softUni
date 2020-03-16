<?php
namespace Data;

class PhonebookDTO
{
    /**
     * @var int
     */
    private $ownerID;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $secondName;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $email;


    public static function create(string $name, string $secondName, string $phone, string $email, $ownerID=null )
    {
        return (new PhonebookDTO())
            ->setOwnerID($ownerID)
            ->setName($name)
            ->setSecondName($secondName)
            ->setPhone($phone)
            ->setEmail($email);
    }



    /**
     * @return int
     */
    public function getOwnerID(): int
    {
        return $this->ownerID;
    }

    /**
     * @param int $ownerID
     * @return PhonebookDTO
     */
    public function setOwnerID($ownerID): PhonebookDTO
    {
        $this->ownerID = $ownerID;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;

    }

    /**
     * @param string $name
     * @return PhonebookDTO
     */
    public function setName(string $name): PhonebookDTO
    {
        $this->name = $name;
        return $this;
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
     * @return PhonebookDTO
     */
    public function setSecondName(string $secondName): PhonebookDTO
    {
        $this->secondName = $secondName;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return PhonebookDTO
     */
    public function setPhone(string $phone): PhonebookDTO
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return PhonebookDTO
     */
    public function setEmail(string $email): PhonebookDTO
    {
        $this->email = $email;
        return $this;
    }




}