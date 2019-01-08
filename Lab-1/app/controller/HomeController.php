<?php
namespace app\controller;

use app\model\CompetitionResult;

class HomeController
{

    public function showCompetitionResults()
    {
        $competitionResults = (new CompetitionResult())->getAllRows();
        require_once('../app/view/show_table.php');
    }
}