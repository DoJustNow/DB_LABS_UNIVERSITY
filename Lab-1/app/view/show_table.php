<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Результаты соревнований</title>
</head>
<body>
<div class="container">
    <h1 class="text-center">Результаты соревнований</h1>
    <table class="table table-bordered table-hover table-striped table-sm">
        <caption>Таблица competition_results</caption>
        <thead class="text-center">
        <tr>
            <th>Номер соревнований</th>
            <th>Название команды</th>
            <th>Место</th>
            <th>Количество забитых мячей</th>
            <th>Количество пропущенных мячей</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($competitionResults as $competitionResult): ?>
            <tr>
                <td><?= $competitionResult->id_competition ?></td>
                <td><?= $competitionResult->team_name ?></td>
                <td><?= $competitionResult->position ?></td>
                <td><?= $competitionResult->scored_goals ?></td>
                <td><?= $competitionResult->missed_goals ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
