<?php


namespace Repository;


use Data\PhonebookDTO;
use Data\UserDTO;
use Database\DatabaseInterface;

class PhonebookRepository implements PhonebookInterface
{
    private $db;

    public function __construct(DatabaseInterface $database)
    {
        $this->db=$database;
    }


    public function addContact(PhonebookDTO $phonebookDTO): bool
    {

        $this->db->query(
            'INSERT INTO phonebook(ownerID, name,secondName, phone, email)
            VALUES 
            (?,?,?,?,?)
            '
        )->execute([
            $phonebookDTO->getOwnerID(),
            $phonebookDTO->getName(),
            $phonebookDTO->getSecondName(),
            $phonebookDTO->getPhone(),
            $phonebookDTO->getEmail()]);

        return true;

    }

    public function updateContact(string $name, UserDTO $userDTO): bool
    {
        $this->db->query(
            'UPDATE phonebook
            SET
            name = ?,
            secondName = ?,
            phone = ?,
            email = ?
            WHERE name = ?
            '
        )->execute([$userDTO->getPhonebook()->getName(),
            $userDTO->getPhonebook()->getSecondName(),
            $userDTO->getPhonebook()->getPhone(),
            $userDTO->getPhonebook()->getEmail(),
            $userDTO->getPhonebook()->getName()]);
        return true;
    }

    public function deleteContact(string $name, UserDTO $userDTO): bool
    {
        $this->db->query(
        'DELETE FROM phonebook WHERE name = ?')->execute([$name]);
        return true;
    }

    public function findContactByName(string $name, $ownerID)
    {
        return $this->db->query(
            'SELECT name,secondName,phone,email
                    
            FROM phonebook
            WHERE LOCATE( ? , name) AND ownerID = ?
            '
        )->execute([$name, $ownerID])->fetch(PhonebookDTO::class);
    }

    public function findContactByEmail(string $email, UserDTO $userDTO): ?PhonebookDTO
    {
        return $this->db->query(
            'SELECT ownerID,name,secondName,phone,email
            FROM phonebook
            WHERE email = ?
            '
        )->execute([$email])->fetch(PhonebookDTO::class)->current();
    }

    public function findOneByPhone(string $phone, UserDTO $userDTO): ?PhonebookDTO
    {
        return $this->db->query(
            'SELECT ownerID,name,secondName,phone,email
            FROM phonebook
            WHERE phone = ?
            '
        )->execute([$phone])->fetch(PhonebookDTO::class)->current();
    }

    /**
     * @inheritDoc
     */
    public function findAll($ownerID)
    {
        return $this->db->query(
            'SELECT *
            FROM `phonebook`
            WHERE ownerID = ?
            '
        )->execute([$ownerID])->fetch(PhonebookDTO::class);
    }
}