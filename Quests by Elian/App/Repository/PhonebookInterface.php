<?php


namespace Repository;


use Data\PhonebookDTO;
use Data\UserDTO;

interface PhonebookInterface
{
    public function addContact(PhonebookDTO $phonebookDTO):bool;
    public function updateContact (string $name, UserDTO $userDTO):bool;
    public function deleteContact (string $name, UserDTO $userDTO):bool;
    public function findContactByName(string $name, $ownerID);
    public function findContactByEmail(string $email, UserDTO $userDTO): ?PhonebookDTO;
    public function findOneByPhone(string $phone, UserDTO $userDTO): ?PhonebookDTO;


    public function findAll($ownerID);
}