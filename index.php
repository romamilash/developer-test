<?php
include 'libraries/idiorm.php';
ORM::configure('mysql:host=localhost;dbname=catalog');
ORM::configure('username', 'root');
ORM::configure('password', 'root');
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$goods = ORM::for_table('goods')->find_many();
$goodsCount = count($goods);
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>Все товары</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="css/select.dataTables.min.css"/>
    <link rel="stylesheet" href="css/responsive.dataTables.min.css"/>

    <style>
        table.dataTable tbody > tr.selected,
        table.dataTable tbody > tr > .selected {
            background-color: #A2D3F6;
        }
    </style>
</head>
<body>

<div class="container">
    <br>
    <div id="example_wrapper" class="dataTables_wrapper no-footer">
        <div class="dt-buttons">
            <a class="dt-button" tabindex="0" aria-controls="example" href="/add.php"><span>Добавить</span></a>
        </div>
        <?php if (empty($goodsCount)): ?>
            <div class="dataTables_info" role="status" aria-live="polite">
                <span class="text-danger">Товары ещё не были добавлены</span>
            </div>
        <?php else: ?>
            <div class="dataTables_info" role="status" aria-live="polite">
                <span>Всего <?= $goodsCount ?> товаров</span>
            </div>

            <table class="dataTable table table-striped no-footer dtr-inline"
                   id="example" role="grid" aria-describedby="example_info" style="width: 1140px;">

                <thead>
                <tr role="row">
                    <th class="sorting_asc" aria-controls="example" rowspan="1" colspan="1"
                        style="width: 316px;" aria-sort="ascending" aria-label="ID: activate to sort column descending">
                        ID
                    </th>
                    <th class="sorting" aria-controls="example" rowspan="1" colspan="1"
                        style="width: 468px;"
                        aria-label="Название товара: activate to sort column ascending">Название товара
                    </th>
                    <th class="sorting" aria-controls="example" rowspan="1" colspan="1"
                        style="width: 248px;"
                        aria-label="Цена: activate to sort column ascending">Цена
                    </th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($goods as $key => $good): ?>
                        <tr tabindex="<?= $key + 1 ?>" role="row">
                            <td><?= $good->id ?></td>
                            <td><?= $good->name ?></td>
                            <td><?= $good->price ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php endif; ?>
    </div>
    <br>
</div>

<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>