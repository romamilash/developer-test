<?php
include 'libraries/idiorm.php';
ORM::configure('mysql:host=localhost;dbname=catalog');
ORM::configure('username', 'root');
ORM::configure('password', 'root');
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

function getRequestVar($var, $default=null) {
    return isset($_REQUEST[$var])
        ? trim($_REQUEST[$var])
        : $default
        ;
}

function esc($str){
    return htmlspecialchars($str, ENT_QUOTES | ENT_IGNORE);
}

if (getRequestVar('name') && getRequestVar('price')) {
    $record  = ORM::for_table('goods')->create();
    $record->name = getRequestVar('name');
    $record->price = getRequestVar('price');
    $record->save();
    header('Location:/index.php');
}
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>Добавление товара</title>
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

    <div class="row">
        <div class="col-md-4 mx-auto">
            <form action="?" method="post">
                <div class="form-group">
                    <label for="name">Название товара</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Введите название">
                </div>
                <div class="form-group">
                    <label for="price">Цена товара</label>
                    <input name="price" type="text" class="form-control" id="price" placeholder="Введите цену">
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>

    <br>
</div>

<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>