<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Main</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Features-Blue.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body style="background-image: url(&quot;assets/img/theme.jpg&quot;);width: 1240px;height: 768px;">
    <div>
        <div class="header-blue" style="background-image: url(&quot;assets/img/theme.jpg&quot;);background-size: auto;height: 768px;width: 1280px;">
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                <div class="container-fluid"><a class="navbar-brand text-dark" href="#">Buylist</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item dropdown"><a class="dropdown-toggle nav-link text-dark green" data-toggle="dropdown" aria-expanded="false" role="button" aria-haspopup="true">Меню</a>
                                <div class="dropdown-menu" role="menu" aria-labelledby="navbarDropdown"><a class="dropdown-item" role="presentation" href="AddProd.php">Добавить товар</a><a class="dropdown-item" role="presentation" href="users.php">Все пользователи</a>
                            </li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><label for="search-field"></label></div>
                        </form>
                        <span class="btn btn-primary text-dark action-button"> <a class="text-dark login" href="index.php">На главную</a></span>
                        <form action="exit.php" method="POST"><input class="btn btn-primary text-dark action-button" name="exit" type="submit" value="Выход">
                        </form>                     
            </nav>
    <div class="form-group col-md-6 green">
        <label>Добавление товара</label><br>
        <form action="addproduct.php" method="post">
            <p>Введите название товара:<br>
                <input type="form" name="name"></input>
            </p><br>
            <p>Введите категорию товара:<br>
                <input type="form" name="category"></input>
            </p><br>
            <p>Введите производителя:<br>
                <input type="form" name="manufacturer"></input>
            </p><br>
            <p>Введите цену товара:<br>
                <input type="form" name="price"></input>
            </p><br>
            <p>Введите уникальный номер товара:<br>
                <input type="form" name="uid"></input></p><br>
            <input name="submit" type="submit" value="Добавить товар" class="btn btn-primary"><br><br>
    </div>
    </form>
    </div>
    </div>
</div>
</div>
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>