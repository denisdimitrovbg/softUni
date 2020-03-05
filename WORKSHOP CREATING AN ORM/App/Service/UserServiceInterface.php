<?php


namespace Service;


use Data\UserDTO;
use Generator;

interface UserServiceInterface
{
    public function register (UserDTO $userDTO, string $confirmPassword):bool;
    public function login (string $username, string $password): ?UserDTO;
    public function currentUser() : ?UserDTO;
    public function isLogged():bool;
    public function Edit (UserDTO $userDTO):bool;

    /**
     * @return Generator|UserDTO
     */
    public function getAll():Generator;

}