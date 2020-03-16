<?php

namespace Data;

class UserDTO
{

    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $password;

    /**
     * @var  PhonebookDTO[];
     */
    private $phonebook = [];


    public static function create(string $name, string $password, $id = null)
    {
        return (new UserDTO())
            ->setName($name)
            ->setPassword($password)
            ->setId($id);
    }


    public function getPhonebook()
    {

            return $this->phonebook;
    }


    public function setPhonebook(PhonebookDTO $newPhone)
    {

        $this->phonebook[] = $newPhone;

    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    public function setId($id): UserDTO
    {
        $this->id = $id;
        return $this;
    }


    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return UserDTO
     */
    public function setName(string $name): UserDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return UserDTO
     */
    public function setPassword(string $password): UserDTO
    {
        $this->password = $password;
        return $this;
    }

    public function addPhone(PhonebookDTO $newPhone): void
    {

        $this->phonebook[] = $newPhone;

    }

    public function allUserPhones(): array
    {

        return $this->phonebook;
    }
}
