<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Результаты соревнований</title>
</head>
<body>
<div class="container">
    <hr>
    <h1 class="text-center">Результаты соревнований</h1>
    <hr>
    <?php if (isset($_SESSION['action_result'])): ?>
        <div class="alert mx-auto
        <?= $_SESSION['action_result'] ? 'alert-success' : 'alert-danger' ?>"
             role="alert">
            <h4 class="alert-heading">
                <?= strtoupper($_SESSION['action'])
                    . ($_SESSION['action_result'] ? ' SUCCESS' : ' FAIL') ?>
            </h4>
            <hr>
            <p> Запрос: <br> <?= $_SESSION['sql_query'] ?> <br>
                Параметры:
            <pre>
                <?php print_r($_SESSION['sql_parameters']) ?>
            </pre>
            </p>
        </div>
        <?php unset($_SESSION['action_result'], $_SESSION['action'],
            $_SESSION['sql_parameters'], $_SESSION['sql_query']) ?>
    <?php endif; ?>
    <table class="table table-bordered table-hover table-striped table-sm">
        <caption>Таблица competition_results</caption>
        <thead class="text-center">
        <tr>
            <th>Номер соревнований</th>
            <th>Название команды</th>
            <th>Место</th>
            <th>Количество забитых мячей</th>
            <th>Количество пропущенных мячей</th>
            <th colspan="2">Действия</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($competitionResults as $competitionResult): ?>
            <tr>
                <td><?= $competitionResult->id_competition ?></td>
                <td><?= htmlspecialchars($competitionResult->team_name) ?></td>
                <td><?= $competitionResult->position ?></td>
                <td><?= $competitionResult->scored_goals ?></td>
                <td><?= $competitionResult->missed_goals ?></td>
                <td>
                    <form action="/delete" method="post">
                        <input type="hidden" name="id_competition"
                               value="<?= $competitionResult->id_competition ?>">
                        <input type="hidden" name="team_name"
                               value="<?= htmlspecialchars($competitionResult->team_name) ?>">
                        <button class="btn btn-danger">Удалить</button>
                    </form>
                </td>
                <td>
                    <form action="/edit" method="post">
                        <input type="hidden" name="id_competition"
                               value="<?= $competitionResult->id_competition ?>">
                        <input type="hidden" name="team_name"
                               value="<?= htmlspecialchars($competitionResult->team_name) ?>">
                        <button class="btn btn-primary">Редактировать</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a class="btn btn-primary" href="/add" role="button">Добавить запись</a>
    <hr>
</div>
</body>
</html>
