<?php


namespace Database;

class PDOResultSet implements ResultInterface
{

    /**
     * @var \PDOStatement
     */
    private $pdoStatement;

    public function __construct(\PDOStatement $PDOStatement)
    {
        $this->pdoStatement=$PDOStatement;
    }


    public function fetch($className) : \Generator
    {
        while ($row = $this->pdoStatement->fetchObject($className)){

            yield $row;
        }
    }






}