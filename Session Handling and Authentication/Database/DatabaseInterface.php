<?php


namespace Database;


use Cassandra\Statement;

interface DatabaseInterface
{
    public function query(string $query): StatementInterface;
}