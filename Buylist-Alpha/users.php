<?php session_start();
include 'bd.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Users</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Features-Blue.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search-1.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
</head>

<body>
    <div>
        <div class="header-blue" style="background-image: url(&quot;assets/img/theme.jpg&quot;);background-size: auto;height: 768px;width: 1280px;">
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                <div class="container-fluid"><a class="navbar-brand text-dark" href="#">Buylist</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item dropdown"><a class="dropdown-toggle nav-link text-dark green" data-toggle="dropdown" aria-expanded="false" role="button" aria-haspopup="true">Меню</a>
                                <div class="dropdown-menu" role="menu" aria-labelledby="navbarDropdown"><a class="dropdown-item" role="presentation" href="AddProd.php">Добавить товар</a><a class="dropdown-item" role="presentation" href="users.php">Все пользователи</a><a id="list" class="dropdown-item" href="list.php">Список покупок</a>
                            </li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><label for="search-field"></label></div>
                        </form>
                        <span class="btn btn-primary text-dark action-button"> <a class="text-dark login" href="index.php">На главную</a></span>
                        <form action="exit.php" method="POST"><input class="btn btn-primary text-dark action-button" name="exit" type="submit" value="Выход">
                        </form>                     
            </nav>

<?php

include 'bd.php';

$sql = "SELECT p.id, p.name, p.surname, p.middlename, p.status, u.role_id FROM profile AS p 
JOIN user_role AS u ON u.user_id = p.id";

$stmt = $db->prepare($sql);
$stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<table class="table table-hover table-bordered results users">'."\n";
    echo '<div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Начните вводить имя пользователя"></div><span class="counter pull-right"></span>';
    echo '<tr align="center">'."\n";
    echo '<th>id</th>'."\n";
    echo '<th>Имя</th>'."\n";
    echo '<th>Фамилия</th>'."\n";
    echo '<th>Отчество</th>'."\n";
    echo '<th>Статус</th>'."\n";
    echo '<th>Роль</th>'."\n";
    echo '<tr class="warning no-result">
      <td id="tbltext" colspan="4"><i class="fa fa-warning"></i> Нет результатов</td>';
    echo '</tr>';
$id = $rows[0]['id'];

    foreach ($rows as $val) {
        echo '<tr>'."\n";
        if ($val['role_id'] == 1) {
            $val['role_id'] = 'Администратор';
        } elseif ($val['role_id'] == 2) {
            $val['role_id'] = 'Пользователь';
        }
        echo '<td>'.$val['id']."\n";
        echo '<td>'.$val['name']."\n";
        echo '<td>'.$val['surname']."\n";
        echo '<td>'.$val['middlename']."\n";
        echo '<td>'.$val['status']."\n";
        echo '<td>'.$val['role_id']."\n";

        if ($val['role_id'] == 'Пользователь') {
            echo '<form action="up.php" method="post"><input name="'.$val['id'].'" id="abut" class="btn btn-light action-button" value="Повысить" type="submit"></td></form>'."\n";
        } else {
            echo '<form action="down.php" method="post"><input name="'.$val['id'].'" id="abut" class="btn btn-light action-button" value="Понизить" type="submit"></td></form>'."\n";
        }
    }

    echo '</tr>'."\n";
    echo '</table>'."\n";

?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>

</body>

</html>