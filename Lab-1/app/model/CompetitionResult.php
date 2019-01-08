<?php
namespace app\model;

use database\DatabaseConnector;
use PDO;

class CompetitionResult
{

    private $connection;
    private $table = 'competition_results';

    public function __construct()
    {
        $this->connection = DatabaseConnector::getInstance()->getConnection();
    }

    public function getAllRows(): array
    {
        $sql  = "SELECT * FROM $this->table";
        $rows = $this->connection->query($sql)->fetchAll(PDO::FETCH_OBJ);

        return $rows;
    }
}