<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Добавление результата соревнований</title>
</head>
<body>
<div class="container">
    <hr>
    <h1 class="text-center">Добавление результата соревнований</h1>
    <hr>
    <?php if (isset($_SESSION['errors'])): ?>
        <div class="alert mx-auto alert-danger col-sm-5" role="alert">
            <h4 class="alert-heading">FAIL</h4>
            <hr>
            <ul>
                <?php foreach ($_SESSION['errors'] as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php unset($_SESSION['errors']) ?>
    <?php endif; ?>
    <div class="row h-100 justify-content-center align-items-center">
        <form action="/create" method="post" class="col-sm-5">
            <div class="form-group">
                <label>Номер соревнований</label>
                <div>
                    <input type="text" class="form-control"
                           name="id_competition"
                           placeholder="Номер соревнований">
                </div>
            </div>
            <div class="form-group">
                <label>Название команды</label>
                <div>
                    <input type="text" class="form-control"
                           name="team_name"
                           placeholder="Название команды">
                </div>
            </div>
            <div class="form-group">
                <label>Место</label>
                <div>
                    <input type="text" class="form-control" name="position"
                           placeholder="Место">
                </div>
            </div>
            <div class="form-group">
                <label>Количество забитых мячей</label>
                <div>
                    <input type="text" class="form-control" name="scored_goals"
                           placeholder="Количество забитых мячей">
                </div>
            </div>
            <div class="form-group">
                <label>Количество пропущенных мячей</label>
                <div>
                    <input type="text" class="form-control" name="missed_goals"
                           placeholder="Количество пропущенных мячей">
                </div>
            </div>
            <div class="form-group">
                <div>
                    <button name="action" value="add" class="btn btn-success">
                        Сохранить
                    </button>
                    <a class="btn btn-primary" href="/">На главную</a>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>