<?php


namespace Database;

class PDOResultSet implements ResultInterface
{


    private $pdoStatement;

    public function __construct(\PDOStatement $PDOStatement)
    {
        $this->pdoStatement=$PDOStatement;
    }


    /**
         * @inheritDoc
         */
    public function fetch($className): \Generator
    {
        while ($row = $this->pdoStatement->fetchObject($className)){
            yield $row;
        }
    }
}