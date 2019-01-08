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

    public function selectByPrimary(int $idCompetition, string $teamName)
    {
        $sql  = <<<SQL
        SELECT *
        FROM $this->table
        WHERE id_competition = ?
          AND team_name = ?
SQL;
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $idCompetition);
        $stmt->bindValue(2, $teamName);
        $stmt->execute();

        return $stmt->fetchObject();

    }

    public function update(array $parameters): bool
    {
        $sql                        = <<<SQL
        UPDATE competition_results
        SET id_competition = :id_competition,
            team_name      = :team_name,
            position       = :position,
            scored_goals   = :scored_goals,
            missed_goals   = :missed_goals
        WHERE id_competition = :old_id_competition
          AND team_name = :old_team_name 
SQL;
        $stmt                       = $this->connection->prepare($sql);
        $_SESSION['sql_query']      = $stmt->queryString;
        $_SESSION['sql_parameters'] = $parameters;

        return $stmt->execute($parameters);
    }

    public function add(array $parameters): bool
    {
        $sql                        = <<<SQL
        INSERT INTO $this->table (id_competition, team_name, position,
                                  scored_goals, missed_goals)
        VALUES (:id_competition, :team_name, :position, 
                :scored_goals, :missed_goals)
SQL;
        $stmt                       = $this->connection->prepare($sql);
        $_SESSION['sql_query']      = $stmt->queryString;
        $_SESSION['sql_parameters'] = $parameters;

        return $stmt->execute($parameters);
    }

    public function deleteByPrimary(int $idCompetition, string $teamName)
    {
        $sql  = <<<SQL
        DELETE 
        FROM $this->table 
        WHERE id_competition = ? AND team_name = ?
SQL;
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $idCompetition);
        $stmt->bindValue(2, $teamName);
        $stmt->execute();
    }
}