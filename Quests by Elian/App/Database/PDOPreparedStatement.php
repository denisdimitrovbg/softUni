<?php


namespace Database;


class PDOPreparedStatement implements StatementInterface
{
    private $pdoStatement;

    public function __construct(\PDOStatement $PDOStatement)
    {
        $this->pdoStatement = $PDOStatement;
    }

    public function execute(array $param = []): ResultInterface
    {

        $this->pdoStatement->execute($param);
        return new PDOResultSet($this->pdoStatement);
    }
}