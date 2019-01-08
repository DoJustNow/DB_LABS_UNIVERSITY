<?php
namespace app\controller;

use app\model\CompetitionResult;

class CompetitionResultController
{

    public function create()
    {
        $_SESSION['action'] = 'add';
        $idCompetition      = $_POST['id_competition'];
        $teamName           = $_POST['team_name'];
        $position           = $_POST['position'];
        $scoredGoals        = $_POST['scored_goals'];
        $missedGoals        = $_POST['missed_goals'];
        $validationMessages = [
            'id_competition' => implode([
                'Номер соревнований должен быть ',
                'целым положительным числом',
            ]),
            'team_name'      => 'Название команды обязательно',
            'position'       => 'Место обязательно',
            'scoredGoals'    => implode([
                'Количество забитых мячей должно быть ',
                'целым положительным числом',
            ]),
            'missedGoals'    => implode([
                'Количество пропущенных мячей должно быть ',
                'целым положительным числом',
            ]),
        ];
        $validationRules    = [
            'id_competition' => is_numeric($idCompetition)
                                && preg_match('/^\d+$/', $idCompetition)
                                && $idCompetition > 0,
            'team_name'      => ! empty($teamName),
            'position'       => is_numeric($position)
                                && preg_match('/^\d+$/', $position)
                                && $position > 0,
            'scoredGoals'    => is_numeric($scoredGoals)
                                && preg_match('/^\d+$/', $scoredGoals)
                                && $scoredGoals >= 0,
            'missedGoals'    => is_numeric($missedGoals)
                                && preg_match('/^\d+$/', $missedGoals)
                                && $missedGoals >= 0,
        ];
        $validationErrors   = $this->validate($validationMessages,
            $validationRules);

        if ( ! empty($validationErrors)) {
            $_SESSION['errors'] = $validationErrors;
            header('Location: /add');
            die();
        }

        $parameters = [
            ':id_competition' => $idCompetition,
            ':team_name'      => $teamName,
            ':position'       => $position,
            ':scored_goals'   => $scoredGoals,
            ':missed_goals'   => $missedGoals,
        ];
        $_SESSION['action_result']
                    = (new CompetitionResult())->add($parameters);
        header('Location: /');
        die();
    }

    public function update()
    {
        $parameters         = [
            ':id_competition'     => $_POST['id_competition'],
            ':team_name'          => $_POST['team_name'],
            ':position'           => $_POST['position'],
            ':scored_goals'       => $_POST['scored_goals'],
            ':missed_goals'       => $_POST['missed_goals'],
            ':old_id_competition' => $_POST['old_id_competition'],
            ':old_team_name'      => $_POST['old_team_name'],
        ];
        $_SESSION['action'] = 'update';
        $_SESSION['action_result']
                            = (new CompetitionResult())->update($parameters);
        header('Location: /');
        die();
    }

    public function delete()
    {
        $idCompetition = $_POST['id_competition'];
        $teamName      = $_POST['team_name'];
        (new CompetitionResult())->deleteByPrimary($idCompetition, $teamName);
        header('Location: /');
        die();
    }

    private function validate(array $messages, array $rules): array
    {
        $validationErrors = [];
        foreach ($rules as $key => $rule) {
            if ( ! $rule) {
                $validationErrors[] = $messages[$key];
            }
        }

        return $validationErrors;
    }

    public function showEditForm()
    {
        $idCompetition = $_POST['id_competition'];
        $teamName      = $_POST['team_name'];
        $competitionResult
                       = (new CompetitionResult())->selectByPrimary($idCompetition,
            $teamName);
        require('../app/view/edit_competition_result.php');
    }

    public function showAddForm()
    {
        require_once('../app/view/add_competition_result.php');
    }
}