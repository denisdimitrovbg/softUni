<?php


namespace Repository;


use Data\UserDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $userDTO):bool;
    public function update (int $id, UserDTO $userDTO):bool;
    public function delete (int $id):bool;
    public function findOneByUsername(string $name): ?UserDTO;
    public function findOneById($id): ?UserDTO;

    /**
     * @return \Generator | UserDTO[];
     */
    public function findAll(): \Generator;

}