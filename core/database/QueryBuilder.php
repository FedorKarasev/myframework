<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $query = $this->pdo->prepare("SELECT * FROM $table");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS);
    }

    public function insert($table, $parametrs)
    {

        try {

            $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)',
                $table,
                implode(', ', array_keys($parametrs)),
                ':' . implode(', :', array_keys($parametrs))
            );

            $query = $this->pdo->prepare($sql);
            $query->execute($parametrs);

        } catch (PDOException $exception) {
            die($exception->getMessage());
        }


    }
}