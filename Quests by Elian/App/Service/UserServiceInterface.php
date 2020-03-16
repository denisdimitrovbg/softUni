<?php


namespace Service;

use Data\PhonebookDTO;
use Data\UserDTO;

interface UserServiceInterface
{
    public function register (UserDTO $userDTO, string $confirmPassword): bool;
    public function login(string $userName, string $password) : ?UserDTO;
    public function currentUser() :?UserDTO;
    public function isLogged():bool;


    /**
     * @return \Generator| UserDTO[]
     */
    public function getAll():\Generator;
    public function edit (UserDTO $userDTO) :bool;
    public function addPhoneDB(PhonebookDTO $newPhone,  UserDTO $userDTO);
    public function findAllPhones(int $sessionId, UserDTO $userDTO);
    public function searchByName(string $name, $ownerID);
}