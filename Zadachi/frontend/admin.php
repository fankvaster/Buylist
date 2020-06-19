<?php
session_start();
include 'bd.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin</title>
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
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item dropdown"><a class="dropdown-toggle nav-link text-dark green" data-toggle="dropdown" aria-expanded="false" role="button" aria-haspopup="true">Меню</a>
                                <div class="dropdown-menu" role="menu" aria-labelledby="navbarDropdown"><a id="list" class="dropdown-item" href="list.php">Список покупок</a><a id="admin" class="dropdown-item" href="AdminPanel.php">К панели администратора</a>

                                </div>
                            </li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><label for="search-field"></label></div>
                        </form>
                        <span class="btn btn-primary text-dark action-button"> <a class="text-dark login" href="adminprofile.php">Профиль</a></span>
                        <form action="exit.php" method="POST"><input class="btn btn-primary text-dark action-button" name="exit" type="submit" value="Выход">
                        </form>
                        
                    </div>
                </div>
            </nav>

            <div class="container hero">
                <div class="row">
                    <div class="col-md-12 search-table-col">
                        <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Начните вводить название товара"></div><span class="counter pull-right"></span>
                        <div class="table-responsive table-bordered table table-hover table-bordered results">
                            <table class="table table-bordered table-hover">
                                <thead class="bill-header cs">
                                    <tr align="center">
                                        <th id="trs-hd">uid</th>
                                        <th id="trs-hd">Название</th>
                                        <th id="trs-hd">Категория</th>
                                        <th id="trs-hd">Производитель</th>
                                        <th id="trs-hd">Цена (в рублях)</th>
                                        <th id="trs-hd">Действия</th>
                                    </tr>
                                    <tr class="warning no-result">
      <td id="tbltext" colspan="4"><i class="fa fa-warning"></i> Нет результатов</td>
    </tr>
                                </thead>
                                <tbody class="green">

<?php

$sql = "SELECT m.product, m.category, m.manufacturer, m.uid, p.price FROM manufacturer AS m 
JOIN prices AS p ON p.uid = m.uid";

$stmt = $db->prepare($sql);
$stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $val) {
    echo '<tr>'."\n";
    echo '<td>'.$val['uid']."\n";
    echo '<td>'.$val['product']."\n";
    echo '<td>'.$val['category']."\n";
    echo '<td>'.$val['manufacturer']."\n";
    echo '<td>'.$val['price']."\n";
    echo '<td><form action="del.php" method="post"><input name="'.$val['uid'].'" id="abut" class="btn green" value="Удалить" type="submit"></form>'."\n";
    echo '<form action="EditProd.php" method="post"><input name="'.$val['uid'].'" id="abut" class="btn green" value="Изменить" type="submit"></form>'."\n";
    echo '<form action="addlist.php" method="post"><input name="'.$val['uid'].'" id="abut" class="btn green" value="Добавить в список" type="submit"></td></form>'."\n";
}

?>

                                    
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>