<?php


namespace Repository;


use Data\UserDTO;
use Database\DatabaseInterface;

class UserRepository implements UserRepositoryInterface
{
    private $db;

    public function __construct(DatabaseInterface $database)
    {
        $this->db=$database;
    }

    public function insert(UserDTO $userDTO): bool
    {
        $this->db->query(
            'INSERT INTO users (name,password)
            VALUES 
            (?,?)
            '
        )->execute([$userDTO->getName(),
            $userDTO->getPassword()]);

        return true;
    }

    public function update(int $id, UserDTO $userDTO): bool
    {
        $this->db->query(
            'UPDATE users
            SET
            name = ?,
            password = ?
            WHERE id = ?
            '
        )->execute([$userDTO->getName(),
                    $userDTO->getPassword(),
                    $id]);
        return true;
    }

    public function delete(int $id): bool
    {
        $this->db->query(
            'DELETE FROM users WHERE id = ?')->execute([$id]);
        return true;
    }

    public function findOneByUsername(string $name): ?UserDTO
    {
       return $this->db->query(
            'SELECT id,name,password
            FROM users
            WHERE name = ?
            '
        )->execute([$name])->fetch(UserDTO::class)->current();


    }

    public function findOneById($id): ?UserDTO
    {
        return $this->db->query(
            'SELECT name,password
            FROM users
            WHERE id = ?
            '
        )->execute([$id])->fetch(UserDTO::class)->current();
    }

    /**
     * @inheritDoc
     */
    public function findAll(): \Generator
    {
        return $this->db->query(
            'SELECT id, name, password
            FROM users
            '
        )->execute()->fetchAll(UserDTO::class);
    }
}