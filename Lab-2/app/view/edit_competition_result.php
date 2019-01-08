<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Редактирование результата соревнований</title>
</head>
<body>
<div class="container">
    <hr>
    <h1 class="text-center">Редактирование результата соренований</h1>
    <hr>
    <div class="row h-100 justify-content-center align-items-center">
        <form action="/update" method="post" class="col-sm-5">
            <div class="form-group">
                <label>Номер соревнований</label>
                <div>
                    <input type="hidden" name="old_id_competition"
                           value="<?= $competitionResult->id_competition ?>">
                    <input type="text" class="form-control"
                           name="id_competition"
                           value="<?= $competitionResult->id_competition ?>"
                           placeholder="Номер соревнованийй">
                </div>
            </div>
            <div class="form-group">
                <label>Название команды</label>
                <div>
                    <input type="hidden" name="old_team_name"
                           value="<?= htmlspecialchars($competitionResult->team_name) ?>">
                    <input type="text" class="form-control" name="team_name"
                           value="<?= htmlspecialchars($competitionResult->team_name) ?>"
                           placeholder="Название команды">
                </div>
            </div>
            <div class="form-group">
                <label>Место</label>
                <div>
                    <input type="text" class="form-control" name="position"
                           value="<?= $competitionResult->position ?>"
                           placeholder="Место">
                </div>
            </div>
            <div class="form-group">
                <label>Количество забитых мячей</label>
                <div>
                    <input type="text" class="form-control" name="scored_goals"
                           value="<?= $competitionResult->scored_goals ?>"
                           placeholder="Количество забитых мячей">
                </div>
            </div>
            <div class="form-group">
                <label>Количество пропущенных мячей</label>
                <div>
                    <input type="text" class="form-control" name="missed_goals"
                           value="<?= $competitionResult->missed_goals ?>"
                           placeholder="Количество пропущенных мячей">
                </div>
            </div>
            <div class="form-group">
                <div>
                    <button name="action" value="update"
                            class="btn btn-success">Сохранить
                    </button>
                    <a class="btn btn-primary" href="/">На главную</a>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>