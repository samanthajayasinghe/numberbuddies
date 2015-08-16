<?php

namespace Mapper;

use \PDO;

class DbMapper
{

    /**
     * @var PDO
     */
    protected $pdo = null;

    public function __construct(PDO $pdo)
    {
        $this->setPdo($pdo);
    }

    /**
     * @return PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * @param PDO $pdo
     * @return $this;
     */
    private function setPdo($pdo)
    {
        $this->pdo = $pdo;
        return $this;
    }

    /**
     * @param $query
     */
    protected function insert($query)
    {
        var_dump($query);
        return $this->getPdo()->query($query);
    }
} 
