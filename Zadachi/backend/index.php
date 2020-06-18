<?php session_start();
include 'bd.php';
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

<body>
    <div>
        <div class="header-blue" style="background-image: url(&quot;assets/img/theme.jpg&quot;);background-size: auto;height: 768px;width: 1280px;">
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                <div class="container-fluid"><a class="navbar-brand text-dark" href="#">Buylist</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item dropdown"><a class="dropdown-toggle nav-link text-dark green" data-toggle="dropdown" aria-expanded="false" role="button" aria-haspopup="true">Меню</a>
                                <div class="dropdown-menu" role="menu" aria-labelledby="navbarDropdown"><a class="dropdown-item" role="presentation" href="#">Авторизуйтесь, чтобы открыть доступ!</a><a class="dropdown-item" role="presentation" href="#">Авторизуйтесь, чтобы открыть доступ!</a>
                                </div>
                            </li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><label for="search-field"></label></div>
                        </form>
                        <a class="btn btn-primary text-dark action-button" role="button" href="auth.html">Вход</a>
                        <a class="btn btn-primary text-dark action-button" role="button" href="reg.html">Регистрация</a>

                    </div>
                </div>
            </nav>

            <div class="container hero">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                        <h1 class="text blue">Создавайте списки как вам удобно.</h1>
                        <p class="text blue">Создавайте несколько списков, делайте напоминания, работайте со списками вместе с друзьями и много другое!</p><a class="btn btn-dark btn-lg text blue action-button" role="button" href="desc.html">Узнать больше</a>
                    </div>
                    <div class="form-group"><form action="submit.php" method="POST"><input class="form-control" type="text" name="key" placeholder="Введите ключ активации">
                    <input class="btn btn-primary btn-block text-dark" name="submit" type="submit" value="Активировать аккаунт"></form></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>