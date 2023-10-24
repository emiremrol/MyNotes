<?php

namespace Database;

class PDOResultSet implements ResultSetInterface
{
    private $pdoStmt;

    public function __construct(\PDOStatement $pdoStmt)
    {
        $this->pdoStmt = $pdoStmt;
    }

    public function fetch($className): \Generator
    {
        while($row = $this->pdoStmt->fetchObject($className)){
            yield $row;
        }
    }
}